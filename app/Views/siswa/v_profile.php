<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?= form_open('siswa/edit_siswa/' . $siswa['id_siswa'], ['class' => 'formsimpan']) ?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group ">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control " name="nama_siswa">
                </div>
                <div class="form-group ">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" value="<?= $siswa['jenis_kelamin'] ?>">
                </div>
                <div class="form-group ">
                    <label for="inputAddress">Tempat</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Tanggal Lahir</label>

                    <input type="text" class="form-control" name="tanggal_lahir" value="<?= date('d/m/Y', strtotime($siswa['tanggal_lahir'])) ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>

                </div>
                <div class="form-group ">
                    <label for="inputAddress2">NIK</label>
                    <input type="text" class="form-control" name="nik" value="<?= $siswa['nik'] ?>" readonly>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">NISN</label>
                    <input type="text" class="form-control" name="nisn" value="<?= $siswa['nisn'] ?>" readonly>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">No Wa</label>
                    <input type="text" class="form-control" name="no_telp" value="<?= $siswa['no_telp'] ?>">

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
                            <input type="text" id="inputku" placeholder="input" class="form-control" name="no_kip">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Anak Ke</label>
                    <input type="text" name="anak_ke" class="form-control " value="<?= $siswa['anak_ke'] ?>">
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group ">
                    <label for="inputAddress2">Provinsi</label>

                    <select name="provinsi" class="form-control select2bs4" style="width: 100%;" id="provinsi">
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
                <div class="form-group ">
                    <label for="inputAddress2">Desa/Kel</label>

                    <select name="desa" class="form-control select2bs4" style="width: 100%;" id="desa">
                    </select>

                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Alamat Domisili</label>

                    <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>">

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="inputAddress2">RT</label>
                            <input type="text" name="rt" class="form-control " data-inputmask="'mask': ['99']" data-mask value="<?= $siswa['rt'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="inputAddress2">RW</label>
                            <input type="text" name="rw" class="form-control " data-inputmask="'mask': ['99']" data-mask value="<?= $siswa['rw'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputAddress2">Tinggal </label>
                    <select name="tinggal" class="form-control select2bs4" style="width: 100%;">
                        <option value="">Tinggal</option>
                        <?php foreach ($tinggal as $row) { ?>
                            <option value="<?= $row['tinggal'] ?>"><?= $row['tinggal'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="inputAddress2">Transportasi Ke Sekolah </label>
                    <select name="transportasi" class="form-control select2bs4 <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" style="width: 100%;">
                        <option value="">--Transportasi--</option>
                        <?php foreach ($transportasi as $row) { ?>
                            <option value="<?= $row['transportasi'] ?>"><?= $row['transportasi'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('transportasi'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card ">
            <div class="card-body">
                <div class="form-group ">
                    <label for="">Tinggi Badan</label>
                    <input type="text" class="form-control" name="tinggi" value="<?= $siswa['tinggi'] ?>">
                </div>

                <div class="form-group ">
                    <label for="">Berat Badan</label>
                    <input type="text" class="form-control" name="berat" value="<?= $siswa['berat'] ?>">
                </div>
                <div class="form-group ">
                    <label for="">Penyakit Yang Pernah Diderita/Yang Sedang Dialami</label>
                    <select name="penyakit" id="" class="form-control select2bs4" style="width: 100%;">
                        <option value="">--Pilih Penyakit--</option>
                        <option value="Asma">Asma</option>
                        <option value="Maag Kronis">Maag Kronis</option>
                        <option value="Bronkitis">Bronkitis</option>
                        <option value="Anemia">Anemia</option>
                        <option value="Dll">Dll</option>
                        <option value="Tidak Pernah">Tidak Pernah</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <button class=" btn btn-block btn-primary" type="submit"> Submit</button>
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



<script>
    if ($('#quickForm').length > 0) {
        $('#quickForm').validate({
            rules: {
                nama_siswa: {
                    required: true,
                    nama_siswa: true,
                },
                jenis_kelamin: {
                    required: true,
                    jenis_kelamin: true,
                },
                tempat_lahir: {
                    required: true,
                    tempat_lahir: true,
                },

                no_telp: {
                    required: true,
                    no_telp: true,
                },

                anak_ke: {
                    required: true,
                    anak_ke: true,
                },

                // terms: {
                //     required: true
                // },
            },
            messages: {
                nama_siswa: {
                    required: "Silahkan isi dengan benar",
                },
                jenis_kelamin: {
                    required: "Silahkan isi dengan benar",
                },
                tempat_lahir: {
                    required: "Silahkan isi dengan benar",
                },

                no_telp: {
                    required: "Silahkan isi dengan benar",
                },

                anak_ke: {
                    required: "Silahkan isi dengan benar",
                },

                // password: {
                //     required: "Please provide a password",
                //     minlength: "Your password must be at least 5 characters long"
                // },
                // terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>




<?= $this->endSection() ?>