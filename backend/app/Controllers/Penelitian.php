<?php

namespace App\Controllers;

use App\Models\PostModel;

use CodeIgniter\RESTful\ResourceController;

class Penelitian extends ResourceController
{
    protected $modelName = 'App\Models\PenelitianModel';
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
            'data'       => $this->model->orderBy('id', 'DESC')->findAll()
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
                    'judul'     => $json->judul,
                    'tahun'   => $json->tahun,
                    'sumber_dana_pt_mandiri'   => $json->sumber_dana_pt_mandiri,
                    'dana_pt_mandiri'   => $json->dana_pt_mandiri,
                    'sumber_dalam_negeri'   => $json->sumber_dalam_negeri,
                    'dana_dalam_negeri'   => $json->dana_dalam_negeri,
                    'sumber_luar_negeri'   => $json->sumber_luar_negeri,
                    'dana_luar_negeri'   => $json->dana_luar_negeri,
                ]);
            }



            // aturan files
            $validationRule = [
                'judul' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis judul anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'tahun' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_dana_pt_mandiri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_pt_mandiri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_dalam_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_dalam_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_luar_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_luar_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ]
            ];
            if ($this->validate($validationRule)) {
                $post = $this->model->insert([
                    'judul'     => $this->request->getPost('judul'),
                    'tahun'   => $this->request->getPost('tahun'),
                    'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
                    'dana_pt_mandiri'   => $this->request->getPost('dana_pt_mandiri'),
                    'sumber_dalam_negeri'   => $this->request->getPost('sumber_dalam_negeri'),
                    'dana_dalam_negeri'   => $this->request->getPost('dana_dalam_negeri'),
                    'sumber_luar_negeri'   => $this->request->getPost('sumber_luar_negeri'),
                    'dana_luar_negeri'   => $this->request->getPost('dana_luar_negeri'),
                ]);
                return $this->respond([
                    'statusCode' => 201,
                    'message'    => "sukses",
                    // 'filename' => $filename,
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
                    'judul'     => $json->judul,
                    'tahun'   => $json->tahun,
                    'sumber_dana_pt_mandiri'   => $json->sumber_dana_pt_mandiri,
                    'dana_pt_mandiri'   => $json->dana_pt_mandiri,
                    'sumber_dalam_negeri'   => $json->sumber_dalam_negeri,
                    'dana_dalam_negeri'   => $json->dana_dalam_negeri,
                    'sumber_luar_negeri'   => $json->sumber_luar_negeri,
                    'dana_luar_negeri'   => $json->dana_luar_negeri,
                ]);
            }

            // aturan files
            $validationRule = [
                'judul' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis judul anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'tahun' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_dana_pt_mandiri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_pt_mandiri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_dalam_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_dalam_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'sumber_luar_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'dana_luar_negeri' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ]
            ];

            if ($this->validate($validationRule)) {
                $data = [
                    'judul'     => $this->request->getPost('judul'),
                    'tahun'   => $this->request->getPost('tahun'),
                    'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
                    'dana_pt_mandiri'   => $this->request->getPost('content'),
                    'sumber_dalam_negeri'   => $this->request->getPost('sumber_dalam_negeri'),
                    'dana_dalam_negeri'   => $this->request->getPost('dana_dalam_negeri'),
                    'sumber_luar_negeri'   => $this->request->getPost('sumber_luar_negeri'),
                    'dana_luar_negeri'   => $this->request->getPost('dana_luar_negeri'),
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
