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
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_guru" value=<?= $guru['nama_guru'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt_lahir" value=<?= $guru['tmpt_lahir'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value=<?= $guru['tgl_lahir'] ?>>
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
                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="text" class="form-control" name="email" value=<?= $guru['telp_guru'] ?>>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>