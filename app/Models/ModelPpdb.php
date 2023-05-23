<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPpdb extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_sekolah', 'tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_ppdb.id_jenjang', 'left')
            ->orderBy('nama_lengkap', 'ASC')
            ->where('status', '1')
            // ->get($limit, $start)
            ->get()
            ->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_ppdb')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_ppdb')
            ->where('id_ppdb', $data['id_ppdb'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_ppdb')
            ->where('id_ppdb', $data['id_ppdb'])
            ->delete($data);
    }

    public function dataMI()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_sekolah', 'tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah', 'left')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_ppdb.id_jenjang', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->orderBy('nama_lengkap', 'ASC')
            ->where('jenjang', 'MI')
            ->where('status', '1')
            ->get()->getResultArray();
    }
    public function dataSD()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_sekolah', 'tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah', 'left')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_ppdb.id_jenjang', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->orderBy('nama_lengkap', 'ASC')
            ->where('jenjang', 'SD')
            ->where('status', '1')
            ->get()->getResultArray();
    }
    public function jumlahTotal()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->where('status', '1')
            ->countAllResults();
    }
    public function jumlahLaki()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->where('tbl_ppdb.jenis_kelamin', 'Laki-laki')
            ->where('status', '1')
            ->countAllResults();
    }
    public function jumlahPerempuan()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->where('tbl_ppdb.jenis_kelamin', 'Perempuan')
            ->where('status', '1')
            ->countAllResults();
    }
    public function jumlahSD()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_ppdb.id_jenjang', 'left')
            ->where('tbl_ppdb.id_jenjang', '1')
            ->where('status', '1')
            ->countAllResults();
    }
    public function jumlahMI()
    {
        return $this->db->table('tbl_ppdb')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_ppdb.id_jenjang', 'left')
            ->where('tbl_ppdb.id_jenjang', '2')
            ->where('status', '1')
            ->countAllResults();
    }

    public function group_by()
    {
        $builder = $this->db->table('tbl_ppdb');
        $builder->join('tbl_sekolah', 'tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah', 'left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left');
        $builder->select('sekolah, COUNT("sekolah") AS jumlah');
        $builder->groupBy('sekolah');
        $builder->where('status', '1');
        $query = $builder->get();
        return $query;
    }

    public function group()
    {

        // return $this->db->table('tbl_ppdb')
        //     ->join('tbl_sekolah', 'tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah', 'left')
        //     ->join('tbl_ta', 'tbl_ta.id_ta = tbl_ppdb.id_tahun', 'left')
        //     // ->orderBy('tbl_ppdb.id_sekolah')
        //     ->groupBy('sekolah', 'nama_lengkap')
        //     ->where('status', '1')
        //     ->get()
        //     ->getResultArray();
        $sql = " SELECT * FROM tbl_ppdb INNER JOIN tbl_sekolah ON tbl_sekolah.id_sekolah = tbl_ppdb.id_sekolah ORDER BY sekolah  ";
        return $this->db->query($sql)->getResultArray();
    }
}
