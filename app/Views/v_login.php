<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?>| <?= $subtitle ?> </title>


    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/fontawesome-free/css/solid.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">


    <style>
        body {
            background-image: url('<?= base_url() ?>/foto/skul.jpg');
            background-size: cover;
        }
    </style>


<body class="hold-transition login-page">



    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <div class="text-center mb-3">
                    <img src="<?= base_url() ?>/logo/logo.png" alt="AdminLTE Logo" style="opacity: .8;text-align:center;" width="75px">
                </div>
                <h3 class="login-box-msg"><b>SIAKAD </b><br>
                    <span style="font-size: 20px;">SISTEM INFORMASI AKADEMIK</span>
                </h3>

                <?php
                $errors = session()->getFlashdata('errors');

                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo ' </div>';
                } elseif (session()->getFlashdata('error')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session()->getFlashdata('error');
                    echo ' </div>';
                } ?>
                <?= form_open('auth/ceklogin') ?>

                <div class="mb-4">
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" name="username" value="<?= old('username') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class=" mb-2">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="Show" placeholder="Password" name="password" value="<?= old('password') ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="mb-4">
                    <select name="level" id="" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>">
                        <option value="">--Pilih Level--</option>
                        <option value="1">Administrator</option>
                        <option value="2">Guru</option>
                        <option value="3">Siswa</option>
                        <option value="4">Wali Kelas</option>
                    </select>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('level'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" onclick="myFunction()">
                        <label class="custom-control-label" for="exampleCheck1">Tampilkan Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4"><i class="fas fa-sign-in"></i> Sign In</button>
                <?= form_close() ?>
            </div>
        </div>

    </div>


    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.min.js?v=3.2.0"></script>


    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

    <script type="text/javascript">
        function myFunction() {
            var show = document.getElementById('Show');
            if (show.type == 'password') {
                show.type = 'text';
            } else {
                show.type = 'password';
            }
        }
    </script>


</body>

</html>