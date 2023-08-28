<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>
<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

$tahun = $db->table('tbl_ta')

    ->get()->getRowArray();
?>

<div class="row">
    <div class="col-md-12">
        <?php if ($siswa['status_daftar'] == 1) { ?>

            <div class="bg-danger p-2">

                Perhatian: Silahkan Update Data !!!!

            </div>

        <?php  } else if ($siswa['status_daftar'] == 2) { ?>

            <div class="bg-warning p-2">
                Verifikasi :Silahkan Kumpulkan Fotocopy Ijazah dan Kartu Keluarga !!!

            </div>

        <?php  } else if ($siswa['status_daftar'] == 3) { ?>
            <div class="bg-primary p-2">
                Final: Data Anda Sudah Aktif !!!
            </div>

        <?php } else if ($siswa['status_daftar'] == 4) { ?>
            <div class="small-box bg-danger">
                Perhatian: Data Anda Silahkan Perbaiki Data Yang Salah !!!!
            </div>
        <?php } ?>



        <div class="card mt-2">
            <div class="card-header">
                <p class="card-title">
                    Selamat Datang
                </p>
            </div>
            <div class="card-body">
                <p> Selamat Datang <strong><?= $siswa['nama_siswa'] ?></strong> di Sistem Informasi Akademik SMP INSAN KAMIL <br></p>
                <h5>TAHUN PELAJARAN AKTIF : Semester <?= $siswa['semester'] ?> <?= $siswa['ta'] ?></h5>
            </div>
            <div class="card-footer">
                <?php if ($siswa['status_daftar'] == 1) { ?>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fas fa-edit"></i> Update Data</button>
                <?php  } else if ($siswa['status_daftar'] == 2) { ?>
                    <span class="btn btn-warning"><i class="fas fa-clipboard-list"></i> Verifikasi</span>
                <?php  } else if ($siswa['status_daftar'] == 3) { ?>
                    <a href="<?= base_url('siswa/portofolio') ?>" class="btn btn-primary"><i class="fas fa-pencil"></i> Rangkuman Data</a>

                <?php } else if ($siswa['status_daftar'] == 4) { ?>
                    <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>" class="btn btn-danger"><i class="fas fa-edit"></i> Update Data</a>
                <?php } ?>

            </div>
        </div>

        <?php if ($siswa['status_daftar'] == 4) { ?>
            <div class="alert alert-danger">
                Catatan Kesalahan : <?= $siswa['catatan'] ?>
            </div>
        <?php } ?>
    </div>
</div>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-bullhorn"></i> Informasi Penting</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">HARAP DIBACA SEBELUM UPDATE DATA!!</p>
                <p>Setelah beberapa siswa yang telah melakukan update data, sering terjadi kesalahan pengisian data sebagai berikut:</p>
                <div id="accordion">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    NO SERI IJAZAH
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p> <b> Contoh No Seri Ijazah SD Perhatikan Lingkaran Hitam Paling Bawah dan sesuaikan dengan no seri ijazah masing-masing</b></p>
                                <img src="<?= base_url('foto/ijazahSD.png') ?>" class="img-fluid" alt="">
                                <p><b> Contoh No Seri Ijazah MI Perhatikan Lingkaran Merah Paling Bawah sesuaikan dengan no seri ijazah masing-masing</b></p>
                                <img src="<?= base_url('foto/ijazahMI.png') ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    TAHUN LAHIR ORANG TUA
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Tulis Tahun Nya Saja, Contoh : Ayah/Ibu Tanggal Lahir di KK nya 06-09-1991 yang ditulis di aplikasi <b>1991</b>.
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                    Collapsible Group Success
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                nulla
                                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                labore sustainable VHS.
                            </div>
                        </div>

                    </div> -->
                </div>

                Setelah dibaca silahkan <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>"> klik disini</a> untuk update data !!!
            </div>
        </div>
    </div>
</div>



























































<?= $this->endSection() ?>