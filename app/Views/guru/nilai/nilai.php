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
                foreach ($ambilmapel as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_mapel'] ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td><?= $value['kelas'] ?></td>
                        <td>
                            <a href="<?= base_url('nilai/nilaisiswa/' . $value['id_mapel'] /  $value['id_kelas']) ?>" class="btn btn-primary btn-sm"> <i class="fa-solid fa-list-check"></i> Nilai</a>
                            <button type="button" class=" btn-primary btn-sm" data-toggle="modal" data-target="#generate<?= $value['id_kelas'] ?>"> <i class="fa-solid fa-list-check"></i> Generate</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="generate<?= $value['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table>
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>











































<?= $this->endSection() ?>