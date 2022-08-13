<?php

namespace App\Models;

use CodeIgniter\Model;

class LuaranDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'luarandosens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul','keterangan','tahun','jenis_luaran'];

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
    function getHkiA()
    {
        $db      = \Config\Database::connect();
        $name = 'hki1';
        $builder = $db->table('luarandosens');
        $builder->select('*');
        $builder->where('jenis_luaran', $name);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getHkiB()
    {
        $db      = \Config\Database::connect();
        $name = 'hki2';
        $builder = $db->table('luarandosens');
        $builder->select('*');
        $builder->where('jenis_luaran', $name);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getTeknologi()
    {
        $db      = \Config\Database::connect();
        $name = 'teknologi';
        $builder = $db->table('luarandosens');
        $builder->select('*');
        $builder->where('jenis_luaran', $name);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getBuku()
    {
        $db      = \Config\Database::connect();
        $name = 'buku';
        $builder = $db->table('luarandosens');
        $builder->select('*');
        $builder->where('jenis_luaran', $name);
        $query = $builder->get();
        return $query->getResultArray();
    }
    
}
