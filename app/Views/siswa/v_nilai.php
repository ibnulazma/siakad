<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="tab-pane" id="nilai">
    <div class="text-center text-danger">
        <?php if ($siswa['status_daftar'] == 0) { ?>
            <a href="<?= base_url('siswa/edit_alamat/' . $siswa['id_siswa']) ?>" class="text-danger">Silahkan update data terlebih dahulu</a>
        <?php } elseif ($siswa['status_daftar'] == 1) { ?>
            <a href="">Silahkan update data terlebih dahulu</a>
        <?php } ?>
    </div>
</div>


<?= $this->endSection() ?>