<?php

namespace App\Models;

use CodeIgniter\Model;

class IpkMahasiswaModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'ipkmahasiswas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['prodi_id', 'tahun', 'jumlah_lulusan', 'ipk_min', 'ipk_max', 'ipk_avg'];

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

    function getIpk()
    {
        $builder = $this->db->table('prodis');
        $builder->select('*');
        $builder->join('ipkmahasiswas', 'ipkmahasiswas.prodi_id = prodis.id');
        $query = $builder->get();
        return $query->getResult();
    }
}
