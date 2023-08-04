<?php

namespace App\Models;

use CodeIgniter\Model;

class SuartModel extends Model
{
    protected $table                = 'tbl_siswa';
    protected $primaryKey           = 'id_siswa';
    protected $allowedFields        = [
        'nama_siswa',
        'nisn',

    ];
}
