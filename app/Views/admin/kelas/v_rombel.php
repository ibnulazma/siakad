<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Rombongan Belajar</h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nama Wali Kelas</th>
                        <th class="text-center">Tingkat</th>

                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($kelas as $key => $value) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kelas'] ?></td>
                            <td class="text-center"><?= $value['nama_guru'] ?></td>
                            <td class="text-center"><?= $value['tingkat'] ?></td>

                            <td class="text-center">
                                <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']) ?>" class="btn btn-success btn-sm"><i class="fas fa-user"></i></a>
                                <a href="" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-list"></i></a>
                                <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_kelas'] ?>"><i class="fas fa-pencil"></i></button>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('kelas/add') ?>
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tingkat</label>
                    <select name="id_tingkat" id="" class="form-control">
                        <option value="">Pilih Tingkat</option>
                        <?php foreach ($tingkat as $key => $value) { ?>
                            <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                        <?php  } ?>
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



<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('kelas/edit/' . $value['id_kelas']); ?>
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="<?= $value['kelas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="id_guru" id="" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tingkat</label>
                        <select name="id_tingkat" id="" class="form-control">
                            <option value="">Pilih Tingkat</option>
                            <?php foreach ($tingkat as $key => $value) { ?>
                                <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                            <?php  } ?>
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
<?php } ?>

<?= $this->endSection() ?>