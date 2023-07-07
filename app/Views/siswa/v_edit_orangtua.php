<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="card card-warning">
    <div class="card-header">
        <h5 class="card-title">
            Biodata Orangtua
        </h5>
    </div>
    <form class="">
        <div class="card-body">
            <h5>Biodata Ayah</h5>
            <div class="row g-3">
                <div class="col-md-6 mb-2">
                    <label for="">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputPassword4" class="form-label">NIK Ayah</label>
                    <input type="text" class="form-control" name="nik_ayah" value="<?= $siswa['nik_ayah'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress" class="form-label">Tahun Ayah</label>
                    <input type="text" class="form-control" name="tahun_ayah" value="<?= $siswa['tahun_ayah'] ?>">
                </div>

                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Pendidikan Ayah</label>
                    <select name="didik_ayah" class="form-control select2bs4" style="width: 100%;" id="">
                        <option value="">--Pilih Pendidikan--</option>
                        <?php foreach ($didik as $key => $value) { ?>
                            <option value="<?= $value['pendidikan'] ?>"><?= $value['pendidikan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Pekerjaan Ayah</label>
                    <select name="kerja_ayah" class="form-control select2bs4" style="width: 100%;" id="">
                        <option value="">--Pilih Pekerjaan--</option>
                        <?php foreach ($kerja as $key => $value) { ?>
                            <option value="<?= $value['pekerjaan'] ?>"><?= $value['pekerjaan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Penghasilan</label>
                    <select name="kerja_ayah" class="form-control select2bs4" style="width: 100%;" id="">
                        <option value="">--Penghasilan Ayah--</option>
                        <?php foreach ($kerja as $key => $value) { ?>
                            <option value="<?= $value['pekerjaan'] ?>"><?= $value['pekerjaan'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">No Telp/Wa Ayah</label>
                    <input type="text" class="form-control" name="telp_ayah" value="<?= $siswa['telp_ayah'] ?>">
                </div>
            </div>

            <hr>

            <h5>Biodata Ibu</h5>
            <!-- ibu -->
            <div class="row g-3">
                <div class="col-md-6 mb-2">
                    <label for="">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputPassword4" class="form-label">NIK Ibu</label>
                    <input type="text" class="form-control" name="nik_ibu" value="<?= $siswa['nik_ibu'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress" class="form-label">Tahun Ibu</label>
                    <input type="text" class="form-control" name="tahun_ibu" value="<?= $siswa['tahun_ibu'] ?>">
                </div>

                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Pendidikan Ibu</label>
                    <select name="didik_ibu" class="form-control select2bs4" style="width: 100%;" id="">
                        <option selected="<?= $siswa['didik_ibu'] ?>"><?= $siswa['didik_ibu'] ?></option>
                        <?php foreach ($didik as $key => $value) { ?>
                            <option value="<?= $value['pendidikan'] ?>"><?= $value['pendidikan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Pekerjaan ibu</label>
                    <select name="kerja_ibu" class="form-control select2bs4" style="width: 100%;" id="">
                        <option selected="<?= $siswa['kerja_ibu'] ?>"><?= $siswa['kerja_ibu'] ?></option>
                        <?php foreach ($kerja as $key => $value) { ?>
                            <option value="<?= $value['pekerjaan'] ?>"><?= $value['pekerjaan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">Penghasilan Ibu</label>
                    <select name="kerja_ibu" class="form-control select2bs4" style="width: 100%;" id="">
                        <option value="">--Pilih Pekerjaan--</option>
                        <?php foreach ($kerja as $key => $value) { ?>
                            <option value="<?= $value['pekerjaan'] ?>"><?= $value['pekerjaan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputAddress2" class="form-label">No Telp/Wa Ibu</label>
                    <input type="text" class="form-control" name="telp_ibu" value="<?= $siswa['telp_ibu'] ?>">
                </div>
            </div>
            <button class="btn btn-warning btn-block">Submit</button>
        </div>

    </form>
</div>



<?= $this->endSection() ?>