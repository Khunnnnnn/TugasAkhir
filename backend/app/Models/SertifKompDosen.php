<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifKompDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sertifkompdosens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_sertif', 'id_dosen', 'keterangan', 'file_bukti'];

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

    function getSertif()
    {
        $db      = \Config\Database::connect();
        $name = 'id_dosen';
        $builder = $db->table('sertifkompdosens');
        $builder->select('*');
        $builder->join('users', 'users.id = sertifkompdosens.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();

    }
}
