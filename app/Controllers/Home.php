<?php

namespace App\Controllers;

use App\Models\ModelPpdb;
use App\Models\ModelSiswa;


class Home extends BaseController
{

    public function __construct()
    {

        helper('form');
        $this->ModelPpdb = new ModelPpdb();
        $this->ModelSiswa = new ModelSiswa();
    }
    public function index()
    {

        session();
        $data = [
            'title' => 'SIAKADINKA',
            'subtitle' => 'Home',

        ];
        return view('v_home', $data);
    }
    public function registrasi()
    {
        $data = [
            'title' => 'SIAKAD INKA'
        ];
        return view('v_registrasi', $data);
    }

    public function infosiswa()
    {
        $cari = $this->request->getVar('cari');
        if ($cari) {
            $orang =  $this->ModelSiswa->search($cari);
        } else {
            $orang = $this->ModelSiswa;
        }


        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Home',
            'siswa'     => $orang->paginate(12, 'tbl_daftar'),
            'pager'     => $this->ModelSiswa->pager

        ];
        return view('v_siswa', $data);
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('level');
        return redirect()->to(base_url('home'));
    }
}
