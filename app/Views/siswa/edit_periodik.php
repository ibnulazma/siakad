<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<form action="<?= base_url('siswa/editperiodik/' . $siswa['id_siswa']) ?>" id="quickForm" method="post">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="card-title">
                        Kontak
                    </h5>
                </div>
                <div class="card-body">
                    <div class="form-group ">
                        <label for="">No Hp</label>
                        <input type="text" class="form-control " name="telp_anak" value="<?= $siswa['telp_anak'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="card-title">
                        Lainnya
                    </h5>
                </div>
                <div class="card-body">

                    <div class="form-group ">
                        <label for="">Cita-cita</label>
                        <input type="text" class="form-control " name="cita_cita" value="<?= $siswa['cita_cita'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="">Hobi</label>
                        <input type="text" class="form-control " name="hobi" value="<?= $siswa['hobi'] ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="">No Seri Ijazah</label>
                        <input type="text" class="form-control " name="seri_ijazah" value="<?= $siswa['seri_ijazah'] ?>" required>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="card-title">
                        Data Periodik
                    </h5>
                </div>
                <div class="card-body">

                    <div class="form-group ">
                        <label for="">Tinggi Badan (cm)</label>
                        <input type="text" class="form-control " name="tinggi" value="<?= $siswa['tinggi'] ?>" data-inputmask="'mask': ['999']" data-mask required>
                    </div>
                    <div class="form-group ">
                        <label for="">Berat Badan (kg)</label>
                        <input type="text" class="form-control " name="berat" value="<?= $siswa['berat'] ?>" data-inputmask="'mask': ['999']" data-mask required>
                    </div>
                    <div class="form-group ">
                        <label for="">Lingkar Kepala (cm)</label>
                        <input type="text" class="form-control " name="lingkar" value="<?= $siswa['lingkar'] ?> " data-inputmask="'mask': ['99']" data-mask required>
                    </div>
                    <div class="form-group ">
                        <label for="">Jumlah Saudara Kandung</label>
                        <input type="text" class="form-control " name="jml_saudara" value="<?= $siswa['jml_saudara'] ?>" required>
                    </div>

                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1"><strong>Dengan ini saya menyatakan data yang saya input sudah benar.</strong></label>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        <a href="<?= base_url('siswa/edit_orangtua/' . $siswa['id_siswa']) ?>" class="btn btn-danger"> <i class="fa-solid fa-backward mr-2"></i> Kembali</a>
        <button type="submit" class="btn btn-primary text-center"><i class="fa-solid fa-floppy-disk mr-2"></i>Submit</button>
    </div>

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