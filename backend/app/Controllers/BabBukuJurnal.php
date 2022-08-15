<?php

namespace App\Controllers;

use App\Models\BabBukuJurnal as ModelsBabBukuJurnal;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class BabBukuJurnal extends ResourceController
{
    protected $modelName = 'App\Models\BabBukuJurnal';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $jurnal = new ModelsBabBukuJurnal();
        return $this->respond(['jurnal' => $jurnal->getBukuJurnal()], 200);
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
        $validationRule = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis judul !',
                ],
            ],
            'kategori_jurnal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis kategori jurnal !',
                ],
            ],
            'nama_jurnal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nama jurnal  !',
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keterangan  !',
                ],
            ],
            'volume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis volume  !',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis tahun  !',
                ],
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nomor  !',
                ],
            ],
            'halaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis halaman  !',
                ],
            ],
            'sitasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis sitasi  !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {
            //get request from Postman and more
            $key = getenv('TOKEN_SECRET');
            $header = $this->request->getServer('HTTP_AUTHORIZATION');
            if (!$header) return $this->failUnauthorized('Token Required');
            $token = explode(' ', $header)[1];
            $dosen = new UserModel;
            $decoded = JWT::decode($token, new Key($key, "HS256"));
            $id_dosen = $dosen->where('id', $decoded->uid)->first();
            $buku_jurnal = $this->model->insert([
                'id_dosen'          => $id_dosen['id'],
                'judul'             => $this->request->getPost('judul'),
                'kategori_jurnal'   => $this->request->getPost('kategori_jurnal'),
                'nama_jurnal'       => $this->request->getPost('nama_jurnal'),
                'keterangan'        => $this->request->getPost('keterangan'),
                'volume'            => $this->request->getPost('volume'),
                'tahun'             => $this->request->getPost('tahun'),
                'nomor'             => $this->request->getPost('nomor'),
                'halaman'           => $this->request->getPost('halaman'),
                'sitasi'            => $this->request->getPost('sitasi'),
            ]);
            return $this->respond([
                'statusCode' => 201,
                'message'    => "sukses",
                'data' => $buku_jurnal
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
