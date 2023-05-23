<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="card">
    <div class="card-body">

        <table class="table table-bordered" width="100%">
            <thead class="bg-primary text-center">
                <tr>
                    <th colspan="2" rowspan="2">Mata Pelajaran</th>
                    <th rowspan="2">KKM</th>
                    <th rowspan="2">Nilai</th>
                    <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="5%"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>