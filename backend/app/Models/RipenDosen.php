<?php

namespace App\Models;

use CodeIgniter\Model;

class RipenDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ripendosens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dosen','tahun_lulus','program_pendidikan','perguruan_tinggi','jurusan','program_studi'];

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

    function getRipen()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ripendosens');
        $builder->select('*');
        $builder->join('users', 'users.id = ripendosens.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();

    }
}
