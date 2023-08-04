<?php

namespace App\Controllers;

use App\Models\Surat;

class Home extends BaseController
{


    public function index()
    {
        $model = new Surat();
        $data = $model->findAll();

        return view('surat', [
            'siswa' => $data
        ]);
    }
}
