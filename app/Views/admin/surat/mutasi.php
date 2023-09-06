<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<h5>Surat Penerimaan PD Pindahan</h5>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Pilih Siswa</label>
                        <select name="" id="" class="form-control select2bs4" width="100%">
                            <?php foreach ($siswa as $key => $value) { ?>
                                <option value=""><?= $value['nama_siswa'] ?> | <?= $value['nisn'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alasan Pindah</label>
                        <select name="" id="" class="form-control select2bs4" width="100%">
                            <option value="">--Alasan--</option>
                            <option value="Pindah Rumah">Pindah Rumah</option>
                            <option value="Keinginan Anak">Keinginan Anak</option>
                            <option value="Sambil Pondok">Sambil Pondok</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Surat</label>
                        <input type="text" class="form-control">
                    </div>

                    <button class="btn btn-primary"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>