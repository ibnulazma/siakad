<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelAbsen;
use App\Models\ModelGuru;
use App\Models\ModelTa;

class Absen extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
        $this->ModelAbsen = new ModelAbsen();
    }

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Kelas',
            'kelas'         => $this->ModelKelas->AllData(),
            'guru'          => $this->ModelGuru->AllData(),
            'tahun'         => $this->ModelTa->tahun(),

        ];
        return view('kelas/v_rombel', $data);
    }

    public function add()
    {
        $data = [
            'kelas' => $this->request->getPost('kelas'),
            'id_guru' => $this->request->getPost('id_guru'),
            'id_ta' => $this->request->getPost('id_ta'),
        ];
        $this->ModelKelas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('kelas'));
    }

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas'  => $id_kelas,
            'kelas'     => $this->request->getPost('kelas'),
        ];
        $this->ModelKelas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('kelas'));
    }

    public function rincian_kelas($id_kelas)
    {

        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Data Kelas ' . $kelas['kelas'],
            'kelas'         => $kelas,
            'guru'          => $this->ModelGuru->AllData(),
            'tahun'         => $this->ModelTa->tahun(),
            'datasiswa'   => $this->ModelKelas->datasiswa($id_kelas),
            'jml_siswa'   => $this->ModelKelas->jml_siswa($id_kelas)
        ];
        return view('kelas/v_rincian_kelas', $data);
    }
}
