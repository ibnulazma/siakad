<?php

namespace App\Controllers;

use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;


class Mapel extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Mata Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'mapel',
            'tingkat'       => $this->ModelKelas->Tingkat(),

        ];

        return view('admin/mapel/v_mapel', $data);
    }


    // Data Mapel Berdasarkan Tingkat
    public function rincian_mapel($id_tingkat)
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Mata Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'mapel',
            'mapel'          => $this->ModelMapel->rincianmapel($id_tingkat),
            'tingkat'        => $this->ModelMapel->detailTingkat($id_tingkat)
        ];
        return view('admin/mapel/v_detail', $data);
    }


    //Tambah Mapel
    public function add($id_tingkat)
    {

        $data = [

            'kode_mapel' => $this->request->getPost('kode_mapel'),
            'mapel' => $this->request->getPost('mapel'),
            'kkm' => $this->request->getPost('kkm'),
            'kelompok' => $this->request->getPost('kelompok'),
            'id_tingkat' => $id_tingkat,
        ];
        $this->ModelMapel->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('mapel/rincian_mapel/' . $id_tingkat));
    }
}
