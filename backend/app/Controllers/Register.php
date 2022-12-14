<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Register extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $rules = [
            'nidn' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]'
            ],
            'password' => [
                'rules' => 'required|min_length[6]'
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]'
            ]
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel;

            $userData = [
                'nidn' => $this->request->getVar('nidn'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'status_level' => $this->request->getVar('status_level'),

            ];
            $userModel->save($userData);

            return $this->respond(['status' => true, 'message' => 'Register berhasil'], 200);
        } else {
            $response = [
                'status' => false,
                'errors' => $this->validator->getErrors(),
            ];

            return $this->respond($response, 422);
        }
    }
}
