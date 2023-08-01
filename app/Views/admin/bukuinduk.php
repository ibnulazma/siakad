<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $title ?>, world!</title>
</head>


<style>
    body {
        background-color: #eaeaea;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    /* 
    .card-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 200px;
        background: #bbb;
        z-index: 2;
        height: 20px;
    }

    .card-block {
        margin-top: 20px;
        height: 100px;
        overflow: auto;
    } */
</style>


<body>
    <div class="container-fluid" style="margin-top: 50px; margin-bottom:150px;">
        <div class="card">
            <div class="card-header fixed">
                <div class="d-flex justify-content-between">
                    <div class="rinci">
                        <h6>Rincian Data Peserta Didik</h6>
                    </div>
                    <div class="kembali">
                        <a href="<?= base_url('peserta') ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-backward fa-beat-fade"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 ">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100px">
                                <th colspan="2" class="text-center">
                                    Lembar Induk Siswa
                                </th>
                                <tr>
                                    <th width="20px">Nama Lengkap</th>
                                    <th width="100px"><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th><?= $siswa['nama_siswa'] ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>