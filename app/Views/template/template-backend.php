<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | <?= $subtitle ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/dist/css/calendar.css">

    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/summernote/summernote-bs4.min.css">


    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
</head>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <nav class="main-header navbar navbar-expand navbar-primary navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="<?= base_url() ?>/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="25px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Setting
                        </a>
                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign-Out
                        </a>

                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() ?>/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAKAD INKA</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <?php if (session()->get('level') == 1) { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">MENU</li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin') ?>" class="nav-link <?= $menu == 'admin' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item <?= $menu == 'akademik' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'akademik' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Akademik
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('ta') ?>" class="nav-link <?= $submenu == 'ta' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahun Pelajaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('peserta') ?>" class="nav-link <?= $submenu == 'peserta' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Peserta Didik</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('guru') ?>" class="nav-link <?= $submenu == 'guru' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>PTK</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('kelas') ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rombongan Belajar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('mapel') ?>" class="nav-link <?= $submenu == 'mapel' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mata Pelajaran</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?= base_url('jadwal') ?>" class="nav-link <?= $submenu == 'jadwal' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jadwal Pelajaran</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header">EXAMPLES</li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/backup') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Backup Database

                                    </p>
                                </a>
                            </li>
                        </ul>
                    <?php } elseif (session()->get('level') == 2) { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">MENU</li>
                            <li class="nav-item">
                                <a href="<?= base_url('guru') ?>" class="nav-link <?= $menu == 'pendidik' ? 'active' : '' ?>">
                                    <i class="fas fa-tachometer-alt nav-icon"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">EXAMPLES</li>
                        </ul>

                    <?php } elseif (session()->get('level') == 3) { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">Menu</li>
                            <li class="nav-item">
                                <a href="<?= base_url('siswa') ?>" class="nav-link <?= $menu == 'siswa' ? 'active' : '' ?> ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('siswa/profile') ?>" class="nav-link <?= $menu == 'profile' ? 'active' : '' ?> ">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profil

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('auth/logout') ?>" class="nav-link  ">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $subtitle ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $subtitle ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Design by IbnulWafa</strong> @SIAKADINKA <?= date('Y') ?>
        </footer>
    </div>

    <script src="<?= base_url() ?>/AdminLTE/plugins/sweetalert2/sweetalert2.all.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>




    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/sparklines/sparkline.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.js?v=3.2.0"></script>





    <script src="<?= base_url() ?>/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->

    <!-- dropzonejs -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>

    <!-- AkhirForm -->



    <!-- dataTables -->

    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Validation -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-validation/additional-methods.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- DatTables -->

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })

            $('#datemask3').inputmask('yyyy/mm/dd', {
                'placeholder': 'yyyy/mmmm/dd'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            // bootsrapswitch
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
    </script>

    <!-- <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script> -->
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var id_kabupaten = $("#provinsi").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKabupaten') ?>/' + id_kabupaten,
                    success: function(html) {
                        $("#kabupaten").html(html);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var id_kecamatan = $("#kabupaten").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKecamatan') ?>/' + id_kecamatan,
                    success: function(html) {
                        $("#kecamatan").html(html);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#kecamatan").change(function() {
                var id_desa = $("#kecamatan").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataDesa') ?>/' + id_desa,
                    success: function(html) {
                        $("#desa").html(html);
                    }
                });
            });
        });
    </script>

    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                title: 'Data Berhasil',
                text: swal,
                icon: 'success'
            })
        }

        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin akan dihapus',
                text: "Data Akan Hilang",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
    </script>


</body>

</html>