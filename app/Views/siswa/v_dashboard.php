<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">
    <div class="col-md-7">
        <div class="card-body">
            <div class="callout callout-danger">
                <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                <p class="text-danger">Saat ini status anda sebagai peserta didik SMP Insan Kamil belum aktif. silahkan untuk melakukan registrasi untuk mengaktifkan status anda dengan <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>">klik disini</a>.</p>
            </div>
        </div>
    </div>
</div>






























<?= $this->endSection() ?>