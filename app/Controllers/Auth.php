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

            echo view('v_login', $data);
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
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
            ]

        )) {

            $level = $this->request->getPost('level');
            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');

            if ($level == 1) {
                $cekadmin = $this->ModelAuth->login($username, $password);
                if ($cekadmin) {
                    session()->set('username', $cekadmin['username']);
                    session()->set('nama', $cekadmin['nama_user']);
                    session()->set('foto', $cekadmin['foto']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('admin'));
                } else {
                    session()->setFlashdata('error', 'Username or Password is Wrong');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                $cekguru = $this->ModelAuth->loginguru($username, $password);
                if ($cekguru) {
                    session()->set('username', $cekguru['niy']);
                    session()->set('nama', $cekguru['nama_guru']);
                    // session()->set('foto', $cekguru['foto_siswa']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('pendidik'));
                } else {
                    session()->setFlashdata('error', 'Username or Password is Wrong');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 3) {
                $ceksiswa = $this->ModelAuth->loginsiswa($username, $password);
                if ($ceksiswa) {
                    session()->set('username', $ceksiswa['nisn']);
                    session()->set('nama', $ceksiswa['nama_siswa']);
                    // session()->set('foto', $ceksiswa['foto']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('siswa'));
                } else {
                    session()->setFlashdata('error', 'Username or Password is Wrong');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 4) {
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/auth')->withInput()->with('validation', $validation);
            // session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            // return redirect()->to(base_url('auth'));
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
}
