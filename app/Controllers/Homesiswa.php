<?php

namespace App\Controllers;

use App\Models\Siswa;

class Homesiswa extends BaseController
{
    public function index()
    {
        $model = new Siswa();
        $data = $model->findAll();

        return view('siswa', [
            'siswa' => $data
        ]);
    }

    public function save()
    {
        dd($this->request->getPost());
    }
}
