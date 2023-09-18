<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta Didik</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Alasan</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengajuan as $key => $row) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $row['nama_siswa'] ?></td>
                            <td><?= $row['nisn'] ?></td>
                            <td><?= $row['kelas'] ?></td>
                            <td><?= $row['alasan'] ?></td>
                            <td>
                                <?php if ($row['status'] == 1) { ?>
                                    <a href="<?= base_url('pendidik/konfirmasi/' . $row['id_mutasi']) ?>" class="btn btn-success btn-sm"> <i class="fas fa-check-circle"></i> Konfirmasi</a>
                                <?php } else if ($row['status'] == 2) { ?>
                                    <a href="<?= base_url('pendidik/konfirmasi/' . $row['id_mutasi']) ?>" class="btn btn-danger btn-sm"> <i class="fas fa-print"></i> Print</a>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

























<?= $this->endSection() ?>