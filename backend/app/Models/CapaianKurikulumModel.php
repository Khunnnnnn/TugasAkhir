<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianKurikulumModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'capaiankurikulums';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['prodi_id', 'semester', 'tahun', 'mata_kuliah_kompetensi', 'kuliah_responsi_tutorial', 'seminar', 'praktikum', 'konversi_kredit_jam', 'sikap', 'pengetahuan', 'keterampilan_umum', 'keterampilan_khusus', 'dokumen_rencana_pembelajaran', 'unit_penyelenggara' ];

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

    function getCapkrklm()
    {
        $builder = $this->db->table('prodis');
        $builder->select('*');
        $builder->join('capaiankurikulums', 'capaiankurikulums.prodi_id = prodis.id');
        $query = $builder->get();
        return $query->getResult();
    }
}
