<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\ChartAid;
use App\Models\Category;
use App\Models\OrdersDetail;
use App\Models\Product;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class ProductController extends BaseController
{
    private array $upsertRules = [
        'name'            => 'required',
        'price'           => 'required',
        'sub_category_id' => 'required'
    ];
    private array $upsertMessages = [
        'sub_category_id' => [
            'required' => 'Category is required.'
        ]
    ];

    public function index(): string {
        $data['products'] = Product::with([
            'user'        => function($query) {
                $query->select(['id', 'email']);
            },
            'subCategory' => function($query) {
                $query->select(['id', 'name']);
            }
        ])->get();

        return view('Admin/pages/products/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @param $id
     * @return RedirectResponse|string
     */
    public function show($id): string|RedirectResponse {
        try {
            $data = [
                'product' => Product::with(['user', 'subCategory', 'ordersDetails' => function($query) {
                    return $query->whereHas('order', function($query) {
                        $query->where('is_paid', true);
                    });
                }])->findOrFail($id),
            ];

            return view('Admin/pages/products/show', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Unable to find product for viewing!', 'admin.product.index');
        }
    }

    /**
     * @throws Exception
     */
    public function dailyPurchases($id): bool|string {
        return json_encode(ChartAid::weeklySales());
    }

    public function create(): string {
        $data['categories'] = Category::with([
            'subCategories' => function($query) {
                $query->select(['id', 'category_id', 'name']);
            }
        ])->get();

        return view('Admin/pages/products/upsert', $data);
    }

    public function store(): RedirectResponse {
        if(!$this->validate($this->upsertRules, $this->upsertMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $file = $this->request->getFile('image');

        if(!$file->isValid()) {
            return createFail('Please upload a valid image.');
        }

        $data['image'] = "pic_" . time() . ".{$file->getClientExtension()}";
        $data['user_id'] = user()->id;
        $file->move(PUBLICPATH . "/images/products/", $data['image']);

        try {
            Product::create($data);

            return createOk('Product created successful! ✔', 'admin.product.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating product! ❌', 'admin.product.create');
        }
    }

    public function edit($id): string | RedirectResponse {
        try {
            $data = [
                'product'    => Product::findOrFail($id),
                'categories' => Category::with([
                    'subCategories' => function($query) {
                        $query->select(['id', 'category_id', 'name']);
                    }
                ])->get(),
            ];

            return view('Admin/pages/products/upsert', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Unable to find product for editing!', 'admin.product.index');
        }
    }

    public function update($id): RedirectResponse {
        if(!$this->validate($this->upsertRules, $this->upsertMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $file = $this->request->getFile('image');

        $product = Product::findOrFail($id);

        if($file->isValid()) {
            $data['image'] = "pic_" . time() . ".{$file->getClientExtension()}";
            $data['user_id'] = user()->id;
            $file->move(PUBLICPATH . "/images/products/", $data['image']);

            if(isset($product->image) && file_exists("images/products/{$product->image}"))
                unlink("images/products/{$product->image}");
        }

        try {
            $product->update($data);

            return updateOk('Product updated successful! ✔', 'admin.product.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return updateFail('Unable to update product!');
        }
    }
}
