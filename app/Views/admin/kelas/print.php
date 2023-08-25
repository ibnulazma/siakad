<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Print Rapot</title>
</head>

<body>

    <?php foreach ($datasiswa as $key => $value) { ?>

        <table style="margin-bottom: 100px;">
            <tr>
                <th colspan="3">KETERANGAN DIRI PESERTA DIDIK</th>
            </tr>
            <tr>
                <td>1. Nama siswa</td>
                <td>:</td>
                <td><?= $value['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>2. NISN</td>
                <td>:</td>
                <td><?= $value['nisn'] ?></td>
            </tr>
            <tr>
                <td>3. TTL</td>
                <td>:</td>
                <td><?= $value['tempat_lahir'] ?>, <?= date('d F Y', strtotime($value['tanggal_lahir']))  ?></td>
            </tr>
            <tr>
                <td>4. Jenis Kelamin</td>
                <td>:</td>
                <td><?php
                    $jk = 'L';
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
                <td>Islam</td>
            </tr>
            <tr>
                <td>6. Alamat</td>
                <td>:</td>
                <td><?= $value['alamat'] ?>, RT <?= $value['rt'] ?> RW <?= $value['rw'] ?>, Desa/Kel. <?= $value['desa'] ?> Kec. </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $value['alamat'] ?></td>
            </tr>


        </table>

    <?php } ?>
</body>

</html>