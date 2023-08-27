<?php

namespace App\Controllers;

use App\Models\Siswa;

class Homesiswa extends BaseController
{
    public function index()
    {
        $model = new Siswa();
        $siswa = $model->findAll();

        $data = [
            'siswa' => $siswa,
            'title' => 'Surat',
            'subtitle' => 'Surat',
            'menu' => 'surat',
            'submenu' => 'surat'
        ];
        return view('admin/surat', $data);
    }

    public function save()
    {
        dd($this->request->getPost());
    }
}
