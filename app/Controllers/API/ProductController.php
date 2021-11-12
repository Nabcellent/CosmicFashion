<?php

namespace App\Controllers\API;

use App\Models\Category;
use App\Models\OrdersDetail;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Exception;
use Illuminate\Support\Arr;
use Nabz\Models\DB;

class ProductController extends ResourceController
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

        try {
            $products = Product::all();

            if(Arr::hasAny($options, ['filter_category', 'filter_sub_category'])) {
                $rules = [
                    'filter_category' => "permit_empty|in_list[" . implode(',',
                            Category::pluck('name')->toArray()) . "]",
                    'filter_sub_category' => "permit_empty|in_list[" . SubCategory::pluck('name')->unique()->sort()
                            ->implode(',') . "]",
                ];
                $messages = [
                    'email' => ['is_unique' => 'The email provided is already in use.']
                ];

                if(!$this->validate($rules, $messages)) {
                    return $this->failValidationErrors($this->validator->getErrors());
                }

                $products = Product::whereHas('subCategory', function($query) use ($options) {
                    if(Arr::has($options, 'filter_category')) {
                        $query->whereHas('category', function($query) use ($options) {
                            return $query->whereName($options['filter_category']);
                        });
                    }

                    if(Arr::has($options, 'filter_sub_category')) {
                        return $query->whereName($options['filter_sub_category']);
                    }
                })->get();
            }

            if(isset($options['name'])) {
                $products = $products->filter(function($product) use ($options) {
                    return str_contains(strtolower($product->name), $options['name']);
                });
            }

            $count = count($products);
            $products->prepend($count, 'count');

            if(!$count) $products['message'] = 'No products found matching your query';

            return $this->respond($products);
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
            $product = Product::with(['subCategory' => function($query) {
                $query->with(['category' => function($query) {
                    $query->select(['id', 'name']);
                }])->select(['id', 'category_id', 'name']);
            }])->findOrFail($id);

            return $this->respond($product);
        } catch (Exception $e) {
            return $this->failNotFound('Product not found.');
        }
    }

    public function userProducts($id) {
        try {
            $products = User::findOrFail($id)->products;

            $count = count($products);

            if(!$count) {
                return $this->respond(['msg' => 'This user has no products.']);
            }

            $products->prepend($count, 'count');

            return $this->respond($products);
        } catch (Exception $e) {
            return $this->failNotFound('User not found.');
        }
    }

    public function salesVolume() {
        $status = $this->request->getVar('status') ?? 'all';

        $rules = [
            'status' => 'permit_empty|in_list[paid,pending,pending payment]'
        ];
        if(!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        try {
            $products = OrdersDetail::whereHas('order', function($query) use ($status) {
                if($status !== 'all') {
                    $query->whereStatus($status);
                }
            })->join('products', 'orders_details.product_id', '=', 'products.id')->select([
                    'product_id',
                    'name',
                    DB::raw("SUM(quantity) as sales")
                ])->groupBy('product_id')->latest('sales')->get();

            $products->prepend(count($products), 'count');

            return $this->respond($products);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return $this->failNotFound('User not found.');
        }
    }
}
