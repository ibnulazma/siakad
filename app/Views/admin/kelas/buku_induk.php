<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<title>Document</title>
</head>

<body>


    <div class="container" style="margin-top: 20px;">
        <table>
            <thead>
                <tr>
                    <th colspan="5" class="text-center">LEMBAR BUKU INDUK SISWA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">NOMOR INDUK SISWA</td>
                    <td>:</td>
                    <td><?= $siswa['nis'] ?></td>
                </tr>
                <tr>
                    <td colspan="3">NOMOR INDUK SISWA NASIONAL</td>
                    <td>:</td>
                    <td><?= $siswa['nisn'] ?></td>
                </tr>
            </tbody>
        </table>


        <table>
            <thead>
                <tr>
                    <th>A. </th>
                    <th colspan="6">KETERANGAN TENTANG DIRI SISWA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="12"></td>
                    <td>1</td>
                    <td>Nama Siswa</td>
                    <td></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Nama Lengkap</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>b. Nama Panggilan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Janis Kelamin</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Agama</td>
                    <td>:</td>
                    <td colspan="3">Islam</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td colspan="3">Indonesia</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Jumlah Saudara Kandung</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Jumlah Saudara Tiri</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Jumlah Saudara Angkat</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Anak Yatim/Yatim Piatu</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Bahasa Sehari-hari Di rumah</td>
                    <td>:</td>
                    <td colspan="3">Indonesia/Sunda</td>
                </tr>
            </tbody>
        </table>


        <table>
            <thead>
                <tr>
                    <th>B.</th>
                    <th colspan="6">KETERANGAN TEMPAT TINGGAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>12</td>
                    <td>Alamat Lengkap</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['alamat'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>a. RT/RW</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['rt'] ?>/<?= $siswa['rw'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>b. Desa/Kelurahan</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['desa'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>c. Kecamatan</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['kecamatan'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>d. Kab/Kota</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['kabupaten'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>13</td>
                    <td>Nomor Telp</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['no_telp'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>14</td>
                    <td>Tinggal Dengan</td>
                    <td>:</td>
                    <td colspan="3"><?= $siswa['tinggal'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>15</td>
                    <td>Jarak Tempat Tinggal Ke Sekolah</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>


        <table>
            <thead>
                <tr>
                    <th>C.</th>
                    <th colspan="6">KETERANGAN KESEHATAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>16</td>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>17</td>
                    <td>Penyakit Yang Pernah Diderita</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>18</td>
                    <td>TBC/Cacar/Malaria/Asma dan Lain-Lain</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>19</td>
                    <td>Kelainan Jasmani</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>20</td>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>21</td>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>D.</th>
                    <th colspan="6">KETERANGAN TENTANG AYAH KANDUNG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>22</td>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>23</td>
                    <td>Tahun Lahir</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>24</td>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>25</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>26</td>
                    <td>Penghasilan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>27</td>
                    <td>No Telp</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>E.</th>
                    <th colspan="6">KETERANGAN TENTANG IBU KANDUNG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>28</td>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>29</td>
                    <td>Tahun Lahir</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>30</td>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>31</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>32</td>
                    <td>Penghasilan</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>33</td>
                    <td>No Telp</td>
                    <td>:</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>


        <div class="text-center ">
            <a href="<?= base_url('kelas/rincian_kelas/' . $siswa['id_kelas']) ?>" class="btn btn-success ">Kembali</a>
        </div>
    </div>
    <br>

</body>

</html>