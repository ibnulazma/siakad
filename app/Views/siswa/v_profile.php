<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="col-md-12">

    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title"> Biodata</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="gambar">
                                    <img src="<?= base_url('foto/' . $siswa['foto']) ?>" width="255px" height="330px" alt="">
                                </div>
                                <button class="btn btn-primary btn-sm mt-4">Ganti Foto </button>
                            </div>
                            <div class="col-md-9">

                                <div class="row g-3">
                                    <div class="col-md-6 mb-2">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jenis_kelamin" value="<?= $siswa['jenis_kelamin'] ?>">

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputAddress" class="form-label">Tempat</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir'] ?>">

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputAddress2" class="form-label">NIK</label>
                                        <input type="text" class="form-control" name="nik" value="<?= $siswa['nik'] ?>" disabled>

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputAddress2" class="form-label">NISN</label>
                                        <input type="text" class="form-control" name="nisn" value="<?= $siswa['nisn'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputAddress2" class="form-label">No Wa</label>
                                        <input type="text" class="form-control" name="nisn" value="<?= $siswa['no_telp'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">
                            Alamat Lengkap
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Provinsi</label>
                                <select name="id_provinsi" class="form-control select2bs4" style="width: 100%;" id="provinsi">
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $key => $value) { ?>
                                        <option value="<?= $value['id_provinsi'] ?>"><?= $value['prov_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputPassword4" class="form-label">Kab/Kota</label>
                                <select name="id_kabupaten" class="form-control select2bs4" style="width: 100%;" id="kabupaten">
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputAddress" class="form-label">Kecamatan</label>
                                <select name="id_kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan">
                                </select>

                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputAddress2" class="form-label">Desa/Kelurahan</label>
                                <select name="id_desa" class="form-control select2bs4" style="width: 100%;" id="desa">
                                </select>

                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputAddress2" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $siswa['alamat'] ?>">

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="inputAddress2" class="form-label">RT</label>
                                <input type="text" value="" class="form-control" name="rt" value="<?= $siswa['rt'] ?>">
                            </div>
                            <div class=" col-md-3 mb-2">
                                <label for="inputAddress2" class="form-label">RW</label>
                                <input type="text" value="" class="form-control" name="rw" value="<?= $siswa['rw'] ?>">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Tinggal</label>
                                <select name="tinggal" class="form-control select2bs4" style="width: 100%;" id="provinsi">
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($tinggal as $key => $value) { ?>
                                        <option value="<?= $value['tinggal'] ?>"><?= $value['tinggal'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            Kesehatan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4 mb-2">
                                <label for="">Tinggi Badan</label>
                                <input type="text" class="form-control" name="tinggi" value="<?= $siswa['tinggi'] ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="inputPassword4">Berat Badan</label>
                                <input type="text" class="form-control" name="berat" value="<?= $siswa['berat'] ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="inputAddress" class="form-label">Lingkar Kepala</label>
                                <input type="text" class="form-control" name="lingkar" value="<?= $siswa['lingkar'] ?>">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputAddress2" class="form-label">Penyakit Yang Pernah Diderita/Yang Sedang Dialami</label>
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
                            <div class="col-md-6 mb-2">
                                <label for="inputAddress2" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $siswa['alamat'] ?>">

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="inputAddress2" class="form-label">RT</label>
                                <input type="text" value="" class="form-control" name="rt" value="<?= $siswa['rt'] ?>">
                            </div>
                            <div class=" col-md-3 mb-2">
                                <label for="inputAddress2" class="form-label">RW</label>
                                <input type="text" value="" class="form-control" name="rw" value="<?= $siswa['rw'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <button class=" btn btn-block btn-primary mt-2" type="submit"> Submit</button>
            </form>
        </div>
    </div>
</div>








<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

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