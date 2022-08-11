<?php

namespace App\Controllers;

use App\Models\SertifKompDosen;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class SertifikatDosen extends ResourceController
{
    protected $modelName = 'App\Models\SertifKompDosen';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $dosen = new SertifKompDosen;
        return $this->respond(['sertif' => $dosen->getSertif()], 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'data'       => $this->model->find($id)
        ], 200);
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
         // aturan files
         $validationRule = [
            'files' => [
                'rules' => 'uploaded[files]|mime_in[files,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[files,50000]',
                'errors' => [
                    'max_size' => 'maksimal upload file 5 mb !',
                    'uploaded' => 'silahkan pilih file anda !'
                ]
            ],
            'nama_sertifikat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nama sertifikat !',
                    
                ],
            ],
            'keterangan' => [
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
            $dosen = new UserModel;
            $ipk = $this->model->insert([
                'id_dosen'     => $dosen->insertID(),
                'nama_sertifikat'   => $this->request->getPost('nama_sertifikat'),
                'keterangan'     => $this->request->getPost('keterangan'),
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
