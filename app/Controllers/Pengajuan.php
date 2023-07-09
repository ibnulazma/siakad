<?php

namespace App\Controllers;

use App\Models\ModelSiswa;

use App\Controllers\BaseController;

class Pengajuan extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSiswa = new ModelSiswa();
    }


    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Pengajuan',
            'menu'          => 'pengajuan',
            'submenu'       => 'pengajuan',
            'siswa'     => $this->ModelSiswa->DataSiswa(),

        ];
        return view('siswa/v_pengajuan', $data);
    }
}
