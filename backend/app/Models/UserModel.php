<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nidn', 'email', 'password', 'confirm_password'];

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

    function getDosen()
    {
        $name = 'dosen';
        $db      = \Config\Database::connect();
        $builder =$db->table('users');
        $builder->select('*');
        $builder->where('status_level', $name);
        $query = $builder->get();
        return $query->getResult();
    }

    function getDosentetap()
    {
        $db      = \Config\Database::connect();
        $name = 'dostap';
        $builder = $db->table('users');
        $builder->select('*');
        $builder->join('ripendosens', 'ripendosens.id_dosen = users.id');
        $builder->join('detildosens', 'detildosens.id_dosen = users.id');
        $builder->join('sertifkompdosens', 'sertifkompdosens.id_dosen = users.id');
        $builder->where('users.status_dosen', $name);
        $query = $builder->get();
        return $query->getResultArray();

    }

    function getDosennottetap()
    {
        $name = 'nodostap';
        $db      = \Config\Database::connect();
        $builder = $db->table('ripendosens');
        $builder->select('*');
        $builder->join('users', 'users.id = ripendosens.id_dosen');
        $builder->join('detildosens', 'detildosens.id = ripendosens.id_dosen');
        $builder->join('sertifkompdosens', 'sertifkompdosens.id = ripendosens.id_dosen');
        $builder->where('users.status_dosen', $name);
        $builder->orderBy('users.nama_dosen','ASC');
        $query = $builder->get();
        return $query->getResultArray();

    }
    
}
