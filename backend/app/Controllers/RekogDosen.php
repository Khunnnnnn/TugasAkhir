<?php

namespace App\Controllers;

use App\Models\RekognisiDosen;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

use Firebase\JWT\Key;
use Firebase\JWT\JWT;

class RekogDosen extends ResourceController
{
    protected $modelName = 'App\Models\RekognisiDosen';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $dosen = new RekognisiDosen();
        return $this->respond(['rekog' => $dosen->getRekog()], 200);
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
            'files' => [
                'rules' => 'uploaded[files]|mime_in[files,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[files,50000]',
                'errors' => [
                    'max_size' => 'maksimal upload file 5 mb !',
                    'uploaded' => 'silahkan pilih file anda !'
                ]
            ],
            'rekognisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nama rekognisi !',

                ],
            ],
            'bidang_keahlian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis bidang keahlian !',

                ],
            ],
            'deskripsi_bukti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis deskripsi  !',

                ],
            ],
            'tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keterangan  !',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keterangan  !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {
            // mengambil nilai file dari vue
            $file = $this->request->getFile('files');
            // mengambil nama file
            $filename =  $file->getName();
            // memindahkan file
            $file->move(ROOTPATH . 'public\dokumentb8');

            //get request from Postman and more
            $key = getenv('TOKEN_SECRET');
            $header = $this->request->getServer('HTTP_AUTHORIZATION');
            if (!$header) return $this->failUnauthorized('Token Required');
            $token = explode(' ', $header)[1];
            $dosen = new UserModel;
            $decoded = JWT::decode($token, new Key($key, "HS256"));
            $id_dosen = $dosen->where('id', $decoded->uid)->first();
            $ipk = $this->model->insert([
                'id_dosen'     => $id_dosen['id'],
                'rekognisi'   => $this->request->getPost('rekognisi'),
                'bidang_keahlian'     => $this->request->getPost('bidang_keahlian'),
                'deskripsi_bukti'     => $this->request->getPost('deskripsi_bukti'),
                'tingkat'     => $this->request->getPost('tingkat'),
                'tahun'     => $this->request->getPost('tahun'),
                'files' => $filename
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
