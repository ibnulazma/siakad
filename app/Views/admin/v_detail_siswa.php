<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#absen" data-toggle="tab">Presensi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nilai" data-toggle="tab">Nilai</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="biodata">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>IDENTITAS</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span>NIK: <?= $siswa['nik'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Agama: Islam </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Kebutuhan Khusus: Tidak Ada </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Alat Transportasi: <?= $siswa['transportasi'] ?></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><strong>KONTAK</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Jenis Tinggal: <?= $siswa['tinggal'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span> Telpn/Hp: <?= $siswa['telp_anak'] ?> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>DATA ORANG TUA</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Nama Ayah: <?= $siswa['nama_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Telpon Ayah: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Telpon Ibu: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><strong>DATA LAINNYA</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Tinggi Badan: <?= $siswa['tinggi'] ?> cm</span>
                                    </li>
                                    <li class="list-group-item">
                                        Tinggi Badan: <?= $siswa['berat'] ?> kg</span>
                                    </li>
                                    <li class="list-group-item">
                                        Lingkar Kepala: <?= $siswa['lingkar'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Hobi: <?= $siswa['hobi'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Cita-cita: <?= $siswa['cita_cita'] ?></span>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="absen">
                        <div class="text-center text-danger">
                            Maaf fitur ini dalam tahap pengembangan !!
                        </div>
                    </div>

                    <div class="tab-pane" id="nilai">
                        <div class="text-center text-danger">
                            Maaf fitur ini dalam tahap pengembangan !!
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="col-lg-4">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                    $gender = "L";
                    if ($gender == $siswa['jenis_kelamin']) { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                    <?php } else { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                    <?php  } ?>

                </div>
                <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>
                <p class="text-muted text-center">(<?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?>)</p>
                <?php if ($siswa['status_daftar'] == 1) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-danger">Belum Aktif</p>
                    </div>
                <?php } elseif ($siswa['status_daftar'] == 2) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-info">Verifikasi</p>
                    </div>
                <?php } elseif ($siswa['status_daftar'] == 3) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-success">Aktif</p>
                    </div>
                <?php } ?>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">ijazah</p>
                            <span class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">akte</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">kk</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    <b> Riwayat Tahun Pembelajaran <?= $siswa['ta'] ?></b>
                </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="timeline">
                            <div>
                                <i class="far fa-circle bg-blue"></i>
                                <div class="timeline-item">
                                    <div class="timeline-body">
                                        <p><?= $siswa['kelas'] ?> <br>Wali Kelas<br> <strong>
                                                <?= $siswa['nama_guru'] ?></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <i class="far fa-circle bg-blue"></i>
                                <div class="timeline-item">
                                    <div class="timeline-body">
                                        <p><?= $siswa['kelas'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <i class="far fa-circle bg-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>