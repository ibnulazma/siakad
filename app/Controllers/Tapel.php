<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'Tahun Akademik',
            'menu'          => 'setting',
            'submenu'       => 'Tahun Pelajaran',
            'ta'    => $this->ModelTa->AllData(),


        ];
        return view('admin/nilai/tapel', $data);
    }

    public function add()
    {
        $data = [

            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTa->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('ta'));
    }



    public function edit($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
            'ta' => $this->request->getPost('ta'),
        ];
        $this->ModelTa->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('ta'));
    }

    public function delete($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
        ];
        $this->ModelTa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('ta'));
    }
    public function statusAktif($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
            'status' => 1
        ];
        $this->ModelTa->resetstatus();
        $this->ModelTa->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil Diganti !!!');
        return redirect()->to(base_url('ta'));
    }
    public function statusNonaktif($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
            'status' => 0
        ];
        $this->ModelTa->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil Diganti !!!');
        return redirect()->to(base_url('ta'));
    }
}
