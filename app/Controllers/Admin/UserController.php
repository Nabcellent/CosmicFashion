<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\ChartAid;
use App\Models\ApiUser;
use App\Models\Role;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use Myth\Auth\Password;

class UserController extends BaseController
{
    public function index(): string {
        $data['users'] = User::whereHas('role', function($query) {
            $query->where('name', '<>', 'red');
        })->with('role')->get();

        return view('Admin/pages/users/index', $data);
    }

    public function show($id): string|RedirectResponse {
        try {
            $data['user'] = User::with([
                'role',
                'logins' => function($query) {
                    $query->take(3);
                },
                'apiUser'
            ])->withCount(['ordersDetails as total_items_ordered', 'orders'])->findOrFail($id);

            return view('Admin/pages/users/profile', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return goWithError('Unable to find user!', 'admin.user.index');
        }
    }

    public function showCustomers(): string {
        $data['users'] = User::whereHas('role', function($query) {
            $query->where('name', 'Customer');
        })->with('role')->get();

//        dd($data['users']);

        return view('Admin/pages/users/index', $data);
    }

    public function create(): string {
        $data = [
            'roles' => Role::where('name', '<>', 'red')->get(),
        ];

        return view('Admin/pages/users/upsert', $data);
    }

    public function store(): RedirectResponse {
        $rules = [
            'first_name'            => 'required|min_length[2]|max_length[50]',
            'last_name'             => 'required|min_length[2]|max_length[50]',
            'email'                 => 'required|valid_email|is_unique[users.email]',
            'gender'                => 'required|in_list[male,female]',
            'password'              => 'required|min_length[7]|max_length[20]',
            'password_confirmation' => 'required|matches[password]',
        ];
        $messages = [
            'password_confirmation' => [
                'matches' => 'Your passwords do not match.'
            ],
            'email'                 => ['is_unique' => 'The email provided is already in use.']
        ];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $file = $this->request->getFile('image');

        if($file->isValid()) {
            $data['image'] = "usr_" . time() . ".{$file->getClientExtension()}";
            $file->move(PUBLICPATH . "/images/users/", $data['image']);
        }

        $data['password'] = Password::hash($this->request->getVar('password'));

        try {
            User::create($data);

            return createOk('User created successfully! ✔', 'admin.user.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating user ❗', 'admin.user.create');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function storeApi() {
        $rules = ['user_id' => 'required'];
        $messages = [
            'user_id' => [
                'required' => "Can't find existing user for creation."
            ]
        ];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $data['key'] = empty($data['key'])
            ? null
            : $data['key'];

        try {
            $user = User::find($data['user_id']);

            $data['username'] = $this->request->getVar('username') ?? $user->email;

            $user->updateOrcreate(['user_id' => $data['user_id']], $data);

            return createOk('Registration successful! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating api user! ❌');
        }
    }

    public function edit($id): string|RedirectResponse {
        try {
            $data = [
                'user'  => User::findOrFail($id),
                'roles' => Role::where('name', '<>', 'red')->get(),
            ];

            return view('Admin/pages/users/upsert', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Unable to find user for editing!', 'admin.user.index');
        }
    }

    public function update($id): RedirectResponse {
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name'  => 'required|min_length[2]|max_length[50]',
            'email'      => "required|valid_email|is_unique[users.email,id,$id]",
            'gender'     => 'required|in_list[male,female]',
        ];
        $messages = [
            'email' => ['is_unique' => 'The email provided is already in use.']
        ];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $file = $this->request->getFile('image');

        $user = User::findOrFail($id);

        if($file->isValid()) {
            $data['image'] = "usr_" . time() . ".{$file->getClientExtension()}";
            $file->move(PUBLICPATH . "/images/users/", $data['image']);

            if(isset($user->image) && file_exists("images/users/{$user->image}")) unlink("images/users/{$user->image}");
        }

        try {
            $user->update($data);

            return updateOk('User updated successfully! ✔', 'admin.user.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return updateFail('Unable to update user!');
        }
    }

    public function userStats($id) {
        return json_encode([
            'weekly_purchases' => ChartAid::weeklyOrders($id)
        ]);
    }
}
