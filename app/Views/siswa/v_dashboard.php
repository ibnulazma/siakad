<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if ($siswa['status_daftar'] == 1) { ?>

    <div class="card">
        <div class="card-body text-center">
            <h3> Selamat Datang <b><?= $siswa['nama_siswa'] ?></b> di SIAKAD INKA</h3>
            <h5>Silahkan update profile untuk aktivasi akun anda </h5>

            <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>" class="btn btn-danger">Update Profile</a>
        </div>
    </div>




<?php } elseif ($siswa['status_daftar'] == 2) { ?>
    verifikasi data

<?php } elseif ($siswa['status_daftar'] == 3) { ?>

    <div class="row">
        <div class="col-lg-4">
            <div class=" card">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/' . session()->get('foto')) ?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?= session()->get('nama') ?></h3>
                    <p class="text-muted text-center">(<?= session()->get('username') ?>)
                    </p>

                    <ul class="list-group  mb-3">

                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <span class="float-right"><?= $siswa['jenis_kelamin'] ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat Lahir</b> <span class="float-right"><?= $siswa['tempat_lahir'] ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Lahir</b> <span class="float-right"> <?= date('d F Y', strtotime($siswa['tanggal_lahir']))  ?></span>
                            </li>
                            <li class="list-group-item">
                                <b> Ibu Kandung</b> <span class="float-right"><?= $siswa['nama_ibu'] ?> </span>
                            </li>

                        </ul>
                    </ul>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="card-title">
                        <i class="fas fa-pencil"></i> <b> Pembelajaran</b>
                    </p>
                </div>
                <div class="card-body">
                    <ul style="list-style:none;">
                        <li>
                            <p class="text-muted">
                                Rombongan Belajar : Kelas <?= $siswa['kelas'] ?>
                            </p>
                        </li>
                        <li>
                            <p class="text-muted">
                                Tingkat Pendidikan : Tingkat <?= $siswa['tingkat'] ?>
                            </p>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="card-title">
                        <i class="fas fa-map-marker-alt"></i> <b> Tempat Tinggal</b>
                    </p>
                </div>
                <div class="card-body">

                    <p>
                        <?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?>
                    </p>
                    <p> Desa/Kel. <?= $siswa['desa'] ?> Kecamatan <?= $siswa['kecamatan'] ?></p>
                    <p>Kab/Kota <?= $siswa['kabupaten'] ?> Provinsi <?= $siswa['provinsi'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                        <li class="nav-item"><a class="nav-link" href="#absen" data-toggle="tab">Presensi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#nilai" data-toggle="tab">Nilai</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="biodata">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>IDENTITAS</h6>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>NIK</b>:<?= $siswa['nik'] ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama</b>:Islam </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kebutuhan Khusus</b>:Tidak Ada </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Alat Transportasi</b>:Sepeda Motor</span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6>KONTAK</h6>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Jenis Tinggal</b>:Bersama Orang Tua</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor Telepon</b>: </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Handphone</b>:Tidak Ada </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b>:Sepeda Motor</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Orang Tua</h6>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Nama Ayah</b>:<?= $siswa['nama_ayah'] ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Telpon Ayah</b>:<?= $siswa['telp_ayah'] ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Telpon Ibu</b>:<?= $siswa['telp_ibu'] ?></span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="absen">

                        </div>

                        <div class="tab-pane" id="settings">

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
<?php } ?>
























<?= $this->endSection() ?>