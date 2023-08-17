<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<?= form_open('siswa/edit_siswa/' . $siswa['id_siswa']) ?>
<?= csrf_field() ?>
<div class="card">
    <div class="card-header bg-light">
        <h5 class="card-title">
            Alamat
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="inputAddress2">Alamat Domisili</label>
                    <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['alamat'] ?>">
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">RT</label>
                    <input type="text" name="rt" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" data-mask value="<?= $siswa['rt'] ?>" value="<?= $siswa['rt'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('rt'); ?>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">RW</label>
                    <input type="text" name="rw" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['rw'] ?>" value=" <?= $siswa['rw'] ?>">
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Provinsi</label>

                    <select name="provinsi" class="form-control select2bs4 <?= ($validation->hasError('provinsi')) ? 'is-invalid' : ''; ?>" style="width: 100%;" id="provinsi" value="<?= $siswa['provinsi'] ?>">
                        <option value="">--Pilih Provinsi--</option>
                        <?php foreach ($provinsi as $row) { ?>
                            <option value="<?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Kabupaten</label>

                    <select name="kabupaten" class="form-control select2bs4 " style="width: 100%;" id="kabupaten">
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Kecamatan</label>
                    <select name="kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan">
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="inputAddress2">Desa/Kel</label>
                    <select name="desa" class="form-control select2bs4" style="width: 100%;" id="desa">
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Kode Pos</label>
                    <input type="text" name="kodepos" class="form-control" value="<?= $siswa['kodepos'] ?>">
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Tinggal </label>
                    <select name="tinggal" class="form-control select2bs4" style="width: 100%;">
                        <option value="">-Tinggal Bersama??--</option>
                        <?php foreach ($tinggal as $key => $value) { ?>
                            <option value="<?= $value['tinggal'] ?>"> <?= $value['tinggal'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Moda Transportasi Ke Sekolah </label>
                    <select name="transportasi" class="form-control select2bs4 <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" style="width: 100%;">
                        <option value="">--Pilih--</option>
                        <?php foreach ($transportasi as $key => $value) { ?>
                            <option value="<?= $value['transportasi'] ?>"> <?= $value['transportasi'] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class=" form-group">
                    <label for="inputAddress2">Anak Ke</label>
                    <input type="text" name="anak_ke" class="form-control " value="<?= $siswa['anak_ke'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Punya Kartu PIP ?</label>
                    <div class="row">
                        <div class="col-md-3">
                            <select id="ok" onChange="opsi(this)" class="form-control" name="kip">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="inputku" placeholder="input" class="form-control" name="no_kip" value="<?= $siswa['no_kip'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary text-center"><i class="fa-solid fa-floppy-disk mr-2"></i>Submit</button>
</div>
<?= form_close() ?>






<script>
    function opsi(value) {
        var st = $("#ok").val();
        if (st == "Ya") {
            document.getElementById("inputku").disabled = false;
        } else {
            document.getElementById("inputku").disabled = true;
        }
    }
</script>

<?= $this->endSection() ?>