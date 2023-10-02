<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {

        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    { {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_login', $data);
        }
    }


    public function ceklogin()
    {
        if ($this->validate(
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ]
        )) {

            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');


            $ceksiswa = $this->ModelAuth->loginsiswa($username, $password);
            if ($ceksiswa) {
                session()->set('username', $ceksiswa['nisn']);
                session()->set('nama', $ceksiswa['nama_siswa']);
                // session()->set('foto', $ceksiswa['foto']);
                session()->set('level', 'siswa');
                return redirect()->to(base_url('siswa'));
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->to(base_url('auth'));
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/auth')->withInput()->with('validation', $validation);
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Thanks, Are You Logged Out!!');
        return redirect()->to(base_url('auth'));
    }

    public function loginguru()
    { {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_loginguru', $data);
        }
    }

    public function cekloginguru()
    {
        if ($this->validate(
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ]
        )) {

            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');


            $cekguru = $this->ModelAuth->loginguru($username, $password);
            if ($cekguru) {
                session()->set('username', $cekguru['niy']);
                session()->set('nama', $cekguru['nama_guru']);
                // session()->set('foto', $cekguru['foto_siswa']);
                session()->set('level', 'pendidik');
                return redirect()->to(base_url('pendidik'));
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->to(base_url('auth/loginguru'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/loginguru');
        }
    }
}
