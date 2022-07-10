<?php

namespace App\Controllers;

use App\Models\PostModel;

use CodeIgniter\RESTful\ResourceController;

class Post extends ResourceController
{
    protected $modelName = 'App\Models\PostModel';
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
                    'title'     => $json->title,
                    'content'   => $json->content
                ]);
            }



            // aturan files
            $validationRule = [
                'files' => [
                    'rules' => 'uploaded[files]|mime_in[files,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[files,50000]',
                    'errors' => [
                        'max_size' => 'maksimal upload file 5 mb !',
                        'uploaded' => 'silahkan pilih file anda !'
                    ]
                ],
                'title' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis title anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'content' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ]
            ];
            if ($this->validate($validationRule)) {
                // mengambil nilai file dari vue
                $file = $this->request->getFile('files');
                // mengambil nama file
                $filename =  $file->getName();
                // memindahkan file
                $file->move(ROOTPATH . 'public\dokumentb8');
                //get request from Postman and more
                $post = $this->model->insert([
                    'title'     => $this->request->getPost('title'),
                    'content'   => $this->request->getPost('content'),
                    'files' => $filename
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
                    'title'     => $json->title,
                    'content'   => $json->content
                ]);
            }

            // aturan files
            $validationRule = [
                'files' => [
                    'rules' => 'uploaded[files]|mime_in[files,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[files,50000]',
                    'errors' => [
                        'max_size' => 'maksimal upload file 5 mb !',
                        'uploaded' => 'silahkan pilih file anda !'
                    ]
                ],
                'title' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis title anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ],
                'content' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'silahkan tulis content anda !',
                        'min_length' => 'panjang karakter minimal 6 huruf !'
                    ],
                ]
            ];

            if ($this->validate($validationRule)) {
                // mengambil nilai file dari vue
                $file = $this->request->getFile('files');
                // mengambil nama file
                $filename =  $file->getName();
                // memindahkan file
                $file->move(ROOTPATH . 'public\dokumentb8');
                //get request from Postman and more
                $data = [
                    'title'     => $this->request->getPost('title'),
                    'content'   => $this->request->getPost('content'),
                    'files' => $filename
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
