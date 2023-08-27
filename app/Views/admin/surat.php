<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1> Surat</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-4">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h5>Surat</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('home/save') ?>" method="post">
                                <div class="form-group">
                                    <label for="nama-barang">Nama Siswa</label>
                                    <select name="nama-siswa" id="nama-siswa" class="form-control" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        <?php foreach ($siswa as $value) : ?>
                                            <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="warna">NISN</label>
                                    <input type="text" name="nisn" id="nisn" class="form-control " readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Tanggal Lahir</label>
                                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="warna">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="warna">No Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" class="form-control" required>
                                    <div>
                                        <p><b>Input hanya no urut surat keluarnya saja</b></p>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="warna">Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" id="no_surat" class="form-control datepicker">
                                </div>
                                <hr>
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#nama-siswa').on('change', (event) => {
        getSiswa(event.target.value).then(tbl_siswa => {
            $('#nisn').val(tbl_siswa.nisn);
            $('#tempat_lahir').val(tbl_siswa.tempat_lahir);
            $('#tanggal_lahir').val(tbl_siswa.tanggal_lahir);
            $('#nama_ibu').val(tbl_siswa.nama_ibu);

        });
    });

    async function getSiswa(id) {
        let response = await fetch('/api/homesiswa/' + id)
        let data = await response.json();

        return data;
    }
</script>




<?= $this->endSection() ?>