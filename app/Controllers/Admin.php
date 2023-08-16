<?php

namespace App\Controllers;


use App\Models\ModelTa;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;
use App\Models\ModelSiswa;
use App\Models\ModelPeserta;

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
        $this->ModelPeserta = new ModelPeserta();
    }

    public function index()
    {
        $data = [
            'title'             => 'SIAKADINKA',
            'subtitle'          => 'Dashboard',
            'menu'              => 'admin',
            'submenu'           => 'admin',
            'jumlahaktif'       => $this->ModelSiswa->jumlahAktif(),
            'jumlahtidakaktif'  => $this->ModelSiswa->jumlahNonAktif(),
            'datatahun'        => $this->ModelTa->group_tahun(),
            'siswa'            => $this->ModelPeserta->verifikasi(),
            // 'pager'            => $this->ModelPeserta->pager,
            'baru'            => $this->ModelSiswa->jml_baru(),


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

    public function lembaran()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',


        ];
        return view('admin/lembaran1', $data);
    }
}
