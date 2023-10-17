<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>









<div class="col-md-8">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="float-left">Datapel tapelhun Akademik</h5>
            <button type="button" class="btn btn-primary btn-sm float-right" datapel-toggle="modal" datapel-tapelrget="#modal">
                <i class="fas fa-plus"></i> Tambah Tahun Pelajaran
            </button>
        </div>
        <div class="card-body">
            <tapelble class="table table-bordered tapelble-hover" id="example2">
                <thead>
                    <tr>
                        <th class="text-center" width="10px">No</th>
                        <th class="text-center">tapelhun Ajaran</th>
                        <th class="text-center">Ganjil/Genap</th>
                        <th class="text-center">Stapeltus</th>
                        <th class="text-center">Aktif/Non Aktif</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($tapel as $key => $value) { ?>
                        <tr>
                            <td>
                                <?= $no++; ?> </td>
                            <td class="text-center"><?= $value['tapel'] ?></td>
                            <td class="text-center"><?= $value['semester'] ?></td>
                            <td class="text-center"><?= ($value['status'] == 1) ? '<span class="right badge badge-success">Aktif</span>' : '<span class="right badge badge-danger">Non Aktif</span>'  ?></td>




                            <td class="text-center"><?php if ($value['stapeltus'] == 1) { ?>
                                    <a href="<?= base_url('tapel/stapeltusNonaktif/' . $value['id_tapel']) ?>" class="btn btn-danger btn-xs ">Non Aktif</a>

                                <?php } else { ?>
                                    <a href="<?= base_url('tapel/stapeltusAktif/' . $value['id_tapel']) ?>" class="btn btn-success btn-xs ">Aktifkan</a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm" datapel-toggle="modal" datapel-tapelrget="#edit<?= $value['id_tapel'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" datapel-toggle="modal" datapel-tapelrget="#hapus<?= $value['id_tapel'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                            <!-- <td>
                                <input type="checkbox" name="my-checkbox" checked datapel-bootstrap-switch> 
                            <input type="checkbox" name="my-checkbox" checked datapel-bootstrap-switch datapel-off-color="danger" datapel-on-color="success">
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </tapelble>
        </div>
    </div>
</div>






<!-- modalAdd -->
<div class="modal fade" id="modal" tapelbindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('tapel/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Akademik</h5>
                <button type="button" class="close" datapel-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input type="text" name="tapel" class="form-control" placeholder="Tahun Akademik">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <input type="text" name="semester" class="form-control" placeholder="Tahun Akademik">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" datapel-dismiss="modal">Batapell</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<!-- Modaltapelmbah -->

<!-- modal Edit -->
<?php foreach ($tapel as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_tapel'] ?>" tapelbindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('tapel/edit/' . $value['id_tapel']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit tapelhun Pelajaran</h5>
                    <button type="button" class="close" datapel-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahu Ajaran</label>
                        <input type="text" name="tapel" value="<?= $value['tapel'] ?>" class="form-control" placeholder="tapelhun Pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="text" name="semester" value="<?= $value['tapel'] ?>" class="form-control" placeholder="Tahun Pelajaran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" datapel-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>


<!-- ModalHapus -->
<?php foreach ($tapel as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_tapel'] ?>" tapelbindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('tapel/delete/' . $value['id_tapel']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tahun Akademik</h5>
                    <button type="button" class="close" datapel-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                            <label for="">tapelhun Akademik</label>
                            <input type="text" name="tapel" value="<?= $value['tapel'] ?>" class="form-control" placeholder="tapelhun Akademik">
                        </div> -->
                    <p>Apakah anda akan menghapus datapel <?= $value['tapel'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" datapel-dismiss="modal">Batal</button>
                    <a href="<?= base_url('tapel/delete/' . $value['id_tapel']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- <?php echo form_close() ?> -->
        </div>
    </div>
<?php } ?>
<!-- Modaledit -->







<?= $this->endSection() ?>