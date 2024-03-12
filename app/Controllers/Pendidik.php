<?php

namespace App\Controllers;

use App\Models\ModelPendidik;
use App\Models\ModelJadwal;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelSurat;
use \Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pendidik extends BaseController
{

    public function __construct()
    {
        $this->ModelPendidik = new ModelPendidik();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSurat = new ModelSurat();
        $this->siswa = new ModelSiswa();
    }

    public function index()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'guru'          => $this->ModelPendidik->DataGuru(),
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/v_dashboard', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'profile',
            'submenu'       => 'profile',
            'data'          => $this->ModelPendidik->DataGuru(),
        ];
        return view('guru/profile', $data);
    }

    // public function jadwal()
    // {
    //     $guru = $this->ModelPendidik->DataGuru();
    //     $data = [
    //         'title' => 'SIAKAD',
    //         'subtitle' => 'Jadwal Mengajar',
    //         'menu'          => 'pendidik',
    //         'submenu'       => 'pendidik',
    //         'jadwal' => $this->ModelPendidik->Jadwal($guru['id_guru'])
    //     ];
    //     return view('guru/jadwal', $data);
    // }
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
            'title'         => 'SIAKAD',
            'subtitle'      => 'Absen Kelas',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'absen'         => $this->ModelPendidik->Mapel($guru['id_guru'])
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
        return view('guru/pengajuan', $data);
    }

    public function nilai()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'menu' => 'nilai',
            'submenu' => 'nilai',
            'subtitle' => 'Penilaian ',
            'ambilmapel' => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/nilai/nilai', $data);
    }




    public function eksporexcel()
    {

        $siswa =   $this->siswa->AllData();


        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama');
        $activeWorksheet->setCellValue('C1', 'Jenis Kelamin');
        $activeWorksheet->setCellValue('D1', 'Tanggal Lahir');


        $column = 2;
        foreach ($siswa as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nama_siswa);
            $sheet->setCellValue('C' . $column, $value->jenis_kelamin);
            $sheet->setCellValue('D' . $column, $value->tanggal_lahir);

            $column++;
        }


        $writer = new Xlsx($spreadsheet);
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=data anak.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function pengajuan()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'menu' => 'pengajuan',
            'submenu' => 'pengajuan',
            'subtitle' => 'Pengajuan Mutasi Peserta Didik',
            'pengajuan' => $this->ModelPendidik->mutasi($guru['id_guru']),

        ];
        return view('guru/pengajuan', $data);
    }


    public function konfirmasi($id_mutasi)
    {
        $data = [
            'id_mutasi' => $id_mutasi,
            'status' => 2
        ];
        $this->ModelSurat->konfirmasi($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('pendidik/pengajuan'));
    }
    public function printmutasi($id_mutasi)
    {

        $dompdf = new Dompdf();
        // $siswa = $this->ModelSiswa->DataSiswa($id_siswa);
        $data = [
            'title'         =>  'Surat Permohonan Mutasi Siswa',
            'mutasi'     => $this->ModelSurat->detail_data($id_mutasi),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('guru/print_mutasi', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }
}
