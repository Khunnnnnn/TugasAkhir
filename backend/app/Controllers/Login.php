<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;

class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $nidn = $this->request->getVar('nidn');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $userModel = new UserModel;

        $user = $userModel->where('nidn', $nidn)->first();
        if (!$user) {
            return $this->respond(['status' => false, 'message' => 'Username atau Password salah'], 401);
        }

        if (!password_verify($password, $user['password'])) {
            return $this->respond(['status' => false, 'message' => 'Username atau Password salah'], 401);
        }

        $key = getenv("TOKEN_SECRET");

        $iat = time();
        $exp = $iat + (60 * 60);

        $payload = [
            'iss' => 'ci4-jwt',
            'sub' => 'logintoken',
            'iat' => $iat,
            'exp' => $exp,
            'nidn' => $nidn,
            'email'=>$user['email'],
            'status' => $user['status_level']
        ];

        $token = JWT::encode($payload, $key, "HS256");

        return $this->respond(['status' => true, 'token' => $token], 200);
    }
}
