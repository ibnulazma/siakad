<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-lg-4">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                    $gender = "Laki-laki";
                    if ($gender == $siswa['jenis_kelamin']) { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                    <?php } else { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                    <?php  } ?>

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
                            <b>Tanggal Lahir</b> <span class="float-right"> <?= date('d M Y', strtotime($siswa['tanggal_lahir']))  ?></span>
                        </li>
                        <li class="list-group-item">
                            <b> Ibu Kandung</b> <span class="float-right"><?= $siswa['nama_ibu'] ?> </span>
                        </li>

                    </ul>
                </ul>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Mutasi
                </button>
                <a href="" type="button" class="btn btn-danger">
                    Reset
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    <i class="fas fa-pencil"></i> <b> Pembelajaran Tahun Pelajaran <?= $siswa['ta'] ?></b>
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
                <p> Desa/Kel. <?= $siswa['desa'] ?> Kecamatan <?= $siswa['nama_kecamatan'] ?></p>
                <p>Kab/Kota <?= $siswa['city_name'] ?> Provinsi <?= $siswa['prov_name'] ?></p>
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
                                        <b>NIK</b>: <?= $siswa['nik'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Agama</b>: Islam </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kebutuhan Khusus</b>: Tidak Ada </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Alat Transportasi</b>: Sepeda Motor</span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>KONTAK</h6>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Jenis Tinggal</b>: <?= $siswa['tinggal'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor Telepon</b>: </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Handphone</b>: <?= $siswa['no_telp'] ?> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Orang Tua</h6>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama Ayah</b>: <?= $siswa['nama_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telpon Ayah</b>: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telpon Ibu</b>: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="absen">
                        45454545
                    </div>

                    <div class="tab-pane" id="settings">

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>



<?= $this->endSection() ?>