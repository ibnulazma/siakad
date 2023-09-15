<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"><i class="fas fa-home mr-2"></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#alamat" data-toggle="tab"><i class="fas fa-map-marker-alt mr-2"></i> Alamat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak" data-toggle="tab"><i class="fa-solid fa-fax mr-2"></i> Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kepsek" data-toggle="tab"><i class="fa-solid fa-user-tie mr-2"></i> Kepala Sekolah</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="profile">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['nama_sekolah'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['status'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NPSN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['npsn'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NSS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['nss'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class=" tab-pane" id="alamat">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['alamat'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Desa/Kel.</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['desa'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['kec'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kab/Kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['kab'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['provinsi'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="kontak">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['telp'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['email'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="kepsek">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kepala Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['kepsek'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIP/NUPTK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['kepsek'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Telp/Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="<?= $profil['kepsek'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">

            </div>
        </div>

    </div>
</div>




<?= $this->endSection() ?>