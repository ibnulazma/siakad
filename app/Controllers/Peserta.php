<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeserta;
use App\Models\ModelKelas;

class Peserta extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelKelas = new ModelKelas();
    }


    public function index()
    {
        session();


        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'Peserta Didik',
            'menu'      => 'akademik',
            'submenu'      => 'peserta',
            'siswa'  => $this->ModelPeserta->AllData(),
            'tingkat'  => $this->ModelKelas->Tingkat(),
            'kelas'  => $this->ModelKelas->kelas()

        ];
        return view('admin/v_peserta', $data);
    }


    public function add()
    {
        session();

        if ($this->validate([
            'nama_siswa' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',

                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],

        ])) {


            $db     = \Config\Database::connect();

            $ta = $db->table('tbl_ta')
                ->where('status', '1')
                ->get()->getRowArray();

            $data = array(
                'nama_siswa'        => $this->request->getPost('nama_siswa'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'nik'               => $this->request->getPost('nik'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getPost('tanggal_lahir'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'nisn'              => $this->request->getPost('nisn'),
                'password'          => $this->request->getPost('password'),
                'id_tingkat'        =>  $this->request->getPost('id_tingkat'),
                'id_ta'        =>  $ta['id_ta'],

            );
            $this->ModelPeserta->add($data);
            session()->setFlashdata('pesan', 'Peserta Berhasil Ditambah !!!');
            return redirect()->to(base_url('peserta'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('peserta'));
        }
    }


    public function detail_siswa($id_siswa)
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Profil Siswa',
            'menu'      => 'akademik',
            'submenu'      => 'peserta',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa)
        ];
        return view('admin/kelas/v_detail_siswa', $data);
    }

    public function upload()
    {

        $db     = \Config\Database::connect();

        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();

        $validation = \Config\Services::validation();
        $valid = $this->validate(
            [
                'fileimport' => [
                    'label' => 'Input File',
                    'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                    'error' => [
                        'uploaded' => '{field} wajib diisi',
                        'ext_in' => '{field} harus ekstensi xls atau xlsx'
                    ]
                ]
            ]
        );

        if (!$valid) {


            $this->session->setFlashdata('pesan', $validation->getError('fileimport'));
            return redirect()->to('peserta');
        } else {

            $file = $this->request->getFile('fileimport');
            $ext = $file->getClientExtension();

            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();


            $jumlaherror = 0;
            $jumlahsukses = 0;
            foreach ($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }

                $nis            = $row[1];
                $nama           = $row[2];
                $jk             = $row[3];
                $tempat_lahir   = $row[4];
                $tanggal_lahir  = $row[5];
                $nama_ibu       = $row[6];
                $nik         = $row[7];
                $password       = $row[8];
                $tingkat        = $row[9];
                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_siswa')->getWhere(['nisn' => $nis])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nisn'                  => $nis,
                        'nama_siswa'            => $nama,
                        'jenis_kelamin'         => $jk,
                        'password'              => $password,
                        'nama_ibu'              => $nama_ibu,
                        'tempat_lahir'          => $tempat_lahir,
                        'tanggal_lahir'         => $tanggal_lahir,
                        'nik'                   => $nik,
                        'id_tingkat'            => $tingkat,
                        'id_ta'                 => $ta['id_ta'],
                        'status_daftar'         => 1,
                    ];

                    $db->table('tbl_siswa')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('peserta');
        }
    }

    public function reset($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function verifikasi($id_siswa)
    {
        $data = [
            'id_siswa'      => $id_siswa,
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'status_daftar' => 3,
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }


    public function editbiodata($id_siswa)
    {
        $data = [
            'id_siswa'      => $id_siswa,
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nisn'          => $this->request->getPost('nisn'),
            'nama_ibu'   => $this->request->getPost('nama_ibu'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }
}
