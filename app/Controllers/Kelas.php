<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;
use \Dompdf\Dompdf;


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
            'tingkat'       => $this->ModelKelas->Tingkat(),

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
            'id_guru'     => $this->request->getPost('id_guru'),
            'id_tingkat'     => $this->request->getPost('id_tingkat'),
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
            'status_daftar' => 3,
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
            'title'     => 'SIAKAD',
            'menu'      => 'akademik',
            'submenu'   => 'kelas',
            'subtitle'  => 'Profil Siswa',
            'siswa'     => $this->ModelKelas->DataPeserta($id_siswa)
        ];
        return view('admin/kelas/v_detail_siswa', $data);
    }

    public function nilai($id_kelas)
    {

        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Data Siswa Kelas ' . $kelas['kelas'],
            'menu'          => 'akademik',
            'submenu'       => 'kelas',
            'kelas'         => $kelas,
            'jml_siswa'     => $this->ModelKelas->jml_siswa($id_kelas),
            'datanilai'     => $this->ModelKelas->datanilai($id_kelas),
        ];
        return view('admin/kelas/v_nilai', $data);
    }



    public function print($id_kelas)
    {

        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         =>   $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
    }
    public function halaman($id_kelas)
    {

        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         =>   $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/halaman', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }


    public function label($id_kelas)
    {

        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         =>   $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/label', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }
}
