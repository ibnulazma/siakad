<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendidik extends Model
{
    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('niy', session()->get('username'))
            ->get()->getRowArray();
    }


    public function Jadwal($id_guru)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_guru', $id_guru)
            ->get()->getResultArray();
    }


    public function walas($id_guru)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->where('tbl_kelas.id_guru', $id_guru)

            ->get()->getResultArray();
    }

    public function mutasi($id_guru)
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            // ->where('status','1')
            ->where('tbl_kelas.id_guru', $id_guru)

            ->get()->getResultArray();
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
        return $this->db->table('tbl_absen')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_absen.id_siswa', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('tbl_absen.id_mapel', $id_mapel)
            ->get()->getResultArray();
    }


    public function addsiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_siswa.id_kelas')
            ->get()->getResultArray();
    }
}
