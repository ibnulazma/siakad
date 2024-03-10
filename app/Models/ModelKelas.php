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

    public function jumlahkelas()
    {
        return $this->db->table('tbl_kelas')->countAllResults();
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
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
            ->orderBy('nama_siswa', 'ASC')
            ->where('tbl_kelas.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function datanilai($id_kelas)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
            ->orderBy('nama_siswa', 'ASC')
            ->where('tbl_siswa.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function kelas()
    {
        return $this->db->table('tbl_kelas')
            // ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat')
            // ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_siswa.id_tingkat')
            // ->where('id_tingkat')
            ->orderBy('kelas', 'DESC')
            ->get()
            ->getResultArray();
    }



    // siswa yang belum dapet kelas
    public function siswablmpuna()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->orderBy('id_kelas', 'DESC')
            // ->where('id_kelas = 0')
            ->where('tbl_ta.status', '1')
            ->where('status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    // 


    public function jml_siswa($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', $id_kelas)
            // ->where('jenis_kelamin', 'Laki-laki')
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
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }


    public function BukuInduk($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    // public function kelas_grup()
    // {
    //     $builder = $this->db->table('tbl_siswa');
    //     $builder->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left');
    //     $builder->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left');
    //     $builder->select('kelas, COUNT("kelas") AS jumlah');
    //     // $builder->select('jenis_kelamin, COUNT("L") AS jkL');
    //     // $builder->select('jenis_kelamin, COUNT("P") AS jkP');
    //     $builder->where('status', '1');
    //     $builder->groupBy('ta');
    //     $query = $builder->get();
    //     return $query;
    // }



    public function halamansiswa($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->get()->getRowArray();
    }
}
