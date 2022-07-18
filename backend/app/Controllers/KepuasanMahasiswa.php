<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KepuasanMahasiswaModel;

class KepuasanMahasiswa extends ResourceController
{
    protected $modelName = 'App\Models\KepuasanMahasiswaModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $Model = new KepuasanMahasiswaModel();

        return $this->respond(['kepmhs' => $Model->getKepmhs()], 200);
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
            'kepmhs'       => $this->model->find($id)
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
            'tahun' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'keandalan_4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keandalan anda !'
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
            $kepmhs = $this->model->insert([
                'tahun'     => $this->request->getPost('tahun'),
                'keandalan_4'   => $this->request->getPost('keandalan_4'),
                'keandalan_3'   => $this->request->getPost('keandalan_3'),
                'keandalan_2'   => $this->request->getPost('keandalan_2'),
                'keandalan_1'   => $this->request->getPost('keandalan_1'),
                'tl_keandalan'   => $this->request->getPost('tl_keandalan'),
                'daya_tanggap_4'   => $this->request->getPost('daya_tanggap_4'),
                'daya_tanggap_3'   => $this->request->getPost('daya_tanggap_3'),
                'daya_tanggap_2'   => $this->request->getPost('daya_tanggap_2'),
                'daya_tanggap_1'   => $this->request->getPost('daya_tanggap_1'),
                'tl_daya_tanggap'   => $this->request->getPost('tl_daya_tanggap'),
                'kepastian_4'   => $this->request->getPost('kepastian_4'),
                'kepastian_3'   => $this->request->getPost('kepastian_3'),
                'kepastian_2'   => $this->request->getPost('kepastian_2'),
                'kepastian_1'   => $this->request->getPost('kepastian_1'),
                'tl_kepastian'   => $this->request->getPost('tl_kepastian'),
                'empati_4'   => $this->request->getPost('empati_4'),
                'empati_3'   => $this->request->getPost('empati_3'),
                'empati_2'   => $this->request->getPost('empati_2'),
                'empati_1'   => $this->request->getPost('empati_1'),
                'tl_empati'   => $this->request->getPost('tl_empati'),
                'tangible_4'   => $this->request->getPost('tangible_4'),
                'tangible_3'   => $this->request->getPost('tangible_3'),
                'tangible_2'   => $this->request->getPost('tangible_2'),
                'tangible_1'   => $this->request->getPost('tangible_1'),
                'tl_tangible'   => $this->request->getPost('tl_tangible'),
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
        $kepmhsdata = $this->model;
        $validationRule = [
            'tahun' => [
                'rules' => 'required', //|min_length[3]
                'errors' => [
                    'required' => 'silahkan tulis tahun anda !'
                    // 'min_length' => 'panjang karakter minimal 6 huruf !'
                ],
            ],
            'keandalan_4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'silahkan tulis keandalan anda !'
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
            $kepmhs = [
                'tahun'     => $this->request->getPost('tahun'),
                'keandalan_4'   => $this->request->getPost('keandalan_4'),
                'keandalan_3'   => $this->request->getPost('keandalan_3'),
                'keandalan_2'   => $this->request->getPost('keandalan_2'),
                'keandalan_1'   => $this->request->getPost('keandalan_1'),
                'tl_keandalan'   => $this->request->getPost('tl_keandalan'),
                'daya_tanggap_4'   => $this->request->getPost('daya_tanggap_4'),
                'daya_tanggap_3'   => $this->request->getPost('daya_tanggap_3'),
                'daya_tanggap_2'   => $this->request->getPost('daya_tanggap_2'),
                'daya_tanggap_1'   => $this->request->getPost('daya_tanggap_1'),
                'tl_daya_tanggap'   => $this->request->getPost('tl_daya_tanggap'),
                'kepastian_4'   => $this->request->getPost('kepastian_4'),
                'kepastian_3'   => $this->request->getPost('kepastian_3'),
                'kepastian_2'   => $this->request->getPost('kepastian_2'),
                'kepastian_1'   => $this->request->getPost('kepastian_1'),
                'tl_kepastian'   => $this->request->getPost('tl_kepastian'),
                'empati_4'   => $this->request->getPost('empati_4'),
                'empati_3'   => $this->request->getPost('empati_3'),
                'empati_2'   => $this->request->getPost('empati_2'),
                'empati_1'   => $this->request->getPost('empati_1'),
                'tl_empati'   => $this->request->getPost('tl_empati'),
                'tangible_4'   => $this->request->getPost('tangible_4'),
                'tangible_3'   => $this->request->getPost('tangible_3'),
                'tangible_2'   => $this->request->getPost('tangible_2'),
                'tangible_1'   => $this->request->getPost('tangible_1'),
                'tl_tangible'   => $this->request->getPost('tl_tangible'),
                'prodi_id'     => $this->request->getPost('idprodi')
            ];

            $kepmhsdata->update($id, $kepmhs);

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
        $kepmhs = new KepuasanMahasiswaModel;


        $kepmhs->delete($id);

        return $this->respond([
            'statusCode' => 200,
            'message'    => 'Data Berhasil Dihapus!',
        ], 200);
    }
}
