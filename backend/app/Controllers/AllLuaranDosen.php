<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use Firebase\JWT\Key;
use Firebase\JWT\JWT;

class AllLuaranDosen extends ResourceController
{
    protected $modelName = 'App\Models\LuaranDosen';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->orderBy('judul', 'ASC')->findAll()
        ], 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
         //
        // aturan files
        $validationRule = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis judul !',

                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keterangan  !',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis tahun  !',
                ],
            ],
            'jenis_luaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis jenis  !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {
            //get request from Postman and more
            // $key = getenv('TOKEN_SECRET');
            // $header = $this->request->getServer('HTTP_AUTHORIZATION');
            // if (!$header) return $this->failUnauthorized('Token Required');
            // $token = explode(' ', $header)[1];
            // $dosen = new UserModel;
            // $decoded = JWT::decode($token, new Key($key, "HS256"));
            // $id_dosen = $dosen->where('id', $decoded->uid)->first();
            $ipk = $this->model->insert([
                // 'id_dosen'     => $id_dosen['id'],
                'judul'   => $this->request->getPost('judul'),
                'keterangan'     => $this->request->getPost('keterangan'),
                'tahun'     => $this->request->getPost('tahun'),
                'jenis_luaran'     => $this->request->getPost('jenis_luaran'),
            ]);
            return $this->respond([
                'statusCode' => 201,
                'message'    => "sukses",
                'data' => $ipk
            ], 201);
        } else {
            $response = [
                'status' => false,
                'errors' => $this->validator->getErrors(),
            ];

            return $this->respond($response, 422);
        }
        
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
