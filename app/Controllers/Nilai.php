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
            'nilai'         => $this->ModelNilai->nilaimapel($guru['id_guru']),
        ];
        return view('guru/nilai/nilai', $data);
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
            return redirect()->to('nilai');
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

                $nisn           = $row[2];
                $pai            = $row[3];
                $pkn            = $row[4];
                $indo           = $row[5];
                $mtk            = $row[6];
                $ipa            = $row[7];
                $ips            = $row[8];
                $tik            = $row[9];
                $mhd            = $row[10];
                $tjwd           = $row[11];
                $trjm           = $row[12];
                $fiqih          = $row[13];
                $jumlah         = $row[14];

                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_nilai')->getWhere(['nisn' => $nisn])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nisn'      =>   $nisn,
                        'pai'       =>    $pai,
                        'pkn '      =>   $pkn,
                        'indo'      =>   $indo,
                        'mtk'       =>    $mtk,
                        'ipa'       =>    $ipa,
                        'ips'       =>    $ips,
                        'tik'       =>    $tik,
                        'mhd '      =>   $mhd,
                        'tjwd'      =>   $tjwd,
                        'trjmh '    =>  $trjm,
                        'fiqih '    => $fiqih,
                        'jumlah'    => $jumlah,
                        'id_ta'     => $ta['id_ta'],

                    ];

                    $db->table('tbl_nilai')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('pesan', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('nilai');
        }
    }

    public function nilaisiswa()
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
        return view('guru/nilai/nilai', $data);
    }
}
