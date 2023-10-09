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
        <?= form_open_multipart('guru/upload') ?>
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


<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">
                Data Pendidik dan Tenaga Kependidikan
            </h5>
            <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered " id="example2">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>NIY</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($guru as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value["niy"] ?></td>
                            <td><?= $value["nama_guru"] ?></td>
                            <td class="text-center">

                                <?php if ($value['status_daftar'] == 0) { ?>
                                    <span class="btn btn-danger btn-xs ">belum aktif</span>

                                <?php } else if ($value['status_daftar'] == 1) { ?>
                                    <button data-toggle="modal" data-target="#edit<?= $value['id_guru'] ?>" class="btn btn-danger btn-xs ">verifikasi</button>
                                <?php } else if ($value['status_daftar'] == 2) { ?>
                                    <a href="" class="btn btn-danger btn-xs ">aktif</a>
                                <?php } ?>
                            </td>

                            <td class="text-center">
                                <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit<?= $value['id_guru'] ?>"> <i class="fas fa-pencil"></i> </a>
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
        <?php echo form_open_multipart('guru/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru">
                </div>
                <div class="form-group">
                    <label for="">NIY</label>
                    <input type="text" class="form-control" name="niy">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="walas" id="" class="form-control">
                        <option value="">-Walas Atau Tidak-</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>


<!-- Edit -->

<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('guru/edit/' . $value['id_guru']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?= $value['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="walas" id="" class="form-control">
                            <option value="">-Walas Atau Tidak-</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
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