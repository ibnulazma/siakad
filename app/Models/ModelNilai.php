<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('niy', session()->get('username'))
            ->get()->getRowArray();
    }

    public function DataKelas()
    {
        return $this->db->table('tbl_kelas')
            ->where('id_kelas')
            ->get()->getRowArray();
    }
    public function Mapel($id_guru)
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->where('tbl_mapel.id_guru', $id_guru)
            ->get()->getResultArray();
    }


    public function Kelas($id_mapel)
    {
        return $this->db->table('tbl_id_mapel')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_absen.id_siswa', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('tbl_absen.id_mapel', $id_mapel)
            ->get()->getResultArray();
    }
    public function nilaimapel($id_mapel)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_nilai.id_siswa', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // // ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_nilai.id_mapel', 'left')
            ->where('tbl_nilai.id_mapel', $id_mapel)
            ->get()->getResultArray();
    }

    public function addsiswa($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_siswa', 'tbl_siswa.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_siswa.id_kelas', 'left')
            ->where('tbl_siswa.id_kelas', $id_kelas)
            ->get()->getResultArray();
    }
}
