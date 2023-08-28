<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
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
                    </ul>
                </ul>
            </div>
        </div>

        <?php if ($siswa['status_daftar'] == 1) { ?>
        <?php  } else if ($siswa['status_daftar'] == 2) { ?>
        <?php  } else if ($siswa['status_daftar'] == 3) { ?>
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
        <?php } ?>
    </div>


    <div class="col-lg-8">
        <?php if ($siswa['status_daftar'] == 1) { ?>

            <div class="alert alert-danger">
                Perhatian: Silahkan Update Data !!!!
            </div>

        <?php  } else if ($siswa['status_daftar'] == 2) { ?>

            <div class="alert alert-warning">
                Verifikasi : Silahkan Kumpulkan Fotocopy Ijazah dan Kartu Keluarga !!!
            </div>

        <?php  } else if ($siswa['status_daftar'] == 3) { ?>

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                        <li class="nav-item"><a class="nav-link" href="#nilai" data-toggle="tab">Nilai</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="biodata">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group">
                                            <b>Alamat Domisili</b>
                                            <p class="text-muted"><?= $siswa['alamat'] ?>, RT <?= $siswa['rt'] ?>/ RW <?= $siswa['rw'] ?> Desa/Kel. <?= $siswa['desa'] ?>, Kec. <?= $siswa['nama_kecamatan'] ?> Kab/Kota <?= $siswa['kabupaten'] ?> Kode Pos <?= $siswa['kodepos'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tinggal Bersama</b><br>
                                            <p class="text-muted"><?= $siswa['tinggal'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Anak Ke</b>
                                            <p class="text-muted"><?= $siswa['anak_ke'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jumlah Saudara</b>
                                            <p><?= $siswa['jml_saudara'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Cita-cita</b>
                                            <p class="text-muted"><?= $siswa['cita_cita'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group">
                                            <b>Hobi</b><br>
                                            <p class="text-muted"><?= $siswa['hobi'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tinggi Badan</b>
                                            <p class="text-muted"><?= $siswa['tinggi'] ?> cm</p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Berat Badan</b>
                                            <p><?= $siswa['berat'] ?> kg</p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Transportasi</b>
                                            <p class="text-muted"><?= $siswa['transportasi'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No Hp</b>
                                            <p class="text-muted"><?= $siswa['telp_anak'] ?></p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <h5>Biodata Orang Tua</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group">
                                            <b>Nama Ayah</b>
                                            <p class="text-muted"><?= $siswa['nama_ayah'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No Telp</b>
                                            <p class="text-muted"><?= $siswa['telp_ayah'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group">
                                            <b>Nama Ibu</b><br>
                                            <p class="text-muted"><?= $siswa['nama_ibu'] ?></p>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Telp Ibu</b>
                                            <p class="text-muted"><?= $siswa['telp_ibu'] ?></p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <a href="<?= base_url('siswa/resetdata/' . $siswa['id_siswa']) ?>" class="btn btn-danger float-right">Reset</a>



                        </div>
                        <div class="tab-pane" id="nilai">
                            <div class="text-center text-danger">
                                Maaf fitur ini dalam tahap pengembangan !!
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<?= $this->endSection() ?>