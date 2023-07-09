<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelWilayah;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelTinggal;
use App\Models\ModelTransportasi;
use App\Models\ModelPenghasilan;



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
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
    }


    public function index()
    {
        session();

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
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
        ];
        return view('siswa/v_profile', $data);
    }


    public function edit_siswa($id_siswa)
    {
        // if ($this->validate([
        //     'nama_siswa' => [
        //         'label' => 'Nama Siswa',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'tempat_lahir' => [
        //         'label' => 'Tempat Lahir',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'tanggal_lahir' => [
        //         'label' => 'Tanggal Lahir',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'alamat' => [
        //         'label' => 'Alamat',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     // 'provinsi' => [
        //     //     'label' => 'Provinsi',
        //     //     'rules' => 'required',
        //     //     'errors' => [
        //     //         'required' => '{field} harus dipilih'
        //     //     ]
        //     // ],
        //     // 'kabupaten' => [
        //     //     'label' => 'Kabupaten',
        //     //     'rules' => 'required',
        //     //     'errors' => [
        //     //         'required' => '{field} harus pilih'
        //     //     ]
        //     // ],
        //     // 'kecamatan' => [
        //     //     'label' => 'Kecamatan',
        //     //     'rules' => 'required',
        //     //     'errors' => [
        //     //         'required' => '{field} harus diisi'
        //     //     ]
        //     // ],
        //     // 'desa' => [
        //     //     'label' => 'Desa/Kel',
        //     //     'rules' => 'required',
        //     //     'errors' => [
        //     //         'required' => '{field} harus dipilih'
        //     //     ]
        //     // ],
        //     'no_telp' => [
        //         'label' => 'No Telp',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],

        //     'kip' => [
        //         'label' => 'Pilih Punya KIP',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'tinggi' => [
        //         'label' => 'Tinggi Badan',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'berat' => [
        //         'label' => 'Berat',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'penyakit' => [
        //         'label' => 'Penyakit',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'tinggal' => [
        //         'label' => 'Tinggal',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'transportasi' => [
        //         'label' => 'Transportasi',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'anak_ke' => [
        //         'label' => 'Anak Ke',
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        // ])) {

        $data = [
            'id_siswa'       => $id_siswa,
            'nik'           => $this->request->getPost('nik'),
            'nisn'          => $this->request->getPost('nisn'),
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'no_kip'        => $this->request->getPost('no_kip'),
            'kip'           => $this->request->getPost('kip'),
            'anak_ke'       => $this->request->getPost('anak_ke'),
            'alamat'        => $this->request->getPost('alamat'),
            'rt'            => $this->request->getPost('rt'),
            'rw'            => $this->request->getPost('rw'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'kabupaten'     => $this->request->getPost('kabupaten'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'desa'          => $this->request->getPost('desa'),
            'tinggal'       => $this->request->getPost('tinggal'),
            'transportasi'  => $this->request->getPost('transportasi'),
            'tinggi'        => $this->request->getPost('tinggi'),
            'berat'         => $this->request->getPost('berat'),
            'penyakit'      => $this->request->getPost('penyakit'),
            'lingkar'      => $this->request->getPost('lingkar'),
            'hobi'         => $this->request->getPost('hobi'),
            'cita_cita'    => $this->request->getPost('cita_cita'),
            'seri_ijazah'  => $this->request->getPost('seri_ijazah'),

        ];
        $this->ModelSiswa->edit($data);
        return redirect()->to('siswa/edit_orangtua/' . $id_siswa);
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }

    // biodata siswa


    //Orang Tua

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
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/v_edit_orangtua', $data);
    }

    public function editortu($id_siswa)
    {


        $data = [
            'id_siswa'          => $id_siswa,
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'didik_ibu'         => $this->request->getPost('didik_ibu'),
            'didik_ayah'        => $this->request->getPost('didik_ayah'),
            'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
            'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
            'telp_ayah'         => $this->request->getPost('telp_ayah'),
            'telp_ibu'          => $this->request->getPost('telp_ibu'),
            'nik_ibu'           => $this->request->getPost('nik_ibu'),
            'nik_ayah'          => $this->request->getPost('nik_ayah'),
            'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
            'tahun_ibu'         => $this->request->getPost('tahun_ibu'),
            'status_daftar'     => 1


        ];
        $this->ModelSiswa->edit($data);
        return redirect()->to('siswa');
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }
    //Orangtua

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
