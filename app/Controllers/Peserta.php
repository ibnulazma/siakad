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

        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'Peserta Didik',
            'menu'      => 'akademik',
            'submenu'      => 'peserta',
            'siswa'  => $this->ModelPeserta->AllData(),
            'tingkat'  => $this->ModelKelas->Tingkat()

        ];
        return view('admin/v_peserta', $data);
    }


    public function add()
    {
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!!',
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('foto');

            //merename 
            $nama_file = $foto->getRandomName();
            //jika valid

            $data = array(
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'nisn'     => $this->request->getPost('nisn'),
                'password'  => $this->request->getPost('password'),
                'foto'      => $nama_file,
                'id_tingkat'      =>  $this->request->getPost('id_tingkat'),
            );

            $foto->move('foto_siswa', $nama_file);
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
            'siswa'     => $this->ModelKelas->DataPeserta($id_siswa)
        ];
        return view('admin/kelas/v_detail_siswa', $data);
    }

    public function upload()
    {



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
                $password       = $row[4];
                $nama_ibu       = $row[5];
                $tempat_lahir   = $row[6];
                $tanggal_lahir  = $row[7];
                $status         = $row[8];
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
                        'status_daftar'         => $status,
                        'id_tingkat'            => $tingkat,
                    ];

                    $db->table('tbl_siswa')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('peserta');
        }
    }
}
