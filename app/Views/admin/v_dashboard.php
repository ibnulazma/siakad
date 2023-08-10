<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-success" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
}
?>


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
                <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-school"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Rombel</span>
                <span class="info-box-number">1,410</span>
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
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div width="50%">
                    <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
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




<?php

foreach ($datatahun->getResult() as $row) {
    $thun[] = $row->ta;
    $jmlah[] = $row->jumlah;
}

?>

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

<!-- tabel -->
<script>
    const abc = document.getElementById('myChart');

    new Chart(abc, {
        type: 'bar',
        data: {
            labels: <?= json_encode($thun) ?>,
            datasets: [{
                label: '#Data Siswa Berdasarkan Tahun Ajaran <?= json_encode($thun) ?>',
                data: <?= json_encode($jmlah) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    // 'rgba(255, 205, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    // 'rgb(255, 205, 86)',
                    // 'rgb(75, 192, 192)',
                    // 'rgb(54, 162, 235)',
                    // 'rgb(153, 102, 255)',
                    // 'rgb(201, 203, 207)'
                ],
                borderWidth: 1,

            }]
        },
        options: {

            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>







<?= $this->endSection() ?>