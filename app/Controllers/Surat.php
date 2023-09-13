<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelSurat;

use App\Controllers\BaseController;

class Surat extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSiswa = new ModelSiswa;
        $this->ModelSurat = new ModelSurat;
    }
    public function index()
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Surat',
            'menu'      => 'surat',
            'submenu'   => 'terima'
        ];

        return view('admin/surat/terima', $data);
    }
    public function mutasi()
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Surat',
            'menu'      => 'surat',
            'submenu'   => 'mutasi',
            'siswa'     => $this->ModelSiswa->AllData(),
            'mutasi'    => $this->ModelSiswa->mutasi()
        ];

        return view('admin/surat/mutasi', $data);
    }
}
