<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="card">
    <div class="card-header">
        <h5 class="card-title"> Daftar Nilai Peserta Didik Semester Ganjil</h5>
        <button type="button" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#exampleModal">
            Tambah Mata Pelajaran
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>UH1</th>
                    <th>UH2</th>
                    <th>UH3</th>
                    <th>UH4</th>
                    <th>UH5</th>
                    <th>UH6</th>
                    <th>UH7</th>
                    <th>UH8</th>
                    <th>UH9</th>
                    <th>UH10</th>
                    <th>Rata-rata UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>JUMLAH</th>
                </tr>


                <?php
                $no = 1;
                foreach ($nilai as $key => $value) { ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>





<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('siswa/mapeladd') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">

                        <tr>

                            <th>
                                <input type="checkbox" class="centangSemua" id="centangSemua">
                            </th>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                        </tr>

                        <?php
                        $no = 1;

                        foreach ($ambilmapel as $key => $value) { ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input centangForm" name="id_mapel[]" value="<?= $value['id_mapel'] ?>">
                                </td>
                                <td><?= $no++ ?></td>



                                <td>
                                    <input type="text" value="<?= $value['mapel'] ?>">
                                    <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">

                                </td>
                                <td>
                                    <button type="submit"> <i class="fas fa-plus"></i></button>
                                </td>


                            </tr>
                        <?php } ?>

                    </table>
                </div>

            </div>
        </form>
    </div>
</div>


<script src=" <?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#centangSemua').click(function(e) {
            if ($(this).is(":checked")) {
                $('.centangForm').prop('checked', true);
            } else {
                $('.centangForm').prop('checked', false);
            }
        });
    })
</script>


<?= $this->endSection() ?>