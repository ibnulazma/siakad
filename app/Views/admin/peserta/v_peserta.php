<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>


<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>

<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Daftar Peserta Didik</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#tambah"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>

                            <div class="tombol text-center">
                                <button class="btn btn-circle"> <i class="fa-solid fa-file-arrow-up fa-3x" style="color: #74C0FC"></i></button>
                                <p style="color:#74C0FC">Upload</p>
                            </div>

                            <div class="tombol text-center">
                                <a href="" class="btn"> <i class="fa-solid fa-cloud-arrow-down fa-3x" style="color: #74C0FC;"></i></a>
                                <p style="color:#74C0FC">Export</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-sm" style="margin-top:20px;">
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


                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data <?= $subtitle ?>
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example2">
                                    <thead>
                                        <tr class="text-center">
                                            <th><input type="checkbox"></th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>TTL</th>
                                            <th>L/P</th>
                                            <th>Tingkat</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;

                                        foreach ($peserta as $key => $value) { ?>
                                            <tr class="<?php
                                                        $hasil = "Sudah Meninggal";
                                                        if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } ?>" data-widget="expandable-table" aria-expanded="false">
                                                <td><input type="checkbox"></td>
                                                <td class="text-center"><?= $value["nis"] ?></td>
                                                <td class="text-center"><?= $value["nisn"] ?></td>
                                                <td><?= $value["nama_siswa"] ?></td>
                                                <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                                <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                                <td class="text-center"><?= $value["tingkat"] ?></td>

                                                <td class="text-center">
                                                    <?php if ($value['status_daftar'] <= 0) { ?>
                                                        <span class="badge bg-danger">keluar</span>

                                                    <?php } elseif ($value['status_daftar'] == 1) { ?>
                                                        <span class="badge bg-warning">belum aktif</span>
                                                    <?php } elseif ($value['status_daftar'] == 2) { ?>
                                                        <span class="badge bg-info">verifikasi</span>
                                                    <?php } elseif ($value['status_daftar'] == 3) { ?>
                                                        <span class="badge bg-success">aktif</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-xs btn-info" href="<?= base_url('peserta/detail_siswa/' .  $value['nisn']) ?>"> <i class="fa-solid fa-id-card-clip"></i> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal TambahManual -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('peserta/add') ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama siswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" name="nik">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Tingkat</label>
                            <select name="id_tingkat" id="" class="form-control">
                                <option value="">Pilih Tingkat</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>






<?= $this->endSection() ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideDown(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>