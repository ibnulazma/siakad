<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;

class Kelas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {


        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Rombongan Kelas',
            'menu'          => 'akademik',
            'submenu'       => 'kelas',
            'kelas'         => $this->ModelKelas->AllData(),
            'guru'          => $this->ModelGuru->AllData(),
            'tingkat'         => $this->ModelKelas->Tingkat(),
        ];
        return view('admin/kelas/v_rombel', $data);
    }

    public function add()
    {
        $data = [
            'kelas' => $this->request->getPost('kelas'),
            'id_guru' => $this->request->getPost('id_guru'),
            'id_tingkat' => $this->request->getPost('id_tingkat'),
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



    // RINCIAN KELAS
    public function rincian_kelas($id_kelas)
    {
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Data Siswa Kelas ' . $kelas['kelas'],
            'menu'          => 'akademik',
            'submenu'       => 'kelas',
            'kelas'         => $kelas,
            'jml_siswa'     => $this->ModelKelas->jml_siswa($id_kelas),
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),
            'tidakpunya'    => $this->ModelKelas->siswablmpuna(),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        return view('admin/kelas/v_rincian_kelas', $data);
    }

    public function addanggota($id_siswa, $id_kelas)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->add_data($data);
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }

    public function hapusanggota($id_siswa, $id_kelas)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => 0,
        ];
        $this->ModelKelas->add_data($data);
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Hapus Dari Kelas !!!');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }




    public function detail_siswa($id_siswa)
    {

        $data = [
            'title' => 'SIAKAD',
            'menu'          => 'akademik',
            'submenu'       => 'kelas',
            'subtitle' => 'Profil Siswa',
            'siswa'     => $this->ModelKelas->DataPeserta($id_siswa)
        ];
        return view('admin/kelas/v_detail_siswa', $data);
    }

    public function bukuinduk($id_siswa)

    {
        $data = [
            'siswa'     => $this->ModelKelas->BukuInduk($id_siswa)
        ];
        return view('admin/kelas/buku_induk', $data);
    }
}
