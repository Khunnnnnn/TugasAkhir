<?php

namespace App\Controllers;

use App\Models\ProgramStudiModel;
use CodeIgniter\RESTful\ResourceController;

class ProgramStudi extends ResourceController
{
    protected $modelName = 'App\Models\ProgramStudiModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    // public function index()
    // {
    //     //
    //     return $this->respond([
    //         'statusCode' => 200,
    //         'message'    => 'OK',
    //         'data'       => $this->model->orderBy('id', 'DESC')->findAll()
    //     ], 200);
    // }

    public function index()
    {
        $prodiModel = new ProgramStudiModel();

        return $this->respond(['prodi' => $prodiModel->findAll()], 200);
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
        if ($this->request) {
            //get request from Vue Js
            if ($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $post = $this->model->insert([
                    'prodi'     => $json->prodi,
                    'nama_prodi'   => $json->nama_prodi
                ]);
            }// aturan files
            $validationRule = [
                'prodi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis prodi anda !',
                    ],
                ],
                'nama_prodi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis nama prodi anda !',
                    ],
                ]
            ];
            if ($this->validate($validationRule)) {
                //get request from Postman and more
                $post = $this->model->insert([
                    'prodi'     => $this->request->getPost('prodi'),
                    'nama_prodi'   => $this->request->getPost('nama_prodi'),
                ]);
                return $this->respond([
                    'statusCode' => 201,
                    'message'    => "sukses",
                ], 201);
            } else {
                $response = [
                    'status' => false,
                    'errors' => $this->validator->getErrors(),
                ];

                return $this->respond($response, 422);
            }
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
        $post = $this->model;

        if ($this->request) {
            //get request from Vue Js
            if ($this->request->getJSON()) {

                $json = $this->request->getJSON();

                $post->update($json->id, [
                    'prodi'     => $json->prodi,
                    'nama_prodi'   => $json->nama_prodi
                ]);
            }
            
            // aturan files
            $validationRule = [
                'prodi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis prodi anda !',
                    ],
                ],
                'nama_prodi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis nama prodi anda !',
                    ],
                ]
            ];
            if ($this->validate($validationRule)) {
                //get request from Postman and more
                $data = [
                    'prodi'     => $this->request->getPost('prodi'),
                    'nama_prodi'   => $this->request->getPost('nama_prodi'),
                ];
                $post->update($id, $data);
                return $this->respond([
                    'statusCode' => 200,
                    'message'    => "sukses",
                ], 200);
            } else {
                $response = [
                    'status' => false,
                    'errors' => $this->validator->getErrors(),
                ];

                return $this->respond($response, 422);
            }
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $post = $this->model->find($id);

        if ($post) {

            $this->model->delete($id);

            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Dihapus!',
            ], 200);
        }
    }
}