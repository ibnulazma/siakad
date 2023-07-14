<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if ($siswa['status_daftar'] == 0) { ?>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5>Biodata Orang Tua</h5>
            </div>
            <?= form_open('siswa/editortu/' . $siswa['id_siswa']); ?>
            <div class="card-body">
                <div class="row">

                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-warning btn-block"> Submit</button>
                </div>
            </div>
        </div>

        <?php echo form_close() ?>
    </div>
<?php } ?>



<?= $this->endSection() ?>