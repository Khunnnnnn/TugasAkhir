<?php

namespace App\Models;

use CodeIgniter\Model;

class PkmModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pkms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tema_sesuai_roadmap', 'judul_kegiatan', 'lokasi', 'tahun', 'sumber_dana_pt_mandiri', 'dana_pt_mandiri', 'sumber_dalam_negri', 'dana_dalam_negri', 'sumber_luar_negri', 'dana_luar_negri'];

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
    function getPkm()
    {
        $builder = $this->db->table('prodis');
        $builder->select('*');
        $builder->join('capaiankurikulums', 'capaiankurikulums.prodi_id = prodis.id');
        $query = $builder->get();
        return $query->getResult();
    }
}
