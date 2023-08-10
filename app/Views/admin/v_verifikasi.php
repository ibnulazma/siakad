<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>















<?php
$session = \Config\Services::session();
if (!empty($session->getFlashdata('pesan'))) {
    echo  '<div class="alert alert-danger" role="alert">
                       
            ' . $session->getFlashdata('pesan') . '
            </div>';
}
if (!empty($session->getFlashdata('sukses'))) {
    echo  '<div class="alert alert-success" role="alert">
                       
            ' . $session->getFlashdata('sukses') . '
            </div>';
}
?>

<div class="row">
    <div class="col-md-5">

        <?= form_open_multipart('peserta/upload') ?>
        <div class="form-group">
            <div class="input-group">
                <input type="file" class="form-control" name="fileimport" id="exampleInputFile">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary" type="submit">Upload</button>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>

    <div class="col-md-7">
        <div class="input-group-append">
            <button class="input-group-text bg-success mb-3 mr-2" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus-circle mr-2"></i> Tambah Siswa</button>
            <button class="input-group-text bg-danger mb-3" id="delete-selected"> <i class="fas fa-trash-alt mr-2"></i> Hapus Banyak</button>
        </div>

    </div>
</div>

<div class="text-sm">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Data <?= $subtitle ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>#</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Nama Siswa</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Ibu Kandung</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr class="
                        <?php
                            $hasil = "Sudah Meninggal";
                            if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } else { ?>
                            
                        <?php  } ?>


                        ">
                                <td><?= $key + 1 ?></td>
                                <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' . $value['id_siswa']) ?>"><i class="fas fa-user"></i></a></td>
                                <td class="text-center"><?= $value["nisn"] ?></td>
                                <td class="text-center"><?= $value["nik"] ?></td>
                                <td><?= $value["nama_siswa"] ?></td>
                                <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                <td class="text-center"> <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                <td><?= $value["nama_ibu"] ?></td>
                                <td class="text-center"><?= $value["jenis_kelamin"] ?></td>


                                <td class="text-center">
                                    <?php if ($value['status_daftar'] <= 0) { ?>
                                        <span class="badge bg-danger">keluar</span>

                                    <?php } elseif ($value['status_daftar'] == 1) { ?>
                                        <span class="badge bg-warning">belum aktif</span>
                                    <?php } elseif ($value['status_daftar'] == 2) { ?>
                                        <span class="badge bg-info">pilih rombel</span>
                                    <?php } elseif ($value['status_daftar'] == 3) { ?>
                                        <span class="badge bg-success">aktif</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editbiodata<?= $value['id_siswa'] ?>"> <i class="fas fa-pencil"></i> </a>
                                    <a class="btn btn-xs btn-info" href="<?= base_url('peserta/bukuinduk/' .  $value['id_siswa']) ?>"> <i class="fas fa-book"></i> </a>
                                    <a class="btn btn-xs btn-danger" href="<?= base_url('peserta/delete/' .  $value['id_siswa']) ?>"> <i class="fas fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

















<?= $this->endSection() ?>