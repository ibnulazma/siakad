<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeserta extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }


    public function upload($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }

    public function cekdata($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)->get()->getRowArray();
    }
}
