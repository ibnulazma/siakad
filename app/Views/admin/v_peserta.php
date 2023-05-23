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
                            <td> <?= $value["tanggal_lahir"] ?></td>
                            <td><?= $value["nama_ibu"] ?></td>
                            <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                            <td> Kelas <?= $value["tingkat"] ?></td>


                            <td class="text-center">

                                <?php if ($value['status_daftar'] == 0) { ?>
                                    <span class="btn btn-danger btn-xs ">belum aktif</span>

                                <?php } else if ($value['status_daftar'] == 1) { ?>
                                    <button data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>" class="btn btn-danger btn-xs ">verifikasi</button>
                                <?php } else if ($value['status_daftar'] == 2) { ?>
                                    <a href="" class="btn btn-danger btn-xs ">aktif</a>
                                <?php } ?>
                            </td>

                            <td class="text-center">
                                <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>"> <i class="fas fa-pencil"></i> </a>
                                <button class="btn btn-xs btn-danger"> <i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('peserta/add') ?>
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa">
                </div>
                <div class="form-group">
                    <label for="">NISN</label>
                    <input type="text" class="form-control" name="nisn">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto">
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>

    </div>
</div>


<!-- Edit -->

<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('siswa/edit/' . $value['id_siswa']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="<?= $value['nama_siswa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>


<?= $this->endSection() ?>