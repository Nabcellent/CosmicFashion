<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

class ProductController extends BaseController
{
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

    public function create(): string {
        $data['categories'] = Category::with(['subCategories' => function($query) {
            $query->select(['id', 'category_id', 'name']);
        }])->get();
        
        return view('Admin/pages/products/upsert', $data);
    }

    public function store(): RedirectResponse {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'sub_category_id' => 'required'
        ];
        $messages = [
            'sub_category_id' => [
                'required' => 'Category is required.'
            ]
        ];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $file = $this->request->getFile('image');

        if(!$file->isValid()) {
            return createFail('Please upload a valid file.');
        }

        $data['image'] = "pic_" . time() . ".{$file->getClientExtension()}";
        $data['user_id'] = user()->id;
        $file->move(PUBLICPATH . "/images/products/", $data['image']);

        try {
            Product::create($data);

            return createOk('Product created successful! ✔', 'admin.product.index');
        } catch(Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating product! ❌', 'admin.product.create');
        }
    }
}
