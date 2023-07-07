<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelWilayah;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelTinggal;



class Siswa extends BaseController
{

    public function __construct()
    {

        helper('form');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPendidikan = new ModelPendidikan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
    }


    public function index()
    {
        session();

        // $mhs = $this->ModelSiswa->Siswa();
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Siswa',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            // 'absen'         => $this->ModelSiswa->DataAbsen($mhs['id_siswa']),
            'ambilmapel'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),

        ];
        return view('siswa/v_dashboard', $data);
    }


    public function edit_profile($id_siswa)
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Update Profile',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->SiswaEdit($id_siswa),
            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'validation'    =>  \Config\Services::validation(),
        ];
        return view('siswa/v_profile', $data);
    }


    public function edit_siswa($id_siswa)
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harap Diisi',

                ]
            ],

            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kabupaten' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kecamatan' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'desa' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telp' => [
                'label' => 'No Telp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anak_ke' => [
                'label' => 'Anak Ke',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {

            $data = [
                'id_siswa'       => $id_siswa,
                'nik'           => $this->request->getPost('nik'),
                'nisn'          => $this->request->getPost('nisn'),
                'nama_siswa'    => $this->request->getPost('nama_siswa'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat'        => $this->request->getPost('alamat'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_telp'       => $this->request->getPost('no_telp'),
                'anak_ke'       => $this->request->getPost('anak_ke'),
            ];
            $this->ModelSiswa->edit($data);
            return redirect()->to('siswa/edit_orangtua/' . $id_siswa);
        } else {
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        }
    }

    // biodata siswa



    public function edit_orangtua($id_siswa)
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Update Profile',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->SiswaEdit($id_siswa),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData()
        ];
        return view('siswa/v_edit_orangtua', $data);
    }


    public function jadwal()
    {

        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Jadwal Pelajaran',
            'jadwal'    => $this->ModelSiswa->Jadwal($siswa['id_kelas']),

        ];
        return view('siswa/v_jadwal', $data);
    }


    public function absen()
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Absen',


        ];
        return view('siswa/absen/v_absen', $data);
    }

    public function AddMapel($id_jadwal)
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_siswa' => $siswa['id_siswa']
        ];

        $this->ModelSiswa->TambahJadwal($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('siswa'));
    }


    public function AddAbsen($id_mapel)
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'id_jadwal' => $id_mapel,
            'id_siswa' => $siswa['id_siswa']
        ];

        $this->ModelSiswa->TambahJadwal($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('siswa'));
    }


    public function nilai()
    {

        // $mhs = $this->ModelSiswa->Siswa();
        // $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Hasil Study',


        ];
        return view('siswa/v_nilai', $data);
    }


    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);


        echo '<option>--Pilih Kabupaten--</option>';

        foreach ($data as $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>
           ';
        }
    }
    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);


        echo '<option>--Pilih Kecamatan--</option>';

        foreach ($data as $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>
           ';
        }
    }
    public function dataDesa($id_kecamatan)
    {
        $data = $this->ModelWilayah->getDesa($id_kecamatan);


        echo '<option>--Pilih Desa/Kelurahan--</option>';

        foreach ($data as $value) {
            echo '<option value="' . $value['id_desa'] . '">' . $value['desa'] . '</option>
           ';
        }
    }
}
