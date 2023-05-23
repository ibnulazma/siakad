<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_guru')
            ->get()
            ->getResultArray();
    }
    public function detail($id_kelas)
    {
        return $this->db->table('tbl_guru')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_guru')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_guru')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_guru')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }
}
