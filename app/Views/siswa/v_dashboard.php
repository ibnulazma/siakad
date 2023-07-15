<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if ($siswa['status_daftar'] == 1) { ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <div class="callout callout-danger">
                    <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                    <p class="text-danger">Saat ini status anda sebagai peserta didik SMP Insan Kamil belum aktif. silahkan untuk melakukan registrasi untuk mengaktifkan status anda dengan <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>">klik disini</a>.</p>
                </div>
            </div>
        </div>
    </div>



<?php  } else if ($siswa['status_daftar'] == 2) { ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <div class="callout callout-warning">
                    <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                    <h5> Data Anda Sedang Kami Verifikasi. <i class="fa-solid fa-rotate-right fa-spin"></i></h5>
                </div>
            </div>
        </div>
    </div>
<?php  } else if ($siswa['status_daftar'] == 3) { ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <div class="callout callout-success">
                    <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                    <h5> Data Anda Telah Aktif. <i class="fa-solid fa-circle-check fa-beat" style="color: #17e614;"></i></h5>
                </div>
            </div>
        </div>
    </div>


<?php } ?>





































































<?= $this->endSection() ?>