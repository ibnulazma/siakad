<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>

<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-success" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
} ?>


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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Rombel Tahun <?= $ta['ta'] ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>L</th>
                            <th>P</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<?= $this->endSection() ?>