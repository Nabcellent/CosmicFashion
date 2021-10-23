<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use Exception;

class CategoryController extends BaseController
{
    public function index(): string {
        $data['categories'] = Category::withCount('subCategories')->take(10)->get();

        return view('Admin/pages/categories/index', $data);
    }

    public function create(): string {
        return view('Admin/pages/categories/upsert');
    }

    public function store() {
        if(!$this->validate(['name' => 'required',])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            Category::create($this->request->getVar());

            return createOk('Category created successful! ✔', 'admin.category.index');
        } catch(Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating category! ❌', 'admin.category.create');
        }
    }
}
