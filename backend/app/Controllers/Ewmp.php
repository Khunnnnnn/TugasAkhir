<?php

namespace App\Controllers;

use App\Models\Ewmp as EwmpModels;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Ewmp extends ResourceController
{
    protected $modelName = 'App\Models\Ewmp';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $ewmp = new EwmpModels();
        return $this->respond(['ewmp' => $ewmp->getEwmp()], 200);
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
            'nama_dosen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis judul !',
                ],
            ],
            'dtps' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis kategori jurnal !',
                ],
            ],
            'ps_yang_diakreditasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nama jurnal  !',
                ],
            ],
            'ps_lain_dalam_pt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keterangan  !',
                ],
            ],
            'ps_lain_di_luar_pt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis tahun  !',
                ],
            ],
            'penelitian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis nomor  !',
                ],
            ],
            'pkm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis halaman  !',
                ],
            ],
            'tugas_tambahan_atau_penunjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis sitasi  !',
                ],
            ],
            'jumlah_sks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis sitasi  !',
                ],
            ],
            'rata_rata_persemester' => [
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
            $ewmp = $this->model->insert([
                'id_dosen'          => $id_dosen['id'],
                'nama_dosen'             => $this->request->getPost('nama_dosen'),
                'dtps'   => $this->request->getPost('dtps'),
                'ps_yang_diakreditasi'       => $this->request->getPost('ps_yang_diakreditasi'),
                'ps_lain_dalam_pt'        => $this->request->getPost('ps_lain_dalam_pt'),
                'ps_lain_di_luar_pt'            => $this->request->getPost('ps_lain_di_luar_pt'),
                'penelitian'             => $this->request->getPost('penelitian'),
                'pkm'             => $this->request->getPost('pkm'),
                'tugas_tambahan_atau_penunjang'           => $this->request->getPost('tugas_tambahan_atau_penunjang'),
                'jumlah_sks'            => $this->request->getPost('jumlah(sks)'),
                'rata_rata_persemester'            => $this->request->getPost('rata_rata_persemester'),
            ]);
            return $this->respond([
                'statusCode' => 201,
                'message'    => "sukses",
                'data' => $ewmp
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
