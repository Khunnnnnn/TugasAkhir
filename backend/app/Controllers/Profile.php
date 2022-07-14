<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;
use Exception;
use Firebase\JWT\Key;




class Profile extends ResourceController
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

    public function getuser(){
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
 
        try {
            $decoded = JWT::decode($token, new Key($key, "HS256"));
            $response = [
                                'nidn' => $decoded->nidn,
                                'status' => $decoded->status
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }
}
