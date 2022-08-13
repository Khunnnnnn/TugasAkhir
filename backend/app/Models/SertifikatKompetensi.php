<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatKompetensi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sertifikatkompetensis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_skema','no_sertif','tanggal_sertif','lembaga_sertifikasi','dikeluarkan_oleh','id_dosen'];

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

    function getSerkom()
    {
        $db      = \Config\Database::connect();
        // $name = 'id_dosen';
        $builder = $db->table('sertifikatkompetensis');
        $builder->select('*');
        $builder->join('users', 'users.id = sertifikatkompetensis.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
