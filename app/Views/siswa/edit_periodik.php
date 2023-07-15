<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php if ($siswa['status_daftar'] == 1) { ?>


    <form action="<?= base_url('siswa/editperiodik/' . $siswa['id_siswa']) ?>" id="quickForm" method="post">

        <div class="row">
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
                            <input type="text" class="form-control " name="no_telp" value="<?= $siswa['no_telp'] ?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="">Maps</label>
                            <input type="text" class="form-control " name="maps" value="<?= $siswa['maps'] ?>" required>
                            <a href="https://www.google.com/maps" target="_blank">Buka Google Maps</a>
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
                            <input type="text" class="form-control " name="tinggi" value="<?= $siswa['tinggi'] ?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="">Berat Badan (cm)</label>
                            <input type="text" class="form-control " name="berat" value="<?= $siswa['berat'] ?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="">Lingkar Kepala (cm)</label>
                            <input type="text" class="form-control " name="lingkar" value="<?= $siswa['lingkar'] ?>" required>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1"><strong>Dengan ini saya menyatakan data yang saya input sudah benar.</strong></label>
        </div>
        <div class="text-center mb-3">
            <a href="<?= base_url('siswa/edit_orangtua/' . $siswa['id_siswa']) ?>" class="btn btn-danger"> <i class="fa-solid fa-backward mr-2"></i> Kembali</a>
            <button type="submit" class="btn btn-primary text-center"><i class="fa-solid fa-floppy-disk mr-2"></i>Submit</button>
        </div>
    </form>





<?php  } else if ($siswa['status_daftar'] == 2) { ?>



<?php } ?>





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