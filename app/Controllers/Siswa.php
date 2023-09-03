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
use App\Models\ModelMapel;




class Siswa extends BaseController
{

    public function __construct()
    {

        helper('form', 'input');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPendidikan = new ModelPendidikan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
        $this->ModelMapel = new ModelMapel();
    }


    public function index()
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Dashboard',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->DataSiswa(),

            // 'absen'         => $this->ModelSiswa->DataAbsen($mhs['id_siswa']),
            // 'ambilmapel'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),

        ];
        return view('siswa/v_dashboard', $data);
    }

    public function portofolio()
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Dashboard',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            // 'absen'         => $this->ModelSiswa->DataAbsen($mhs['id_siswa']),
            // 'ambilmapel'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),

        ];
        return view('siswa/portofolio', $data);
    }

    public function profile()
    {
        session();


        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => ' Profile',
            'menu'      => 'profile',
            'submenu' => 'profile',
            'siswa'     => $this->ModelSiswa->DataSiswa(),

            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/v_profile', $data);
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
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/edit_profile', $data);
    }


    public function edit_siswa($id_siswa)
    {
        if ($this->validate([
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rt' => [
                'label' => 'RT',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 2 Digit',
                ]
            ],

            'rw' => [
                'label' => 'RW',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => '{field} harus dipilih',
                    'min_length' => ' {field} Harus 2 Digit',
                ]
            ],
            'desa' => [
                'label' => 'Desa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kabupaten' => [
                'label' => 'Kabupaten',
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
            'kodepos' => [
                'label' => 'Kode Pos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_ayah' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tahun_ayah' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => '{field} Harus 4 Digit',
                ]
            ],
            'didik_ayah' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kerja_ayah' => [
                'label' => 'Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hasil_ayah' => [
                'label' => 'Penghasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp_ayah' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tahun_ibu' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',

                ]
            ],
            'nik_ibu' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',
                ]
            ],
            'didik_ibu' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'hasil_ibu' => [
                'label' => 'Pengasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kerja_ibu' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_ibu' => [
                'label' => 'Telp/Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tinggal' => [
                'label' => 'Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'berat' => [
                'label' => 'Berat Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggi' => [
                'label' => 'Tinggi Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'lingkar' => [
                'label' => 'Lingkar',
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
            'jml_saudara' => [
                'label' => 'Jumlah Saudara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggal' => [
                'label' => 'Tempat Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cita_cita' => [
                'label' => 'Cita-cita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],


            'seri_ijazah' => [
                'label' => 'No Seri Ijazah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_anak' => [
                'label' => 'Telp Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'no_kip'            => $this->request->getPost('no_kip'),
                'kip'               => $this->request->getPost('kip'),
                'anak_ke'           => $this->request->getPost('anak_ke'),
                'alamat'            => $this->request->getPost('alamat'),
                'rt'                => $this->request->getPost('rt'),
                'rw'                => $this->request->getPost('rw'),
                'provinsi'          => $this->request->getPost('provinsi'),
                'kabupaten'         => $this->request->getPost('kabupaten'),
                'kecamatan'         => $this->request->getPost('kecamatan'),
                'desa'              => $this->request->getPost('desa'),
                'tinggal'           => $this->request->getPost('tinggal'),
                'transportasi'      => $this->request->getPost('transportasi'),
                'kodepos'           => $this->request->getPost('kodepos'),
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
                'lingkar'           => $this->request->getPost('lingkar'),
                'telp_anak'         => $this->request->getPost('telp_anak'),
                'lingkar'           => $this->request->getPost('lingkar'),
                'berat'             => $this->request->getPost('berat'),
                'tinggi'            => $this->request->getPost('tinggi'),
                'hobi'              => $this->request->getPost('hobi'),
                'cita_cita'         => $this->request->getPost('cita_cita'),
                'seri_ijazah'       => $this->request->getPost('seri_ijazah'),
                'jml_saudara'       => $this->request->getPost('jml_saudara'),
                'status_daftar'     => 2

            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/profile');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/profile')->withInput()->with('validation', $validation);
            // return redirect()->to('siswa/profile');
        }
    }

    public function update_siswa($id_siswa)
    {
        if ($this->validate([
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rt' => [
                'label' => 'RT',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 2 Digit',
                ]
            ],

            'rw' => [
                'label' => 'RW',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => '{field} harus dipilih',
                    'min_length' => ' {field} Harus 2 Digit',
                ]
            ],
            'desa' => [
                'label' => 'Desa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kabupaten' => [
                'label' => 'Kabupaten',
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
            'kodepos' => [
                'label' => 'Kode Pos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_ayah' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tahun_ayah' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => '{field} Harus 4 Digit',
                ]
            ],
            'didik_ayah' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kerja_ayah' => [
                'label' => 'Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hasil_ayah' => [
                'label' => 'Penghasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp_ayah' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tahun_ibu' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',

                ]
            ],
            'nik_ibu' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',
                ]
            ],
            'didik_ibu' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'hasil_ibu' => [
                'label' => 'Pengasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kerja_ibu' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_ibu' => [
                'label' => 'Telp/Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tinggal' => [
                'label' => 'Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'berat' => [
                'label' => 'Berat Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggi' => [
                'label' => 'Tinggi Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'lingkar' => [
                'label' => 'Lingkar',
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
            'jml_saudara' => [
                'label' => 'Jumlah Saudara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggal' => [
                'label' => 'Tempat Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cita_cita' => [
                'label' => 'Cita-cita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],


            'seri_ijazah' => [
                'label' => 'No Seri Ijazah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_anak' => [
                'label' => 'Telp Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'no_kip'            => $this->request->getPost('no_kip'),
                'kip'               => $this->request->getPost('kip'),
                'anak_ke'           => $this->request->getPost('anak_ke'),
                'alamat'            => $this->request->getPost('alamat'),
                'rt'                => $this->request->getPost('rt'),
                'rw'                => $this->request->getPost('rw'),
                'provinsi'          => $this->request->getPost('provinsi'),
                'kabupaten'         => $this->request->getPost('kabupaten'),
                'kecamatan'         => $this->request->getPost('kecamatan'),
                'desa'              => $this->request->getPost('desa'),
                'tinggal'           => $this->request->getPost('tinggal'),
                'transportasi'      => $this->request->getPost('transportasi'),
                'kodepos'           => $this->request->getPost('kodepos'),
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
                'lingkar'           => $this->request->getPost('lingkar'),
                'telp_anak'         => $this->request->getPost('telp_anak'),
                'lingkar'           => $this->request->getPost('lingkar'),
                'berat'             => $this->request->getPost('berat'),
                'tinggi'            => $this->request->getPost('tinggi'),
                'hobi'              => $this->request->getPost('hobi'),
                'cita_cita'         => $this->request->getPost('cita_cita'),
                'seri_ijazah'       => $this->request->getPost('seri_ijazah'),
                'jml_saudara'       => $this->request->getPost('jml_saudara'),
                'status_daftar'     => 3

            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/profile');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/profile')->withInput()->with('validation', $validation);
            // return redirect()->to('siswa/profile');
        }
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

        ];
        $this->ModelSiswa->edit($data);
        return redirect()->to('siswa/edit_periodik/' . $id_siswa);
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }

    public function editperiodik($id_siswa)
    {


        $data = [
            'id_siswa'          => $id_siswa,
            'maps'              => $this->request->getPost('maps'),



        ];
        $this->ModelSiswa->edit($data);
        return redirect()->to('siswa');
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }
    //Orangtua
    public function edit_periodik($id_siswa)
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Update Profile',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->SiswaEdit($id_siswa),
        ];
        return view('siswa/edit_periodik', $data);
    }
    public function jadwal()
    {

        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Jadwal Pelajaran',
            'menu'      =>  'jadwal',
            'submenu' =>    'jadwal',
            'jadwal'    => $this->ModelSiswa->Jadwal($siswa['id_kelas']),

        ];
        return view('siswa/v_jadwal', $data);
    }

    public function tambahMapel()
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Jadwal Pelajaran',
            'menu'      =>  'jadwal',
            'submenu' =>    'jadwal',
            'jadwal'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),

        ];
        return view('siswa/v_jadwal', $data);
    }

    public function nilai()
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'    => 'Peserta Didik',
            'menu'      =>  'nilai',
            'submenu'    =>  'nilai',
            'siswa'     => $siswa,
            'ambilmapel'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),
            // 'nilai'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),
            'nilai'         => $this->ModelSiswa->DaftaNilai($siswa['id_siswa']),
        ];
        return view('siswa/nilai', $data);
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



    public function mapeladd()
    {
        $data = [
            'id_mapel'       => $this->request->getPost('id_mapel'),
            'id_siswa'        => $this->request->getPost('id_siswa'),

        ];
        $this->ModelMapel->addnilai($data);
        return redirect()->to('siswa/nilai');
    }




    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);
        echo '<option>--Pilih Kabupaten--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>';
        }
    }
    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);
        echo '<option>--Pilih Kecamatan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
    public function dataDesa($id_kecamatan)
    {
        $data = $this->ModelWilayah->getDesa($id_kecamatan);
        echo '<option>--Pilih Desa/Kelurahan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_desa'] . '">' . $value['desa'] . '</option>';
        }
    }


    public function pengajuan()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Pengajuan',
            'menu'          => 'pengajuan',
            'submenu'       => 'pengajuan',
            'siswa'     => $this->ModelSiswa->DataSiswa(),

        ];
        return view('siswa/v_pengajuan', $data);
    }


    public function ajuan($id_siswa)
    {
        $data = [
            'id_siswa'       => $id_siswa,
            'status_daftar' => 4,


        ];
        $this->ModelSiswa->edit($data);
        return redirect()->to('siswa');
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }


    public function resetdata($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelSiswa->reset($data);
        session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil Diganti !!!');
        return redirect()->to(base_url('siswa/profile'));
    }




    public function updatedata($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 4
        ];
        $this->ModelSiswa->reset($data);
        session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil Diganti !!!');
        return redirect()->to(base_url('siswa/profile'));
    }
}
