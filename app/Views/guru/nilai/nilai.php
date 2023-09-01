<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="card ">

    <div class="card-body">

        <table class="table table-bordered">
            <thead class="text-center bg-primary">
                <tr>
                    <th>No</th>
                    <th>Kode Mapel</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php $no = 1;
                foreach ($absen as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_mapel'] ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td><?= $value['kelas'] ?></td>
                        <td>
                            <a href="<?= base_url('pendidik/nilaisiswa/' . $value['id_mapel']) ?>" class="btn btn-primary btn-sm"> <i class="fa-solid fa-list-check"></i> Nilai</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>














































<?= $this->endSection() ?>