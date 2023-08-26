<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Print Rapot</title>
</head>



<style>
    .content {
        margin-bottom: 50%;
    }

    .judul {
        font-size: 12pt;
        text-align: center;
        margin-bottom: 20px;
    }

    .isi {
        font-size: 12pt;
        margin-bottom: 5px;
    }

    table {
        margin-left: 50px;
        font-size: 12pt;
        /* margin-bottom: 50%; */
        /* width: 100%; */
    }

    /* tr {
        margin-bottom: 50px;
    } */

    .titik {
        width: 50%;
    }

    .block {
        font-weight: bold;
    }

    .left {
        margin-left: 50px;
    }

    .foto {

        width: 90px;
        height: 119px;
        margin-top: 50px;
        margin-left: 50px;
        padding: 20px;
        float: left;
    }

    .ukuran {
        text-align: center;
    }

    .ttd {
        margin-top: 50px;
    }
</style>

<body>

    <?php foreach ($datasiswa as $key => $value) { ?>

        <div class="content">
            <div class="container">
                <h5 class="judul text-center"> KETERANGAN DIRI PESERTA DIDIK</h5>
            </div>
            <div class="tabel">
                <table>
                    <tr>
                        <td>1. Nama Lengkap</td>
                        <td class="titik">:</td>
                        <td><?= $value['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <td>2. No Induk Siswa</td>
                        <td>:</td>
                        <td><?= $value['nisn'] ?>/<?= $value['nis'] ?></td>
                    </tr>
                    <tr>
                        <td>3. Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $value['tempat_lahir'] ?>, <?= date('d F Y', strtotime($value['tanggal_lahir'])) ?> </td>
                    </tr>
                    <tr>
                        <td>4. Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <?php $jk = 'Laki-laki';
                            if ($jk == $value['jenis_kelamin']) { ?>
                                Laki-laki
                            <?php } else { ?>
                                Perempuan
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>5. Agama</td>
                        <td>:</td>
                        <td>Islam </td>
                    </tr>
                    <tr>
                        <td>6. Alamat Lengkap</td>
                        <td>:</td>
                        <td><?= $value['alamat'] ?> RT. <?= $value['rt'] ?> RW. <?= $value['rw'] ?> Desa/Kel.</span> <?= $value['desa'] ?>
                            Kec. <?= $value['kecamatan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>7. Diterima di sekolah ini</td>
                    </tr>
                    <tr class="left">
                        <td>a. Di kelas</td>
                        <td>:</td>
                        <td>7.1 </td>
                    </tr>
                    <tr class="left">
                        <td>b. Pada Tanggal</td>
                        <td>:</td>
                        <td>17 Juli 2023 </td>
                    </tr>
                    <tr class="">
                        <td>8. Orang Tua</td>
                    </tr>
                    <tr class="">
                        <td>a. Ayah</td>
                        <td>:</td>
                        <td><?= $value['nama_ayah'] ?></td>
                    </tr>
                    <tr class="">
                        <td>b. Ibu</td>
                        <td>:</td>
                        <td><?= $value['nama_ibu'] ?></td>
                    </tr>
                </table>

                <div class="ttd">
                    <table style="width: 100%;">
                        <tr>
                            <td style="border: 1px solid black;text-align:center;" width="17%"> 3x4
                            </td>
                            <td width="5%"></td>
                            <td>
                                Tangerang, <?= date('d F Y') ?><br>
                                Kepala Sekolah <br><br><br><br><br><br>
                                Fadilah, S.Ag
                            </td>
                        </tr>
                        <tr>

                        </tr>


                    </table>
                </div>
            </div>

        </div>
    <?php } ?>
</body>

</html>