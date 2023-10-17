<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="col-md-12">

    <div class="card card-danger">
        <div class="card-header">
            DATA NILAI P3MP TAHUN PELAJARAN
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;

                    foreach ($kelas as $row) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['kelas'] ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>