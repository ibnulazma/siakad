<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>


<div class="text-sm">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Data <?= $subtitle ?>
            </h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">

            <div class="float-left">
                <a href="" class="btn btn-default"><i class="fa-solid fa-file-excel"></i> Excel</a>
                <a href="" class="btn btn-default"><i class="fa-solid fa-file-pdf"></i> Pdf</a>
                <a href="" class="btn btn-default"> <i class="fa-regular fa-copy"></i> Copy</a>
            </div>
            <div class="search float-right">
                <form action="" method="get" autocomplete="off">
                    <?php $request = \Config\Services::request(); ?>
                    <div class="input-group input-group-sm mb-3" style="width: 150px;">
                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value=" <?= $request->getGet('keyword') ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
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
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (10 * ($page - 1));


                        foreach ($peserta as $key => $value) { ?>
                            <tr class="<?php
                                        $hasil = "Sudah Meninggal";
                                        if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } ?>" data-widget="expandable-table" aria-expanded="false">
                                <td><?= $no++ ?></td>
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
                                    <?php } elseif ($value['status_daftar'] == 4) { ?>
                                        <span class="badge bg-danger">ditolak</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-info" href="<?= base_url('peserta/detail_siswa/' .  $value['id_siswa']) ?>"> <i class="fa-solid fa-id-card-clip"></i> </a>
                                    <a class="btn btn-xs btn-success" href="<?= base_url('peserta/bukuinduk/' .  $value['id_siswa']) ?>"> <i class="fas fa-book"></i> </a>
                                    <a class="btn btn-xs btn-danger btn-hapus" href="<?= base_url('peserta/print/' .  $value['id_siswa']) ?>"> <i class="fas fa-print"></i> </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?= $pager->links('default', 'siswa_pagination'); ?>
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
                            <label for="">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
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