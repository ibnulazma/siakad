<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Peserta Didik</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>NISN</th>
                        <th>No Telpn</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($siswa as $key => $value) { ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><?= $value['jenis_kelamin'] ?></td>
                            <td><?= $value['kelas'] ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['no_telp'] ?></td>
                            <td><?php if ($value['status_daftar'] == 1) { ?>
                                    <button data-toggle="modal" data-target="#edit<?= $value['id_siswa'] ?>" class="btn btn-danger btn-xs ">verifikasi</button>

                                <?php } else if ($value['status_daftar'] == 2) { ?>
                                    <a href="" class="badge badge-success btn-xs ">aktif</a>

                                <?php } else { ?>
                                    <a href="" class="btn btn-warning btn-xs ">reset</a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success btn-xs"><i class="fas fa-search"></i></a>
                                <a href="" class="btn btn-danger btn-xs"><i class=" fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<?= $this->endSection() ?>