<?php

namespace App\Controllers;


use App\Models\ModelTa;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;
use App\Models\ModelSiswa;
use Ifsnop\Mysqldump\Mysqldump;

class Admin extends BaseController
{

    public function __construct()
    {

        helper('form', 'download', 'file');

        $this->ModelTa      = new ModelTa();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
        $this->ModelSiswa = new ModelSiswa();
    }

    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Dashboard',
            'menu'          => 'admin',
            'submenu'       => 'admin',
            'jumlahaktif'   => $this->ModelSiswa->jumlahAktif(),
            'jumlahtidakaktif' => $this->ModelSiswa->jumlahNonAktif(),
            // 'datarombel'        => $this->ModelSiswa->group_by()

        ];
        return view('admin/v_dashboard', $data);
    }



    public function daftarMurid()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'ta'            => $this->ModelTa->statusTa(),
            'jenjang'       => $this->ModelJenjang->AllData(),
        ];
        return view('ppdb/v_index', $data);
    }

    public function cetak()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'ta'            => $this->ModelTa->statusTa(),
            'jenjang'       => $this->ModelJenjang->AllData(),
        ];
        return view('ppdb/v_cetak', $data);
    }


    public function tambahSiswa()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'ta'            => $this->ModelTa->tahun(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'jenjang'       => $this->ModelJenjang->AllData(),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('ppdb/v_add', $data);
    }

    public function simpanDaftar()
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]|is_unique[tbl_ppdb.nik]',
                'errors' => [
                    'required' => '{field} Harap Diisi',
                    'min_length' => ' {field} Harus 16 Digit',
                    'is_unique' => ' {field} sudah terdaftar',

                ]
            ],
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
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


        ])) {


            $data = [
                'id_sekolah'    => $this->request->getPost('id_sekolah'),
                'id_jenjang'  => $this->request->getPost('id_jenjang'),
                'nik'           => $this->request->getPost('nik'),
                'nisn'          => $this->request->getPost('nisn'),
                'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'alamat'        => $this->request->getPost('alamat'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'nama_ibu'      => $this->request->getPost('nama_ibu'),
                'no_telp'       => $this->request->getPost('no_telp'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'tgl_pendaftaran' => $this->request->getPost('tgl_pendaftaran'),
                'id_tahun'      => $this->request->getPost('id_tahun'),

            ];
            $this->ModelPpdb->add($data);
            session()->setFlashdata('pesan', 'Peserta Didik Berhasil Ditambah');
            return redirect()->to('ppdb');
        } else {
            $validation =  \Config\Services::validation();
            return redirect()->to('ppdb/tambahSiswa')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id_ppdb)
    {

        $data = [

            'id_ppdb'       => $id_ppdb,
            'id_sekolah'    => $this->request->getPost('id_sekolah'),
            'id_jenjang'    => $this->request->getPost('id_jenjang'),
            'nik'           => $this->request->getPost('nik'),
            'nisn'          => $this->request->getPost('nisn'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'nama_ibu'      => $this->request->getPost('nama_ibu'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),

        ];
        $this->ModelPpdb->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('ppdb'));
    }

    public function delete($id_ppdb)
    {
        $data = [
            'id_ppdb' => $id_ppdb,
        ];
        $this->ModelPpdb->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('ppdb'));
    }
    public function siswaMI()

    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'PESERTA DIDIK Dari MI',
            'ppdb'       => $this->ModelPpdb->AllData(),
            'ta'         => $this->ModelTa->AllData(),
            'sekolah'    => $this->ModelSekolah->AllData(),
            'mi'         => $this->ModelPpdb->dataMI(),
        ];
        return view('ppdb/mi', $data);
    }
    public function siswaSD()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'PD SD',
            'ppdb'       => $this->ModelPpdb->AllData(),
            'ta'         => $this->ModelTa->AllData(),
            'sekolah'    => $this->ModelSekolah->AllData(),
            'sd'         => $this->ModelPpdb->dataSD(),
        ];
        return view('ppdb/sd', $data);
    }

    public function laporan()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'Laporan Data Pendaftaran',
            'ppdb'       => $this->ModelPpdb->AllData(),
            'ta'         => $this->ModelTa->AllData(),
            'sekolah'    => $this->ModelSekolah->getSekolah(),
        ];
        return view('ppdb/v_laporan', $data);
    }

    public function dataSiswa($id_sekolah)
    {
        $data = $this->ModelSekolah->getSiswa($id_sekolah);
        $no = 1;
        foreach ($data as $value) {
            echo '<tr>
            <td>' . $no++ . '</td>
            <td>' . ucwords($value['nama_lengkap']) . '</td>
            <td>' . ucwords($value['jenis_kelamin']) . '</td>
            </tr>';
        }
    }

    public function dataAsalSekolah($id_jenjang)
    {
        $data = $this->ModelJenjang->getAsalSekolah($id_jenjang);

        echo '<option>--Pilih Sekolah--</option>';

        foreach ($data as $value) {
            echo '<option value="' . $value['id_sekolah'] . '">' . $value['sekolah'] . '</option>
           ';
        }
    }

    public function frontend()
    {
        $data = [];
        return view('template/frontend', $data);
    }


    public function backup()
    {
        try {
            $tglSekarang = date('dym');
            $dump = new Mysqldump('mysql:host=localhost;dbname=db_siakad;port=3306', 'root', '');
            $dump->start('database/databasesiakad-' . $tglSekarang . '.sql');

            $pesan = "Backup berhasil";
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('admin');
        } catch (\Exception $e) {
            $pesan = "mysqldump-php error " . $e->getMessage();
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('admin');
        }
    }
}
