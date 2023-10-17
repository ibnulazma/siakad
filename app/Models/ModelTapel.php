<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTapel extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_tapel')
            ->orderBy('id_tapel', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_tapel')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_tapel')
            ->where('id_tapel', $data['id_tapel'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_tapel')
            ->where('id_tapel', $data['id_tapel'])
            ->delete($data);
    }
    public function resetstatus()
    {
        $this->db->table('tbl_tapel')
            ->update(['status' => 0]);
    }
    public function statusTa()
    {
        $this->db->table('tbl_tapel')
            ->where('status', '0')
            ->get()
            ->getRowArray();
    }
    public function tahun()
    {
        return $this->db->table('tbl_tapel')
            ->where('status', '1')
            ->get()->getRowArray();
    }
}
