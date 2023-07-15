<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<form action="<?= base_url('siswa/edit_siswa/' . $siswa['id_siswa']) ?>" id="quickForm" method="post">

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="card-title">
                Biodata Diri
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group ">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control " name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenis_kelamin" value="<?= $siswa['jenis_kelamin'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">NISN</label>
                        <input type="text" class="form-control" name="nisn" value="<?= $siswa['nisn'] ?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?= $siswa['nik'] ?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" value="<?= date('d/m/Y', strtotime($siswa['tanggal_lahir'])) ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label for="inputAddress2">Alamat Domisili</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">RT</label>
                        <input type="text" name="rt" class="form-control " data-inputmask="'mask': ['99']" data-mask value="<?= $siswa['rt'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">RW</label>
                        <input type="text" name="rw" class="form-control " data-inputmask="'mask': ['99']" data-mask value="<?= $siswa['rw'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Provinsi</label>

                        <select name="provinsi" class="form-control select2bs4" style="width: 100%;" id="provinsi" required>
                            <option value="">--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $row) { ?>
                                <option value="<?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Kabupaten</label>

                        <select name="kabupaten" class="form-control select2bs4 " style="width: 100%;" id="kabupaten" required>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Kecamatan</label>
                        <select name="kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan" required>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label for="inputAddress2">Desa/Kel</label>
                        <select name="desa" class="form-control select2bs4" style="width: 100%;" id="desa" required>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Kode Pos</label>
                        <input type="text" name="kodepos" class="form-control" value="<?= $siswa['kodepos'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Tinggal </label>
                        <select name="tinggal" class="form-control select2bs4" style="width: 100%;" required>
                            <option value="">Tinggal</option>
                            <?php foreach ($tinggal as $key => $value) { ?>
                                <option value="<?= $value['tinggal'] ?>" <?= $siswa['tinggal'] == $value['tinggal'] ? 'selected' : '' ?>> <?= $value['tinggal'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress2">Moda Transportasi </label>
                        <select name="transportasi" class="form-control select2bs4 <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" style="width: 100%;" required>
                            <option value="">--Transportasi--</option>
                            <?php foreach ($transportasi as $key => $value) { ?>
                                <option value="<?= $value['transportasi'] ?>" <?= $siswa['transportasi'] == $value['transportasi'] ? 'selected' : '' ?>> <?= $value['transportasi'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Anak Ke</label>
                        <input type="text" name="anak_ke" class="form-control " value="<?= $siswa['anak_ke'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Punya Kartu PIP ?</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select id="ok" onChange="opsi(this)" class="form-control" name="kip" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="inputku" placeholder="input" class="form-control" name="no_kip" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk mr-2"></i> Submit</button>
</form>











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