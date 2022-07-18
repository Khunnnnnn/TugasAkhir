<?php

namespace App\Models;

use CodeIgniter\Model;

class KepuasanMahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kepuasan_mahasiswas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['prodi_id', 'tahun', 'keandalan_4', 'keandalan_3', 'keandalan_2', 'keandalan_1', 'tl_keandalan', 'daya_tanggap_4', 'daya_tanggap_3', 'daya_tanggap_2', 'daya_tanggap_1', 'tl_daya_tanggap', 'kepastian_4', 'kepastian_3', 'kepastian_2', 'kepastian_1', 'tl_kepastian', 'empati_4', 'empati_3', 'empati_2', 'empati_1', 'tl_empati', 'tangible_4', 'tangible_3', 'tangible_2', 'tangible_1', 'tl_tangible'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getKepmhs()
    {
        $builder = $this->db->table('prodis');
        $builder->select('*');
        $builder->join('kepuasan_mahasiswas', 'kepuasan_mahasiswas.prodi_id = prodis.id');
        $query = $builder->get();
        return $query->getResult();
    }

}
