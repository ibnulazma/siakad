<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSetting extends Model
{
    public function Profile()
    {
        return $this->db->table('tbl_profile')
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_tinggal')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_tinggal')
            ->where('id_tinggal', $data['id_tinggal'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_tinggal')
            ->where('id_tinggal', $data['id_tinggal'])
            ->delete($data);
    }
}
