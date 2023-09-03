<?php

namespace App\Controllers;

use App\Models\ModelPendidik;
use App\Models\ModelJadwal;

class Pendidik extends BaseController
{

    public function __construct()
    {
        $this->ModelPendidik = new ModelPendidik();
        $this->ModelJadwal = new ModelJadwal();
    }

    public function index()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'guru'          => $guru,
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/v_dashboard', $data);
    }

    public function jadwal()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Jadwal Mengajar',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'jadwal' => $this->ModelPendidik->Jadwal($guru['id_guru'])
        ];
        return view('guru/jadwal', $data);
    }
    public function walas()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title'         => 'SIAKAD',
            'subtitle'      => 'Rombongan Belajar',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/walas', $data);
    }

    public function presensiKelas()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Absen Kelas',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'absen' => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/absen/absenkelas', $data);
    }


    public function absensikelas($id_mapel)
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Presensi Peserta Didik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'absen' => $this->ModelPendidik->Kelas($id_mapel)
        ];
        return view('guru/absen/presensi', $data);
    }

    public function nilai()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'menu' => 'nilai',
            'submenu' => 'nilai',
            'subtitle' => 'Penilaian ',
            'absen' => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/nilai/nilai', $data);
    }


    public function nilaisiswa($id_mapel)
    {

        $data = [
            'title' => 'SIAKAD',
            'menu' => 'nilai',
            'submenu' => 'nilai',
            'subtitle' => 'Penilaian Peserta Didik',
            'nilai' => $this->ModelPendidik->nilaimapel($id_mapel),

        ];
        return view('guru/nilai/nilaisiswa', $data);
    }
}
