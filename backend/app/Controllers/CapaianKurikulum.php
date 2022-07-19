<?php

namespace App\Controllers;

use App\Models\CapaianKurikulumModel;
use CodeIgniter\RESTful\ResourceController;

class CapaianKurikulum extends ResourceController
{
    protected $modelName = 'App\Models\CapaianKurikulumModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $Model = new CapaianKurikulumModel();

        return $this->respond(['capkrklm' => $Model->getCapkrklm()], 200);
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
            'capkrklm'       => $this->model->find($id)
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
        $validationRule = [
            'semester' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'tahun' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'idprodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan pilih prodi  !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $capkrklm = $this->model->insert([
                'semester'     => $this->request->getPost('semester'),
                'tahun'   => $this->request->getPost('tahun'),
                'mata_kuliah_kompetensi'   => $this->request->getPost('mata_kuliah_kompetensi'),
                'kuliah_responsi_tutorial'   => $this->request->getPost('kuliah_responsi_tutorial'),
                'seminar'   => $this->request->getPost('seminar'),
                'praktikum'   => $this->request->getPost('praktikum'),
                'konversi_kredit_jam'   => $this->request->getPost('konversi_kredit_jam'),
                'sikap'   => $this->request->getPost('sikap'),
                'pengetahuan'   => $this->request->getPost('pengetahuan'),
                'keterampilan_umum'   => $this->request->getPost('keterampilan_umum'),
                'keterampilan_khusus'   => $this->request->getPost('keterampilan_khusus'),
                'dokumen_rencana_pembelajaran'   => $this->request->getPost('dokumen_rencana_pembelajaran'),
                'unit_penyelenggara'   => $this->request->getPost('unit_penyelenggara'),
                
                'prodi_id'     => $this->request->getPost('idprodi')
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
    public function update($id = null)
    {
        $capkrklmdata = $this->model;
        $validationRule = [
            'semester' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'tahun' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'idprodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan pilih prodi  !',
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $capkrklm = [
                'semester'     => $this->request->getPost('semester'),
                'tahun'   => $this->request->getPost('tahun'),
                'mata_kuliah_kompetensi'   => $this->request->getPost('mata_kuliah_kompetensi'),
                'kuliah_responsi_tutorial'   => $this->request->getPost('kuliah_responsi_tutorial'),
                'seminar'   => $this->request->getPost('seminar'),
                'praktikum'   => $this->request->getPost('praktikum'),
                'konversi_kredit_jam'   => $this->request->getPost('konversi_kredit_jam'),
                'sikap'   => $this->request->getPost('sikap'),
                'pengetahuan'   => $this->request->getPost('pengetahuan'),
                'keterampilan_umum'   => $this->request->getPost('keterampilan_umum'),
                'keterampilan_khusus'   => $this->request->getPost('keterampilan_khusus'),
                'dokumen_rencana_pembelajaran'   => $this->request->getPost('dokumen_rencana_pembelajaran'),
                'unit_penyelenggara'   => $this->request->getPost('unit_penyelenggara'),
                
                'prodi_id'     => $this->request->getPost('idprodi')
            ];

            $capkrklmdata->update($id, $capkrklm);

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
    public function delete($id = null)
    {
        $kepmhs = new CapaianKurikulumModel();


        $kepmhs->delete($id);

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'Data Berhasil Dihapus!',
        ], 200);
    }
}
