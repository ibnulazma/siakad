<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('nisn', session()->get('username'))
            ->get()->getRowArray();
    }

    public function Profile()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_siswa')
            ->get()->getRowArray();
    }

    public function DataProfile($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }
    public function SiswaEdit($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }




    //PerTingkat
    public function Jadwal($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            // ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->get()->getResultArray();
    }

    //Perkelas
    // public function AmbilMapel($id_mapel)
    // {
    //     return $this->db->table('tbl_mapel')
    //         ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
    //         ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
    //         ->where('tbl_mapel.id_kelas', $id_mapel)
    //         ->get()->getResultArray();
    // }
    //Perkelas




    public function AmbilMapel($id_mapel)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->where('tbl_mapel.id_kelas', $id_mapel)
            ->get()->getResultArray();
    }


    public function TambahJadwal($data)
    {
        $this->db->table('tbl_absen')

            ->insert($data);
    }


    // public function DataAbsen($id_siswa)
    // {
    //     return $this->db->table('tbl_absen')
    //         ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'left')
    //         ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
    //         ->where('id_siswa', $id_siswa)
    //         ->get()->getResultArray();
    // }

    public function Siswa()
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', session()->get('username'))
            ->get()->getRowArray();
    }



    public function jumlahAktif()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_daftar', '2')
            ->countAllResults();
    }
    public function jumlahNonAktif()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_daftar', '0')
            ->countAllResults();
    }
}
