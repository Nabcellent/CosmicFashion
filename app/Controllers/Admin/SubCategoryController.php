<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use Nabz\Models\DB;

class SubCategoryController extends BaseController
{
    public function index(): string {
        $data['subCategories'] = SubCategory::with(['category' => function($query) {
            $query->select('id', 'name');
        }, 'products' => function($query) {
            return '$query->';
        }])->withCount(['products', 'ordersDetails as purchases' => function($query) {
            return $query->whereHas('order', function($query) {
                $query->where('is_paid', true);
            });
        }])->latest('id')->take(30)->get();

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

    public function edit($id): string | RedirectResponse {
        try {
            $data = [
                'subCategory' => SubCategory::findOrFail($id),
                'categories' => Category::select(['id', 'name'])->get()
            ];

            return view('Admin/pages/subcategories/upsert', $data);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Unable to find category for editing!', 'admin.subcategory.index');
        }
    }

    public function update($id): RedirectResponse {
        $rules = ['name' => 'required', 'category_id' => 'required'];
        $messages = ['category_id' => ['required' => 'Valid category required.']];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $subCategory = SubCategory::findOrFail($id);

            $subCategory->update($this->request->getVar());

            return updateOk('Sub category updated successful! ✔', 'admin.subcategory.index');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return updateFail('Unable to update sub category!');
        }
    }
}
