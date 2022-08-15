<?php

namespace App\Models;

use CodeIgniter\Model;

class Ewmp extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ewmps';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dosen', 'nama_dosen', 'dtps', 'ps_yang_diakreditasi', 'ps_lain_dalam_pt', 'ps_lain_di_luar_pt', 'penelitian', 'pkm', 'tugas_tambahan_atau_penunjang', 'jumlah_sks', 'rata_rata_persemester'];

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

    function getEwmp()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ewmps');
        $builder->select('*');
        $builder->join('users', 'users.id = ewmps.id_dosen');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
