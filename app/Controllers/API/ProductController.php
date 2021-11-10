<?php

namespace App\Controllers\API;

use App\Models\Product;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

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
        $products = Product::all();

        return $this->respond($products);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null) {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new() {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create() {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null) {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null) {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null) {
        //
    }
}
