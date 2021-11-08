<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Nabz\Models\DB;

class AjaxController extends BaseController
{
    public function filterProducts(): bool|string {
        $data = $this->request->getVar();

        $priceString = 'products.price - (products.price * (products.discount / 100))';
        $query = Product::with('subCategory')->where('products.status', 1)
            ->whereRaw("$priceString >= {$data['priceRange'][0]}")
            ->whereRaw("$priceString <= {$data['priceRange'][1]}")
            ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', 'categories.id')
            ->select('products.*');

        if(isset($data['category'])) { $query->whereIn('categories.id', $data['category']); }
        if(isset($data['subCategory'])) { $query->whereIn('products.sub_category_id', $data['subCategory']); }

        if(isset($data['sort']) && !empty($data['sort'])) {
            if($data['sort'] === "newest") {
                $query->orderByDesc('products.id');
            } elseif($data['sort'] === "oldest") {
                $query->orderBy('products.id');
            } elseif($data['sort'] === "price_asc") {
                $query->orderByRaw($priceString);
            } elseif($data['sort'] === "price_desc") {
                $query->orderByRaw("$priceString DESC");
            }
        }

        $products = $query->paginate($data['perPage']);

        return json_encode([
            'view' => view('partials/shop_items', compact('products')),
            'count' => count($products)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy() {
        parse_str($this->request->getBody(), $input);
        $id = (int)$input['id'];
        $reqModel = $input['model'];

        $table = Str::snake(Str::plural($reqModel));
        $model = getModel($reqModel);

        $path = '';

        if($table === 'videos') {
            $name = Product::find($id)->image;
            $path = "images/products/{$name}";
        } else if($table === 'users') {
            $name = User::find($id)->image;
            $path = 'images/users/' . $name;
        }

        if(file_exists($path)) unlink($path);

        return DB::transaction(function() use ($id, $model) {
            if($model::destroy($id)) return json_encode(['success' => true]);

            return json_encode([
                'success' => false,
                'msg'     => 'unable to delete record.'
            ]);
        });
    }
}
