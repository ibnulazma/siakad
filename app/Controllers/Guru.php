<?php

namespace App\Controllers;

use App\Models\ModelGuru;

class Guru extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {


        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'PTK',
            'menu'      => 'akademik',
            'submenu'      => 'guru',
            'guru'    => $this->ModelGuru->AllData(),


        ];
        return view('admin/v_guru', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_guru' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'nuptk' => [
                'label' => 'Email',
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
                'nama_guru' => $this->request->getPost('nama_guru'),
                'nuptk'     => $this->request->getPost('nuptk'),
                'password'  => $this->request->getPost('password'),
                'foto'      => $nama_file,
            );

            $foto->move('foto', $nama_file);
            $this->ModelGuru->add($data);
            session()->setFlashdata('pesan', 'Guru Berhasil Ditambah !!!');
            return redirect()->to(base_url('guru'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru'));
        }
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
            return redirect()->to('guru');
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

                $nuptk              = $row[1];
                $nik                = $row[2];
                $nama               = $row[3];
                $jp                 = $row[4];
                $username           = $row[5];
                $password           = $row[6];
                $status             = $row[7];

                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_guru')->getWhere(['nuptk' => $nuptk])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nuptk'                 => $nuptk,
                        'nik'                   => $nik,
                        'nama_guru'             => $nama,
                        'jenis_guru'             => $jp,
                        'username'              => $username,
                        'password'              => $password,
                        'status_daftar'         => $status,
                    ];

                    $db->table('tbl_guru')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('guru');
        }
    }
}
