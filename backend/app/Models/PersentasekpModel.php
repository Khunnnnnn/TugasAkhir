<?php

namespace App\Models;

use CodeIgniter\Model;

class PersentasekpModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'persentasekepuasaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    function getPersentase()
    {
        $builder = $this->db->table('prodis');
        $builder->select('*');
        $builder->join('kepuasaanlulusan', 'prodis.id   =  kepuasaanlulusan.prodi_id ');
        $builder->join('persentasekepuasaan', 'kepuasaanlulusan.id   =  persentasekepuasaan.kepuasaanlls_id ');

        // $builder->join('prodis', '  prodis.id =    kepuasaanlulusan.id ');
        // $builder1 = $this->db->table('prodis');
        // $builder1->select('*');

        $query = $builder->get();

        return $query->getResult();
    }
    function getViewTabel($id = null)
    {
        $builder = $this->db->table('kepuasaanlulusan');
        $builder->select('* ');
        $builder->join('persentasekepuasaan', 'persentasekepuasaan.kepuasaanlls_id = kepuasaanlulusan.id');
        $builder->where('kepuasaanlulusan.id', $id);
        // $builder->join('prodis', 'prodis.id = kepuasaanlulusan.prodi_id');
        // $builder1 = $this->db->table('prodis');
        // $builder1->select('prodis.prodi');

        $query = $builder->get();
        return $query->getResult();
    }
}
