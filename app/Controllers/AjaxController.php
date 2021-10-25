<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Nabz\Models\DB;

class AjaxController extends BaseController
{
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
                'msg' => 'unable to delete record.'
            ]);
        });


    }
}
