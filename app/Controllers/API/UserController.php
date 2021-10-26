<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\ApiUser;
use Exception;

class UserController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index() {
        dd('wassuuuup');
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
    public function store() {
        $rules = ['user_id' => 'required', 'username' => 'required'];
        $messages = [
            'user_id' => [
                'required' => "Can't find existing user for creation."
            ]
        ];

        if(!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getVar();
        $data['key'] = empty($data['key']) ? null : $data['key'];

        try {
            ApiUser::updateOrcreate(['user_id' => $data['user_id']], $data);

            return createOk('Registration successful! ✔');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return createFail('Error creating api user! ❌');
        }
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
