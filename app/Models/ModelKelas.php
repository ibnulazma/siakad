<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat', 'left')
            ->orderBy('tbl_kelas.id_tingkat', 'ASC')
            ->get()
            ->getResultArray();
    }


    public function DataKelas($id_kelas)
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->where('tbl_mapel.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function AllGuru()
    {
        return $this->db->table('tbl_guru')
            ->get()
            ->getResultArray();
    }


    public function Tingkat()
    {
        return $this->db->table('tbl_tingkat')
            ->get()
            ->getResultArray();
    }




    public function add($data)
    {
        $this->db->table('tbl_kelas')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }


    // DetailRombel

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()
            ->getRowArray();
    }

    // Data Siswa berdasarkan kelas
    public function datasiswa($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat')
            ->orderBy('nama_siswa', 'ASC')
            ->where('id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }



    // siswa yang belum dapet kelas
    public function siswablmpuna()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->orderBy('id_kelas', 'DESC')
            ->where('id_kelas = 0')
            ->where('status_daftar', '2')
            ->get()
            ->getResultArray();
    }
    // 


    public function jml_siswa($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', $id_kelas)
            ->where('jenis_kelamin', 'Laki-laki')
            ->countAllResults();
    }


    public function SiswaTingkat()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')

            ->get()
            ->getResultArray();
    }



    public function add_data($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    public function hapusanggota($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    ////////JADWAL PERKELAS

    public function JadwalKelas($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_jadwal.id_tingkat', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function DataPeserta($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_siswa', $id_siswa)
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }


    public function BukuInduk($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }
}
