<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-8">
        <?php if ($siswa['status_daftar'] == 1) { ?>

            <div class="callout callout-danger">
                <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                <p class="text-danger">Saat ini status anda sebagai peserta didik SMP Insan Kamil belum aktif. silahkan untuk melakukan registrasi untuk mengaktifkan status anda dengan <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>">klik disini</a>.</p>
            </div>

        <?php  } else if ($siswa['status_daftar'] == 2) { ?>

            <div class="callout callout-warning">
                <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                <h5> Data Anda Sedang Kami Verifikasi. <i class="fa-solid fa-rotate-right fa-spin"></i></h5>
            </div>


        <?php  } else if ($siswa['status_daftar'] == 3) { ?>

            <div class="callout callout-success">
                <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                <h5> Data Anda Telah Aktif. <i class="fa-solid fa-circle-check fa-beat" style="color: #17e614;"></i></h5>
            </div>

        <?php } ?>
    </div>
    <!-- <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kalender</h5>
            </div>
            <div class="card-body pt-0">
                <div id="calendar" style="width: 100%"></div>
            </div>
        </div>
    </div> -->
</div>


































































<?= $this->endSection() ?>