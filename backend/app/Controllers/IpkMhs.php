<?php

namespace App\Controllers;

use App\Models\IpkMahasiswaModel;
use CodeIgniter\RESTful\ResourceController;


class IpkMhs extends ResourceController
{
    protected $modelName = 'App\Models\IpkMahasiswaModel';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $IpkModel = new IpkMahasiswaModel();

        return $this->respond(['ipk' => $IpkModel->getIpk()], 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return $this->respond([
            'statusCode' => 200,
            'message'    => 'OK',
            'ipk'       => $this->model->find($id)
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
        // aturan files
        $validationRule = [

            'tahun' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'silahkan tulis tahun  !',

                ],
            ],
            'idprodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan pilih prodi  !',

                ],
            ],
            'jumlahlulusan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis jumlahlulusan !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkmin' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkmin  !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkmax' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkmax  !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkavg' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkavg !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $ipk = $this->model->insert([
                'tahun'     => $this->request->getPost('tahun'),
                'jumlah_lulusan'   => $this->request->getPost('jumlahlulusan'),
                'ipk_min'     => $this->request->getPost('ipkmin'),
                'ipk_max'     => $this->request->getPost('ipkmax'),
                'ipk_avg'     => $this->request->getPost('ipkavg'),
                'prodi_id'     => $this->request->getPost('idprodi'),
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
        $ipkmhs = $this->model;
        // aturan files
        $validationRule = [

            'tahun' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'silahkan tulis tahun  !',

                ],
            ],
            'idprodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan pilih prodi  !',

                ],
            ],
            'jumlahlulusan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis jumlahlulusan !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkmin' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkmin  !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkmax' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkmax  !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
            'ipkavg' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'silahkan tulis ipkavg !',
                    'numeric' => 'hanya bisa memasukan numeric !'
                ],
            ],
        ];

        if ($this->validate($validationRule)) {

            //get request from Postman and more
            $ipk = [
                'tahun'     => $this->request->getPost('tahun'),
                'jumlah_lulusan'   => $this->request->getPost('jumlahlulusan'),
                'ipk_min'     => $this->request->getPost('ipkmin'),
                'ipk_max'     => $this->request->getPost('ipkmax'),
                'ipk_avg'     => $this->request->getPost('ipkavg'),
                'prodi_id'     => $this->request->getPost('idprodi'),
            ];

            $ipkmhs->update($id, $ipk);

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
        $ipk = new IpkMahasiswaModel;


        $ipk->delete($id);

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'Data Berhasil Dihapus!',
        ], 200);
    }
}
