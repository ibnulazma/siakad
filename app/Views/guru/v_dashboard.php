<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">

    <div class="col-md-6">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <div class="text-center">
                        <?php
                        $gender = "L";
                        if ($gender == $guru['kelamin']) { ?>
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                        <?php } else { ?>
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                        <?php  } ?>

                    </div>
                </div>
                <h3 class="profile-username text-center"><?= $guru['nama_guru'] ?></h3>
                <p class="text-muted text-center">(<?= $guru['niy'] ?>)
                </p>

                <ul class="list-group  mb-3">

                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Jenis Kelamin</b> <span class="float-right"><?= $guru['kelamin'] ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat Lahir</b> <span class="float-right"><?= $guru['tmpt_lahir'] ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Lahir</b> <span class="float-right"> <?= date('d M Y', strtotime($guru['tgl_lahir']))  ?></span>
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
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_guru" value=<?= $guru['nama_guru'] ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="date" class="form-control" name="tmpt_lahir" value=<?= $guru['tanggal_lahir'] ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tgl_lahir" value=<?= $guru['tgl_lahir'] ?>>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NUPTK</label>
                                        <input type="text" class="form-control" name="nuptk" value=<?= $guru['nuptk'] ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Aktif</label>
                                        <input type="text" class="form-control" name="email" value=<?= $guru['email'] ?>>
                                    </div>
                                </div>
                            </div>
                        </form>
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