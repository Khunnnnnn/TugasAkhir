<?php

namespace App\Controllers;

use App\Models\PkmModel;
use CodeIgniter\RESTful\ResourceController;

class Pkm extends ResourceController
{
    protected $modelName = 'App\Models\PkmModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    // public function index()
    // {
    //     $Model = new PkmModel();

    //     return $this->respond(['pkm' => $Model->getPkm()], 200);
    // }

    public function index()
    {
        //
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'pkm'       => $this->model->orderBy('id', 'DESC')->findAll()
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
            'pkm'       => $this->model->find($id)
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
    // public function create()
    // {
    //     //
    //     if ($this->request) {
    //         //get request from Vue Js
    //         if ($this->request->getJSON()) {

    //             $json = $this->request->getJSON();

    //             $post = $this->model->insert([
    //                 'tema_sesuai_roadmap'     => $json->tema_sesuai_roadmap,
    //                 'judul_kegiatan'   => $json->judul_kegiatan,
    //                 'lokasi'   => $json->lokasi,
    //                 'tahun'   => $json->tahun,
    //                 'sumber_dana_pt_mandiri'   => $json->sumber_dana_pt_mandiri,
    //                 'dana_pt_mandiri'   => $json->dana_pt_mandiri,
    //                 'sumber_dalam_negri'   => $json->sumber_dalam_negri,
    //                 'dana_dalam_negri'   => $json->dana_dalam_negri,
    //                 'sumber_luar_negri'   => $json->sumber_luar_negri,
    //                 'dana_luar_negri'   => $json->dana_luar_negri
    //             ]);
    //         }
    //         // aturan files
    //         $validationRule = [
    //             'tema_sesuai_roadmap' => [
    //                 'rules' => 'required|min_length[5]',
    //                 'errors' => [
    //                     'required' => 'silahkan tulis tema sesuai roadmap anda !',
    //                     'min_length' => 'panjang karakter minimal 6 huruf !'
    //                 ],
    //             ],
    //         ];

    //         if ($this->validate($validationRule)) {
    //             //get request from Postman and more
    //             $post = $this->model->insert([
    //                 'tema_sesuai_roadmap'     => $this->request->getPost('tema_sesuai_roadmap'),
    //                 'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
    //                 'lokasi'   => $this->request->getPost('lokasi'),
    //                 'tahun'   =>$this->request->getPost('tahun'),
    //                 'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
    //                 'dana_pt_mandiri'   => $this->request->getPost('dana_pt_mandiri'),
    //                 'sumber_dalam_negri'   => $this->request->getPost('sumber_dalam_negri'),
    //                 'dana_dalam_negri'   => $this->request->getPost('dana_dalam_negri'),
    //                 'sumber_luar_negri'   => $this->request->getPost('sumber_luar_negri'),
    //                 'dana_luar_negri'   => $this->request->getPost('dana_luar_negri')
    //             ]);
    //             return $this->respond([
    //                 'statusCode' => 201,
    //                 'message'    => "sukses",
    //             ], 201);
    //         } else {
    //             $response = [
    //                 'status' => false,
    //                 'errors' => $this->validator->getErrors(),
    //             ];

    //             return $this->respond($response, 422);
    //         }
    //     }
    // }

    public function create()
    {
        $validationRule = [
            'tema_sesuai_roadmap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis tema sesuai roadmap anda !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $pkm = $this->model->insert([
                'tema_sesuai_roadmap'     => $this->request->getPost('tema_sesuai_roadmap'),
                'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
                'lokasi'   => $this->request->getPost('lokasi'),
                'tahun'   => $this->request->getPost('tahun'),
                'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
                'dana_pt_mandiri'   => $this->request->getPost('dana_pt_mandiri'),
                'sumber_dalam_negri'   => $this->request->getPost('sumber_dalam_negri'),
                'dana_dalam_negri'   => $this->request->getPost('dana_dalam_negri'),
                'sumber_luar_negri'   => $this->request->getPost('sumber_luar_negri'),
                'dana_luar_negri'   => $this->request->getPost('dana_luar_negri')
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
    // public function update($id = null)
    // {
    //     //
    //     $post = $this->model;

    //     if ($this->request) {
    //         //get request from Vue Js
    //         if ($this->request->getJSON()) {

    //             $json = $this->request->getJSON();

    //             $post->update($json->id, [
    //                 'tema_sesuai_roadmap'     => $json->tema_sesuai_roadmap,
    //                 'judul_kegiatan'   => $json->judul_kegiatan,
    //                 'lokasi'   => $json->lokasi,
    //                 'tahun'   => $json->tahun,
    //                 'sumber_dana_pt_mandiri'   => $json->sumber_dana_pt_mandiri,
    //                 'dana_pt_mandiri'   => $json->dana_pt_mandiri,
    //                 'sumber_dalam_negri'   => $json->sumber_dalam_negri,
    //                 'dana_dalam_negri'   => $json->dana_dalam_negri,
    //                 'sumber_luar_negri'   => $json->sumber_luar_negri,
    //                 'dana_luar_negri'   => $json->dana_luar_negri
    //             ]);
    //         } // aturan files
    //         $validationRule = [
    //             'tema_sesuai_roadmap' => [
    //                 'rules' => 'required|min_length[5]',
    //                 'errors' => [
    //                     'required' => 'silahkan tulis tema sesuai roadmap anda !',
    //                     'min_length' => 'panjang karakter minimal 6 huruf !'
    //                 ],
    //             ],
    //         ];

    //         if ($this->validate($validationRule)) {
    //             //get request from Postman and more
    //             $data = [
    //                 'tema_sesuai_roadmap'     => $this->request->getPost('tema_sesuai_roadmap'),
    //                 'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
    //                 'lokasi'   => $this->request->getPost('lokasi'),
    //                 'tahun'   => $this->request->getPost('tahun'),
    //                 'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
    //                 'dana_pt_mandiri'   => $this->request->getPost('dana_pt_mandiri'),
    //                 'sumber_dalam_negri'   => $this->request->getPost('sumber_dalam_negri'),
    //                 'dana_dalam_negri'   => $this->request->getPost('dana_dalam_negri'),
    //                 'sumber_luar_negri'   => $this->request->getPost('sumber_luar_negri'),
    //                 'dana_luar_negri'   => $this->request->getPost('dana_luar_negri')
    //             ];
    //             $post->update($id, $data);
    //             return $this->respond([
    //                 'statusCode' => 200,
    //                 'message'    => "sukses",
    //             ], 200);
    //         } else {
    //             $response = [
    //                 'status' => false,
    //                 'errors' => $this->validator->getErrors(),
    //             ];

    //             return $this->respond($response, 422);
    //         }
    //     }
    // }

    public function update($id = null)
    {
        $pkmdata = $this->model;
        $validationRule = [
            'tema_sesuai_roadmap' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'silahkan tulis tema sesuai roadmap anda !',
                    'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $pkm = [
                'tema_sesuai_roadmap'     => $this->request->getPost('tema_sesuai_roadmap'),
                'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
                'lokasi'   => $this->request->getPost('lokasi'),
                'tahun'   => $this->request->getPost('tahun'),
                'sumber_dana_pt_mandiri'   => $this->request->getPost('sumber_dana_pt_mandiri'),
                'dana_pt_mandiri'   => $this->request->getPost('dana_pt_mandiri'),
                'sumber_dalam_negri'   => $this->request->getPost('sumber_dalam_negri'),
                'dana_dalam_negri'   => $this->request->getPost('dana_dalam_negri'),
                'sumber_luar_negri'   => $this->request->getPost('sumber_luar_negri'),
                'dana_luar_negri'   => $this->request->getPost('dana_luar_negri')
            ];

            $pkmdata->update($id, $pkm);

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

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    // public function delete($id = null)
    // {
    //     //
    //     $post = $this->model->find($id);

    //     if ($post) {

    //         $this->model->delete($id);

    //         return $this->respond([
    //             'statusCode' => 200,
    //             'message'    => 'Data Berhasil Dihapus!',
    //         ], 200);
    //     }
    // }
    public function delete($id = null)
    {
        $Pkm = new PkmModel();


        $Pkm->delete($id);

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'Data Berhasil Dihapus!',
        ], 200);
    }
}
