<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">
    <div class="col-md-7">
        <div class="card-body">
            <div class="callout callout-danger">
                <h5>Hi <b><?= $siswa['nama_siswa'] ?></b></h5>
                <p class="text-danger">Saat ini status anda sebagai peserta didik SMP Insan Kamil belum aktif. silahkan untuk melakukan registrasi untuk mengaktifkan status anda dengan <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>">klik disini</a>.</p>
            </div>
        </div>
    </div>
</div>




<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label for="inputAddress2">Hobi</label>
            <input type="text" name="hobi" class="form-control " value="<?= $siswa['hobi'] ?>" required>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Cita Cita</label>
            <input type="text" name="cita_cita" class="form-control " value="<?= $siswa['cita_cita'] ?>" required>
        </div>
    </div>


    <div class="col-md-4">
        <div class="card ">
            <div class="card-body">
                <div class="form-group ">
                    <label for="">Tinggi Badan</label>
                    <input type="text" class="form-control" name="tinggi" value="<?= $siswa['tinggi'] ?>" required>
                </div>

                <div class="form-group ">
                    <label for="">Berat Badan</label>
                    <input type="text" class="form-control" name="berat" value="<?= $siswa['berat'] ?>" required>
                </div>
                <div class="form-group ">
                    <label for="">Lingkar Kepala</label>
                    <input type="text" class="form-control" name="lingkar" value="<?= $siswa['berat'] ?>" required>
                </div>
                <div class="form-group ">
                    <label for="">Penyakit Yang Pernah Diderita/Yang Sedang Dialami</label>
                    <select name="penyakit" id="" class="form-control select2bs4" style="width: 100%;" required>
                        <option value="">--Pilih Penyakit--</option>
                        <option value="Asma">Asma</option>
                        <option value="Maag Kronis">Maag Kronis</option>
                        <option value="Bronkitis">Bronkitis</option>
                        <option value="Anemia">Anemia</option>
                        <option value="Dll">Dll</option>
                        <option value="Tidak Pernah">Tidak Pernah/Tidak Punya</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <button class=" btn btn-block btn-primary" type="submit"> Submit</button>
</div>



<div class="form-group ">
    <label for="inputAddress2">Seri Ijazah</label>
    <input type="text" class="form-control" name="seri_ijazah" value="<?= $siswa['seri_ijazah'] ?>" required>
</div>
<div class="form-group ">
    <label for="inputAddress2">No Wa</label>
    <input type="text" class="form-control" name="no_telp" value="<?= $siswa['no_telp'] ?>" required>
</div>

</div>
</div>

</div>
</div>


























<?= $this->endSection() ?>