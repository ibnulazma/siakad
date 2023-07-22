<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                    <?php if ($guru['walas'] == 1) { ?>
                        <li class="nav-item"><a class="nav-link" href="#rombel" data-toggle="tab">Rombel</a></li>
                    <?php } elseif ($guru['walas'] == 0) { ?>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="#nilai" data-toggle="tab">Nilai</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="biodata">
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" card">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <div class="text-center">
                                                <?php
                                                $gender = "Laki-laki";
                                                if ($gender == $guru['jenis_kelamin']) { ?>
                                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                                                <?php } else { ?>
                                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                                                <?php  } ?>

                                            </div>
                                        </div>
                                        <h3 class="profile-username text-center"><?= session()->get('nama') ?></h3>
                                        <p class="text-muted text-center">(<?= session()->get('username') ?>)
                                        </p>

                                        <ul class="list-group  mb-3">

                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">
                                                    <b>Jenis Kelamin</b> <span class="float-right"><?= $guru['jenis_kelamin'] ?></span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tempat Lahir</b> <span class="float-right"><?= $guru['tempat_lahir'] ?></span>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tanggal Lahir</b> <span class="float-right"> <?= date('d M Y', strtotime($guru['tanggal_lahir']))  ?></span>
                                                </li>
                                            </ul>
                                        </ul>
                                        <?php if ($guru['walas'] == 1) { ?>
                                            <a href="<?= base_url('pendidik/walas') ?>" class="btn btn-primary btn-block"><b>Rombel</b></a>
                                        <?php } elseif ($guru['walas'] == 0) { ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-title">Status Kepegawaian</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Status Kepegawaian</label>
                                                    <input type="text" value="<?= $guru['kepegawaian'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Jenis PTK</label>
                                                    <input type="text" value="<?= $guru['jenis_guru'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Lembaga Pengangkat</label>
                                                    <input type="text" value="<?= $guru['lembaga'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-title">Alamat Domisili</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Alamat</label>
                                                    <input type="text" value="<?= $guru['alamat_guru'] ?>, RT <?= $guru['rt'] ?> /RW <?= $guru['rw'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Kecamatan</label>
                                                    <input type="text" value="<?= $guru['kecamatan'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Kabupaten</label>
                                                    <input type="text" value="<?= $guru['kabupaten'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Provinsi</label>
                                                    <input type="text" value="<?= $guru['provinsi'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rombel">

                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">No. Telp Orang Tua</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Nama Orang Tua</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($walas as $key => $value) {

                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['nama_siswa'] ?></td>
                                        <td class="text-center"><?= $value['no_telp'] ?></td>
                                        <td class="text-center"><?= $value['alamat'] ?> RT <?= $value['rt'] ?> / RW <?= $value['rw'] ?></td>
                                        <td class="text-center"><?= $value['nama_ibu'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

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
</div>
























<?= $this->endSection() ?>