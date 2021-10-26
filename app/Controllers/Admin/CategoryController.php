<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use CodeIgniter\HTTP\RedirectResponse;
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

            return createOk('Category creation successful! ✔', 'admin.category.index');
        } catch(Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating category! ❌', 'admin.category.create');
        }
    }

    public function edit($id): string | RedirectResponse {
        try {
            $data['category'] = Category::findOrFail($id);

            return view('Admin/pages/categories/upsert', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Unable to find category for editing!', 'admin.category.index');
        }
    }

    public function update($id): RedirectResponse {
        if(!$this->validate(['name' => 'required',])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $category = Category::findOrFail($id);

            $category->update($this->request->getVar());

            return updateOk('Category updated successfully! ✔', 'admin.category.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return updateFail('Unable to update category!');
        }
    }
}
