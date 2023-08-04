<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Surat extends BaseController
{


    public function index()
    {
        $model = new SuratModel();
        $data = $model->findAll();

        return view('transaksi', [
            'siswa' => $data
        ]);
    }
}
