<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="col-md-12">


    <form action="">

        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <h5>Biodata</h5>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_kelamin" value="<?= $siswa['jenis_kelamin'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress" class="col-sm-2 col-form-label">Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal_lahir" value="<?= date('d/m/Y', strtotime($siswa['tanggal_lahir'])) ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="<?= $siswa['nik'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nisn" value="<?= $siswa['nisn'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">No Wa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telp" value="<?= $siswa['no_telp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Punya Kartu PIP</label>
                            <div class="col-sm-5">
                                <select id="ok" onChange="opsi(this)" class="form-control" name="kip">
                                    <option>--Pilih Ya/Tidak--</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" id="inputku" placeholder="input" class="form-control" name="no_kip">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Anak Ke</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_telp" value="<?= $siswa['no_telp'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <h5>Alamat Lengkap/Domisili</h5>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select name="id_provinsi" class="form-control select2bs4" style="width: 100%;" id="provinsi">
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $key => $value) { ?>
                                        <option value="<?= $value['id_provinsi'] ?>"><?= $value['prov_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-10">
                                <select name="kabupaten" class="form-control select2bs4" style="width: 100%;" id="kabupaten">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Desa/Kel</label>
                            <div class="col-sm-10">
                                <select name="desa" class="form-control select2bs4" style="width: 100%;" id="desa">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Alamat Domisili</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="" value="<?= $siswa['alamat'] ?>">
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="inputAddress2" class="col-sm-2 col-form-label">Tinggal </label>
                            <div class="col-sm-10">
                                <select name="" class="form-control select2bs4" style="width: 100%;">
                                    <option value="">--Tinggal--</option>
                                    <?php foreach ($tinggal as $row) { ?>
                                        <option value="<?= $row['id_tinggal'] ?>"><?= $row['tinggal'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="row mb-4">
            <div class="col-md-3">
                <h5>Alamat Lengkap/Domisili</h5>
            </div>
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tinggi" value="<?= $siswa['tinggi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Berat Badan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="berat" value="<?= $siswa['berat'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Penyakit Yang Pernah Diderita/Yang Sedang Dialami</label>
                            <div class="col-sm-10">
                                <select name="" id="" class="form-control select2bs4" style="width: 100%;">
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
                <button class=" btn btn-block btn-primary mt-2" type="submit"> Submit</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var id_kabupaten = $("#provinsi").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKabupaten') ?>/' + id_kabupaten,
                    success: function(html) {
                        $("#kabupaten").html(html);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var id_kecamatan = $("#kabupaten").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKecamatan') ?>/' + id_kecamatan,
                    success: function(html) {
                        $("#kecamatan").html(html);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#kecamatan").change(function() {
                var id_desa = $("#kecamatan").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataDesa') ?>/' + id_desa,
                    success: function(html) {
                        $("#desa").html(html);
                    }
                });
            });
        });
    </script>

    <?= $this->endSection() ?>