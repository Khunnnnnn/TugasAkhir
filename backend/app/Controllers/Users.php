<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Exception;
use Firebase\JWT\Key;
class Users extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {

        $userModel = new UserModel;

        return $this->respond(['users' => $userModel->findAll()], 200);
    }

}
