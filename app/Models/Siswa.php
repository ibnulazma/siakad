<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table                = 'tbl_siswa';
    protected $primaryKey           = 'id_siswa';
    protected $allowedFields        = [
        'nama_siswa',
        'nisn',
        'nama_ibu',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',

    ];
}
