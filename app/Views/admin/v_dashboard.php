<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-user-graduate"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Peserta Didik</span>
                <span class="info-box-number"><?= $jumlahaktif ?> Orang</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-user-tie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PTK</span>
                <span class="info-box-number"><?= $jumlahptk ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-school"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Rombel</span>
                <span class="info-box-number"><?= $jumlahkelas ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
</div>




<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    Selamat Datang
                </h5>
            </div>
            <div class="card-body">
                <h3>Tahun Pelajaran <b>Aktif</b></h3>
                <h4><?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></h4>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/foto/logo.png" alt="" width="90px">
                    <p><b>SMP INSAN KAMIL</b></p>
                    <p>Jalan Raya Legok-Karawaci No 89 Rt 07 Rw 02 Legok</p>
                    <p></p>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Rombel</th>
                            <th>L</th>
                            <th>P</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($grupkelas->getResult() as $row) {
                            $rombel = $row->kelas;
                            $jumlah = $row->jumlah;

                        ?>
                            <tr>
                                <td><?= $rombel ?> </td>
                                <td></td>
                                <td></td>
                                <td> <strong><?= $jumlah ?></strong> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <div width="50%">
                    <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div> -->
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div width="50%">
                    <canvas id="dognut" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>











<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dognut');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', ' Belum Aktif'],
            datasets: [{
                label: '',
                data: [<?= json_encode($jumlahaktif) ?>, <?= json_encode($jumlahtidakaktif) ?>],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',

                ],

            }]
        },

    });
</script>


<?= $this->endSection() ?>