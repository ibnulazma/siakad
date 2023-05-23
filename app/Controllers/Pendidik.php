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

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',

            'guru' => $this->ModelPendidik->DataGuru()
        ];
        return view('guru/v_dashboard', $data);
    }




    public function jadwal()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Jadwal Mengajar',
            'jadwal' => $this->ModelPendidik->Jadwal($guru['id_guru'])
        ];
        return view('guru/jadwal', $data);
    }

    public function PresensiKelas()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Absen Kelas',
            'absen' => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/absen/absenkelas', $data);
    }


    public function absensikelas($id_mapel)
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Presensi Peserta Didik',
            'absen' => $this->ModelPendidik->Kelas($id_mapel)
        ];
        return view('guru/absen/presensi', $data);
    }

    public function Nilai()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Penilaian ',
            'absen' => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/nilai/nilai', $data);
    }


    public function nilaisiswa($id_mapel)
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Penilaian Peserta Didik',
            'absen' => $this->ModelPendidik->Kelas($id_mapel)
        ];
        return view('guru/nilai/nilaisiswa', $data);
    }
}
