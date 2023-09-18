<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSurat extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa', 'left')
            ->orderBy('tbl_siswa.nama_siswa', 'ASC')
            ->where('tbl_mutasi.status', '2')
            ->get()
            ->getResultArray();
    }
    public function detail_data($id_sekolah)
    {
        return $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $id_sekolah)
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_sekolah')
            ->insert($data);
    }

    public function konfirmasi($data)
    {
        $this->db->table('tbl_mutasi')
            ->where('id_mutasi', $data['id_mutasi'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->delete($data);
    }

    public function getSekolah()
    {
        return $this->db->table('tbl_sekolah')
            ->get()
            ->getResultArray();
    }
    public function getSiswa($id_sekolah)
    {
        return $this->db->table('tbl_ppdb')
            ->where('id_sekolah', $id_sekolah)
            ->get()
            ->getResultArray();
    }
}
