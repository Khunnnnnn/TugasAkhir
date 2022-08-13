<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produkdosens';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_produk','deskripsi','tahun','deskripsi_bukti','files'];

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
    function getProduk()
    {
        $name = 'dostap';
        $db      = \Config\Database::connect();
        $builder = $db->table('produkdosens');
        $builder->select('*');
        $builder->join('users', 'users.id = produkdosens.id_dosen');
        $builder->where('users.status_dosen', $name);
        $query = $builder->get();
        return $query->getResultArray();

    }
}
