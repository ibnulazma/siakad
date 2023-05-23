<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Verifikasi Daftar Ulang</h3>

            <div class="card-tools">
                <span class="badge badge-danger"><?= $jumlahData ?> New Members</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="users-list clearfix">
                <?php foreach ($daftar as $key => $value) { ?>
                    <li>
                        <img src="<?= base_url() ?>/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="" data-target="#detail<?= $value['id_daftar'] ?>" data-toggle="modal"></i><?= $value['nama_lengkap'] ?></a>
                        <span class="users-list-date">Today</span>
                    </li>
                <?php } ?>
            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a href="javascript:">View All Users</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!--/.card -->
</div>



<?php foreach ($daftar as $key => $row) { ?>
    <div class="modal fade" id="detail<?= $row['id_daftar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <?php echo form_open('admin/validasi/' . $row['id_daftar']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Data PD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <strong>Nama Lengkap</strong>
                        <p><?= $row['nama_lengkap'] ?></p>
                        <strong>Tempat Tanggal Lahir</strong>
                        <p><?= $row['tempat_lahir'] ?> , <?= $row['tanggal_lahir'] ?></p>
                        <strong>NISN</strong>
                        <p><?= $row['nisn'] ?></p>
                        <strong>Nama Ayah</strong>
                        <p><?= $row['nama_ayah'] ?></p>
                        <strong>No Seri Ijazah</strong>
                        <p><?= $row['seri_ijazah'] ?></p>

                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="">Verval</label>
                        <select name="status_daftar" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <option value="2">Validasi</option>
                            <option value="3">Ditolak</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>






<?= $this->endSection() ?>