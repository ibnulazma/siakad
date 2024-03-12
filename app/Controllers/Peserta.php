<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeserta;
use App\Models\ModelKelas;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelTinggal;
use App\Models\ModelTransportasi;
use App\Models\ModelPenghasilan;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use \Dompdf\Dompdf;

class Peserta extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
        $this->ModelPendidikan = new ModelPendidikan();
    }


    public function index()
    {

        session();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'Peserta Didik',
            'menu'       => 'akademik',
            'submenu'    => 'peserta',
            'tingkat'    => $this->ModelKelas->Tingkat(),
            'kelas'      => $this->ModelKelas->kelas(),
            'peserta'    => $this->ModelPeserta->AllData(),
            'jumlverifikasi'    => $this->ModelPeserta->jmlverifikasi()

        ];
        return view('admin/peserta/v_peserta', $data);
    }

    public function verifikasi()
    {

        session();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => ' VerifikasiPeserta Didik',
            'menu'       => 'akademik',
            'submenu'    => 'peserta',
            'tingkat'    => $this->ModelKelas->Tingkat(),
            'kelas'      => $this->ModelKelas->kelas(),
            'verifikasi'    => $this->ModelPeserta->verifikasi()

        ];
        return view('admin/peserta/verifikasi', $data);
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


    public function detail_siswa($nisn)
    {
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Profil Siswa',
            'menu'      => 'akademik',
            'submenu'      => 'peserta',
            'kelas'  => $this->ModelKelas->kelas(),
            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData(),
            'siswa'     => $this->ModelPeserta->DataPeserta($nisn),
            'validation'    =>  \Config\Services::validation(),
            'rekamdidik' => $this->ModelPeserta->rekamdidik($nisn)
        ];
        return view('admin/peserta/v_detail_siswa', $data);
    }

    public function siswa_edit($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
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
                $nik            = $row[7];
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
                        'tempat_lahir'          => $tempat_lahir,
                        'tanggal_lahir'         => $tanggal_lahir,
                        'nama_ibu'              => $nama_ibu,
                        'nik'                   => $nik,
                        'password'              => $password,
                        'id_tingkat'            => $tingkat,
                        'id_ta'                 => $ta['id_ta'],
                        'status_daftar'         => 1,
                        'aktif'                 => 1,
                    ];

                    $db->table('tbl_siswa')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('pesan', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('peserta');
        }
    }
    public function uplodedit($id_siswa)
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
                $id_siswa = $row[0];
                $nis            = $row[1];
                $nama           = $row[2];
                $jk             = $row[3];
                $tempat_lahir   = $row[4];
                $tanggal_lahir  = $row[5];
                $nama_ibu       = $row[6];
                $nik            = $row[7];
                $password       = $row[8];
                $tingkat        = $row[9];
                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_siswa')->getWhere(['nisn' => $nis])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'id_siswa' => $id_siswa,
                        'nisn'                  => $nis,
                        'nama_siswa'            => $nama,
                        'jenis_kelamin'         => $jk,
                        'tempat_lahir'          => $tempat_lahir,
                        'tanggal_lahir'         => $tanggal_lahir,
                        'nama_ibu'              => $nama_ibu,
                        'nik'                   => $nik,
                        'password'              => $password,
                        'id_tingkat'            => $tingkat,
                        'id_ta'                 => $ta['id_ta'],
                        'status_daftar'         => 1,
                        'aktif'                 => 1,
                    ];

                    $db->table('tbl_siswa')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('pesan', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
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



    public function editdata($id_siswa)
    {
        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa)
        ];
        return view('admin/editdata', $data);
    }

    public function delete($id_siswa)
    {
        $db     = \Config\Database::connect();

        $data = [
            'id_siswa' => $id_siswa,
        ];
        $db->table('tbl_siswa')->delete($data);

        session()->setFlashdata('pesan', 'Peserta Didik Berhasil Di Hapus !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function print($nisn)
    {
        $dompdf = new Dompdf();

        $data = [
            'title'         =>  'Biodata Siswa',
            'datasekolah'   =>  $this->ModelSetting->Profile(),

            'siswa'     => $this->ModelPeserta->Data($nisn),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/peserta/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
    }

    public function edit_identitas($id_siswa)
    {

        $data = [
            'id_siswa'                => $id_siswa,
            'nama_siswa'            => $this->request->getPost('nama_siswa'),
            'nisn'                   => $this->request->getPost('nisn'),
            'nik'                    => $this->request->getPost('nik'),
            'tempat_lahir'           => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'nis'                    => $this->request->getPost('nis'),
            'id_kelas'               => $this->request->getPost('id_kelas'),
            'status_registrasi'      => $this->request->getPost('status_registrasi'),

        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $id_siswa);
    }

    public function update_alamat($id_siswa)
    {

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
            'kodepos'           => $this->request->getPost('kodepos'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $id_siswa);
    }

    public function update_orangtua($id_siswa)
    {
        $data = [
            'id_siswa'          => $id_siswa,
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'nik_ayah'          => $this->request->getPost('nik_ayah'),
            'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
            'didik_ayah'        => $this->request->getPost('didik_ayah'),
            'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
            'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
            'telp_ayah'         => $this->request->getPost('telp_ayah'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'nik_ibu'           => $this->request->getPost('nik_ibu'),
            'tahun_ibu'         => $this->request->getPost('tahun_ibu'),
            'didik_ibu'         => $this->request->getPost('didik_ibu'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
            'telp_ibu'          => $this->request->getPost('telp_ibu'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $id_siswa);
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



    // Cetak Halaman Persiswa

}
