<?php

namespace App\Controllers;

use App\Models\Siswa;

class Surat extends BaseController
{


    public function index()
    {
        $model = new Siswa();
        $data = $model->findAll();

        return view('surat', [
            'siswa' => $data
        ]);
    }
}
