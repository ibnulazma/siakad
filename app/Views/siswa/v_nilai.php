<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-danger" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
} ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <?= $subtitle ?>
        </h3>
        <button class="btn btn-danger btn-xs float-right mb-2" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</button>
        <a href="" class="btn btn-success btn-xs float-right mb-2 mr-2"> <i class="fas fa-print"></i> Print</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-xs table-responsive" heigh="50px">
            <thead class="bg-primary">
                <tr>
                    <th rowspan="2">No</th>
                    <th width="50px" rowspan="2">Mata Pelajaran</th>
                    <th class="text-center" colspan="31">Pertemuan Ke-</th>
                    <th class="text-center" rowspan="2">Jumlah Hadir %</th>
                </tr>

            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($absen as $key => $value) { ?>
                    <tr>

                        <td> <?= $no++ ?></td>
                        <td> <?= $value['mapel'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>




<!-- ModalTambahAbsen -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped table-hover" id="example2">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Bid. Study</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($ambilmapel as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['mapel'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['kelas'] ?></td>

                                <td>
                                    <a href="<?= base_url('siswa/AddAbsen/' . $value['id_jadwal']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>