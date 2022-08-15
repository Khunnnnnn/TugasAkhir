<?php

namespace App\Models;

use CodeIgniter\Model;

class BabBukuJurnal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'babbukujurnals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dosen', 'judul', 'kategori_jurnal', 'nama_jurnal', 'keterangan', 'volume', 'tahun', 'nomor', 'halaman', 'sitasi'];

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

    function getBukuJurnal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('babbukujurnals');
        $builder->select('*');
        $builder->join('users', 'users.id = babbukujurnals.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
