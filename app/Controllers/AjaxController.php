<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Nabz\Models\DB;

class AjaxController extends BaseController
{
    public function filterProducts() {
        $data = $this->request->getVar();

        dd($data);

        $priceString = 'products.base_price - (products.base_price * (products.discount / 100))';
        $query = Product::products()->where('products.status', 1)
            ->whereRaw("$priceString >= {$data['priceRange'][0]}")
            ->whereRaw("$priceString <= {$data['priceRange'][1]}")
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*');

        if(isset($data['categoryId'])) {
            $catDetails = Category::categoryDetails($data['categoryId']);
            $query->whereIn('products.category_id', $catDetails['catIds']);
        }

        if($request->has('category')) { $query->whereIn('categories.category_id', $data['category']); }
        if($request->has('subCategory')) { $query->whereIn('products.category_id', $data['subCategory']); }
        if($request->has('seller')) { $query->whereIn('products.seller_id', $data['seller']); }
        if($request->has('brand')) { $query->whereIn('products.brand_id', $data['brand']); }

        if(isset($_GET['sort']) && !empty($_GET['sort'])) {
            if($_GET['sort'] === "newest") {
                $query->orderByDesc('products.id');
            } elseif($_GET['sort'] === "oldest") {
                $query->orderBy('products.id');
            } elseif($_GET['sort'] === "title_asc") {
                $query->orderBy('products.title');
            } elseif($_GET['sort'] === "title_desc") {
                $query->orderByDesc('products.title');
            } elseif($_GET['sort'] === "price_asc") {
                $query->orderByRaw($priceString);
            } elseif($_GET['sort'] === "price_desc") {
                $query->orderByRaw("$priceString DESC");
            }
        }

        $products = $query->paginate($data['perPage']);

        return json_encode([
            'view' => view('partials.products.products_data', compact('products')),
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
