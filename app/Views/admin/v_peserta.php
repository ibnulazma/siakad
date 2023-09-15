<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>


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
                            <th>#</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Nama Siswa</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Ibu Kandung</th>
                            <th>Jenis Kelamin</th>
                            <th>Tingkat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr class="<?php
                                        $hasil = "Sudah Meninggal";
                                        if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } ?>" data-widget="expandable-table" aria-expanded="false">

                                <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' . $value['id_siswa']) ?>"><i class="fas fa-user"></i></a></td>
                                <td class="text-center"><?= $value["nisn"] ?></td>
                                <td class="text-center"><?= $value["nik"] ?></td>
                                <td><?= $value["nama_siswa"] ?></td>
                                <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                <td class="text-center"> <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                <td><?= $value["nama_ibu"] ?></td>
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
                                    <?php if ($value['status_daftar'] == 1) { ?>
                                        <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editbiodata<?= $value['id_siswa'] ?>"> <i class="fas fa-pencil"></i> </a>


                                    <?php } elseif ($value['status_daftar'] == 2) { ?>

                                        <a class="btn btn-xs btn-info" href="<?= base_url('peserta/verifikasi/' .  $value['id_siswa']) ?>"> <i class="fas fa-clipboard-list"></i> </a>
                                    <?php } elseif ($value['status_daftar'] == 3) { ?>

                                        <a class="btn btn-xs btn-info btn-hapus" href="<?= base_url('peserta/bukuinduk/' .  $value['id_siswa']) ?>"> <i class="fas fa-book-open"></i> </a>
                                        <a class="btn btn-xs btn-danger btn-hapus" href="<?= base_url('peserta/delete/' .  $value['id_siswa']) ?>"> <i class="fas fa-trash-alt"></i> </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr class="expandable-body">
                                <td colspan="11">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
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
                                <?php foreach ($tingkat as $key => $value) { ?>
                                    <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                                <?php } ?>
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

<!-- VerifikasiData -->




<!-- Editbiodata -->
<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="editbiodata<?= $value['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('peserta/editbiodata/' . $value['id_siswa']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Biodata <?= $value['tingkat'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" value="<?= $value['nama_siswa'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" value="<?= $value['tanggal_lahir'] ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $value['nama_ibu'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Username/NISN</label>
                                <input type="text" class="form-control" name="nisn" value="<?= $value['nisn'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>

















<?= $this->endSection() ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideDown(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>