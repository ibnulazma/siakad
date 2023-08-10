<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeserta extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status', '1')
            ->get()
            ->getResultArray();
    }
    public function verifikasi()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
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

    public function DataPeserta($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }
}
