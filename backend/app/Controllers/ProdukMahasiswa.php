<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ProdukMahasiswa extends ResourceController
{
    protected $modelName = 'App\Models\ProdukMahasiswaModel';
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
                    'nama_produk'     => $json->nama_produk,
                    'deskripsi'   => $json->deskripsi,
                    'tahun'     => $json->tahun,
                    'deskripsi_bukti'     => $json->deskripsi_bukti,
                    'file_bukti'     => $json->file_bukti //KIRIM GAMBAR
                ]);
            }
            // 'nama_produk'     => $this->request->getPost('nama_produk'),
            // 'deskripsi'   => $this->request->getPost('deskripsi'),
            // 'tahun'     => $this->request->getPost('tahun'),
            // 'deskripsi_bukti'     => $this->request->getPost('deskripsi_bukti'),
            // 'file_bukti'     => $this->request->getPost('file_bukti')
            // aturan files
            $validationRule = [
                'nama_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis nama produk anda !',
                    ]
                ],
                'file_bukti' => [
                    'rules' => 'uploaded[files]|mime_in[files,image/jpg,image/jpeg,image/gif,image/png,application/pdf]|max_size[files,50000]',
                    'errors' => [
                        'max_size' => 'maksimal upload file 5 mb !',
                        'uploaded' => 'silahkan pilih file anda !'
                    ]
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
                    'nama_produk'     => $this->request->getPost('nama_produk'),
                    'deskripsi'   => $this->request->getPost('deskripsi'),
                    'tahun'     => $this->request->getPost('tahun'),
                    'deskripsi_bukti'     => $this->request->getPost('deskripsi_bukti'),
                    'file_bukti' => $filename
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
                    'nama_produk'     => $json->nama_produk,
                    'deskripsi'   => $json->deskripsi,
                    'tahun'     => $json->tahun,
                    'deskripsi_bukti'     => $json->deskripsi_bukti,
                ]);
            } // aturan files
            $validationRule = [
                'nama_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'silahkan tulis nama produk anda !',
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
                    'nama_produk'     => $this->request->getPost('nama_produk'),
                    'deskripsi'   => $this->request->getPost('deskripsi'),
                    'tahun'     => $this->request->getPost('tahun'),
                    'deskripsi_bukti'     => $this->request->getPost('deskripsi_bukti'),
                    'file_bukti' => $filename

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
