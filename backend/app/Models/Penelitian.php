<?php

namespace App\Models;

use CodeIgniter\Model;

class Penelitian extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penelitians';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dosen', 'tema_sesuai_roadmap', 'judul', 'tahun', 'sumber_dana_pt_mandiri', 'dana_pt_mandiri', 'sumber_dana_negri', 'sumber_luar_negri', 'dana_luar_negri'];

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

    function getPenelitian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('penelitians');
        $builder->select('*');
        $builder->join('users', 'users.id = penelitians.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
