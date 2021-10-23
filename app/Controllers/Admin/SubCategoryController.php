<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;

class SubCategoryController extends BaseController
{
    public function index(): string {
        $data['subCategories'] = SubCategory::with(['category' => function($query) {
            $query->select('id', 'name');
        }])->withCount('products')->latest('id')->take(30)->get();

        return view('Admin/pages/subcategories/index', $data);
    }

    public function create(): string {
        $data['categories'] = Category::select(['id', 'name'])->get();

        return view('Admin/pages/subcategories/upsert', $data);
    }

    public function store() {
        $rules = ['name' => 'required', 'category_id' => 'required'];
        $messages = ['category_id' => ['required' => 'Valid category required.']];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            SubCategory::create($this->request->getVar());

            return createOk('Sub category created successful! ✔', 'admin.subcategory.index');
        } catch(Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating sub category! ❌', 'admin.subcategory.create');
        }
    }
}
