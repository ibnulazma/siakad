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
            <button class="input-group-text bg-warning mb-3"> <i class="fas fa-print mr-2"></i> Print</button>
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
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>NISN</th>
                        <th>NIK</th>
                        <th>Nama Siswa</th>
                        <th>Tempat Lahir</th>
                        <th> Tanggal Lahir</th>
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
                        <tr>
                            <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' . $value['id_siswa']) ?>"><i class="fas fa-user"></i></a></td>
                            <td class="text-center"><?= $value["nisn"] ?></td>
                            <td class="text-center"><?= $value["nik"] ?></td>
                            <td><?= $value["nama_siswa"] ?></td>
                            <td><?= $value["tempat_lahir"] ?></td>
                            <td class="text-center"> <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                            <td><?= $value["nama_ibu"] ?></td>
                            <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                            <td> Kelas <?= $value["tingkat"] ?></td>

                            <td class="text-center">
                                <?php if ($value['status_daftar'] == 1) { ?>
                                    <span class="badge bg-danger  ">belum aktif</span>

                                <?php } else if ($value['status_daftar'] == 2) { ?>
                                    <button data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>" class="btn btn-warning btn-xs ">verifikasi</button>
                                    <a href="<?= base_url('peserta/reset/' . $value['id_siswa']) ?>" class="btn btn-danger btn-xs">reset</a>
                                <?php } else if ($value['status_daftar'] == 3) { ?>
                                    <span class="badge bg-success  ">aktif</span>
                                <?php } ?>
                            </td>

                            <td class="text-center">
                                <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>"> <i class="fas fa-pencil"></i> </a>
                                <a class="btn btn-xs btn-info" href=""> <i class="fas fa-book"></i> </a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                            <input type="text" class="form-control" name="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
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

<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('peserta/verifikasi/' . $value['id_siswa']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Ijazah Tingkat <?= $value['tingkat'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" value="<?= $value['nama_siswa'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $value['tempat_lahir'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" value="<?= date('d M Y', strtotime($value['tanggal_lahir'])) ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" value="<?= $value['nama_ayah'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">NISN</label>
                                <input type="text" class="form-control" name="nisn" value="<?= $value['nisn'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Seri Ijazah</label>
                                <input type="text" class="form-control" name="seri_ijazah" value="<?= $value['seri_ijazah'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="" class="form-control">
                                    <option value="">--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $row) { ?>
                                        <option value="<?= $row['id_kelas'] ?>"><?= $row['kelas'] ?></option>
                                    <?php }  ?>
                                </select>
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