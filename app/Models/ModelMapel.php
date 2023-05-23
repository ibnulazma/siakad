<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_mapel.id_tingkat', 'left')
            ->get()->getResultArray();
    }


    public function Tingkat()
    {
        return $this->db->table('tbl_tingkat')
            ->get()->getResultArray();
    }
    public function detailTingkat($id_tingkat)
    {
        return $this->db->table('tbl_tingkat')
            ->where('id_tingkat', $id_tingkat)
            ->get()->getRowArray();
    }





    public function add($data)
    {
        $this->db->table('tbl_mapel')
            ->insert($data);
    }


    // Mapel Berdasarkan Tingkat
    public function rincianmapel($id_tingkat)
    {
        return $this->db->table('tbl_mapel')
            // ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_mapel.id_tingkat', 'left')
            ->where('tbl_mapel.id_tingkat', $id_tingkat)
            ->get()->getResultArray();
    }
}
