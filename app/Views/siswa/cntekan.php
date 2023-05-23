<?php if ($siswa['status_daftar'] == 0) { ?>
    <div class="col-md-12">
        <div class="alert alert-danger">
            <span> STATUS DATA : SILAHKAN UNTUK MELENGKAPI DATA</span>
        </div>
    </div>

<?php } else if ($siswa['status_daftar'] == 1) { ?>
    <div class="col-md-12">
        <div class="alert alert-warning">
            <span> STATUS DATA : SEDANG DIVERIFIKASI</span>
        </div>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <div class="alert alert-info">
            <span> STATUS DATA : SUDAH LENGKAP (TERVERIFIKASI)</span>
        </div>
    </div>
<?php } ?>



<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Selamat datang <b> <?= $siswa['nama_lengkap'] ?> </b> di aplikasi Pendataan Siswa SMPS INSAN KAMIL <?= $siswa['kelas'] ?>.
        </div>

    </div>
</div>
<?php if ($siswa['status_daftar'] == 0) { ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lengkapi Data </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= base_url('siswa/profile') ?>" class="btn btn-danger "> <i class="fas fa-pencil-alt"></i> Lengkapi Data</a>
            </div>

        </div>
    </div>
<?php } else if ($siswa['status_daftar'] == 1) { ?>
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="text-center">
                    <i class="fa-solid fa-spinner text-warning  fa-10x fa-spin-pulse fa-spin-reverse mb-4"></i>
                    <h3 class="text-warning"><strong>DATA ANDA SEDANG KAMI VERIFIKASI</strong> </h3>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rangkuman </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= base_url('siswa/profile') ?>" class="btn btn-info "> <i class="fas fa-download"></i> Lihat Profile</a>
                <a href="" class="btn btn-primary "> <i class="fas fa-book"></i> Nilai Rapot</a>
                <a href="" class="btn btn-warning"> <i class="fas fa-user"></i> Sikap</a>
            </div>

        </div>
    </div>
<?php } ?>