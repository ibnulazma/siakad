<?php

namespace App\Controllers;

use App\Models\ModelNilai;

class Nilai extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelNilai = new ModelNilai();
    }

    public function index()
    {

        $guru = $this->ModelNilai->DataGuru();
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Nilai',
            'menu'          => 'nilai',
            'submenu'       => 'nilai',
            'ambilmapel'    => $this->ModelNilai->Mapel($guru['id_guru']),
        ];
        return view('guru/nilai/nilai', $data);
    }



    public function nilaisiswa($id_mapel = 0, $id_kelas = 0)
    {


        $data = [
            'title'         => 'SIAKAD',
            'menu'          => 'nilai',
            'submenu'       => 'nilai',
            'subtitle'      => 'Penilaian Peserta Didik',
            'nilai'         => $this->ModelNilai->nilaimapel($id_mapel),
            'datasiswa'     => $this->ModelNilai->addsiswa($id_kelas),
            // 'mapel'     => $this->ModelNilai->mapelkelas($mapel['id_mapel'])

        ];
        return view('guru/nilai/nilaisiswa', $data);
    }
}
