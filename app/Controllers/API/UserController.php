<?php

namespace App\Controllers\API;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Exception;
use Illuminate\Support\Arr;
use Myth\Auth\Password;

class UserController extends ResourceController
{
    protected $format = 'json';

    public function __construct() { Services::eloquent(); }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index(): mixed {
        $options = $this->request->getVar();
        $orderByCol = $options['order_by'] ?? 'id';
        $orderByDir = $options['order_direction'] ?? 'asc';

        try {
            $users = User::all();

            //  FILTERING
            //  List of all users who purchased a specific item, or item in a subcategory/ category
            if(Arr::hasAny($options, ['product', 'category', 'sub_category'])) {
                $users = User::whereHas('orders', function($query) use ($options) {
                    $query->whereHas('ordersDetails', function($query) use ($options) {
                        $query->whereHas('product', function($query) use ($options) {
                            if(Arr::hasAny($options, ['sub_category', 'category'])) {
                                $query->whereHas('subCategory', function($query) use ($options) {
                                    if(Arr::has($options, 'category')) {
                                        $query->whereHas('category', function($query) use ($options) {
                                            return $query->whereName($options['category']);
                                        });
                                    }

                                    if(Arr::has($options, 'sub_category')) {
                                        return $query->whereName($options['sub_category']);
                                    }
                                });
                            }

                            if(Arr::has($options, 'product')) {
                                return $query->whereName($options['product']);
                            }
                        });
                    });
                })->get();
            }

            if(isset($options['filter_by'])) {
                $date = Carbon::createFromFormat('d-m-Y', $options['filter_value'])->format('Y-m-d');

                //  List of all users who purchased an item on a specific date
                $users = User::whereHas('orders', function($query) use ($date, $orderByDir) {
                    $query->whereDate('created_at', $date);
                })->get();
            }

            if(isset($options['filter_gender'])) {
                $users = $users->filter(function($user) use ($options) {
                    return $user->gender === ucfirst($options['filter_gender']);
                });
            }

            //  SORTING
            if($orderByCol === 'purchase_date') {
                $users->load([
                    'orders' => function($query) use ($orderByDir) {
                        $query->orderBy('created_at', $orderByDir);
                    }
                ]);
            } else if($orderByCol === 'login_time') {
                $users->load([
                    'logins' => function($query) use ($orderByDir) {
                        $query->orderBy('logged_in_at', $orderByDir);
                    }
                ]);
            } else {
                $sortDir = "sortBy" . (str_contains($orderByDir, 'desc')
                        ? ucfirst($orderByDir)
                        : '');
                $users = $users->$sortDir($orderByCol);
            }

            $users->prepend($users->count(), 'count');

            return $this->respond($users);
        } catch (Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @param null $id
     * @return mixed
     */
    public function show($id = null): mixed {
        try {
            $user = is_numeric($id)
                ? User::findOrFail($id)
                : User::findEmail($id);

            return $this->respond($user);
        } catch (Exception $e) {
            return $this->failNotFound('User not found.');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new() {

    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create(): mixed {
        $rules = [
            'first_name'            => 'required|min_length[2]|max_length[50]',
            'last_name'             => 'required|min_length[2]|max_length[50]',
            'email'                 => 'required|valid_email|is_unique[users.email]',
            'gender'                => 'required|in_list[male,female]',
            'role_id'               => "required|in_list[" . implode(',',
                    Role::where('name', '<>', 'Red')->pluck('id')->toArray()) . "]",
            'password'              => 'required|min_length[7]|max_length[20]',
            'password_confirmation' => 'required|matches[password]',
        ];
        $messages = [
            'password_confirmation' => [
                'matches' => 'Your passwords do not match.'
            ],
            'email'                 => ['is_unique' => 'The email provided is already in use.']
        ];

        try {
            if(!$this->validate($rules, $messages)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $data = $this->request->getVar();
            $data['password'] = Password::hash($this->request->getVar('password'));

            $user = User::create($data);

            return $this->respondCreated($user, 'User created successfully! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null) {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param null $id
     * @return mixed
     */
    public function update($id = null): mixed {
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name'  => 'required|min_length[2]|max_length[50]',
            'email'      => "required|valid_email|is_unique[users.email,id,$id]",
            'gender'     => 'required|in_list[male,female]',
        ];
        $messages = [
            'email' => ['is_unique' => 'The email provided is already in use.']
        ];

        try {
            if(!$this->validate($rules, $messages)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $data = $this->request->getRawInput();

            User::findOrFail($id)->update($data);

            $message = 'User updated successfully! ✔';
            return $this->respondUpdated(['status' => true, 'message' => $message], $message);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null) {
        try {
            User::findOrFail($id)->delete();

            $message = 'User deleted! ✔';
            return $this->respondDeleted(['status' => true, 'message' => $message], $message);
        } catch (Exception $e) {
            return $this->failNotFound('User not found.');
        }
    }
}
