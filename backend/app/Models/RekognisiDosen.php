<?php

namespace App\Models;

use CodeIgniter\Model;

class RekognisiDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'rekognisidosens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['rekognisi','bidang_keahlian','deskripsi_bukti','files','tingkat','tahun','id_dosen'];

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

    function getRekog()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('rekognisidosens');
        $builder->select('*');
        $builder->join('users', 'users.id = rekognisidosens.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();

    }
}
