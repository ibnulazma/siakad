<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>


<div class="row justify-content-between" style="margin-top: -100px;">
    <div class="col">
        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title fw-10"><i class="fa-solid fa-bullhorn"></i> Informasi Tentang SIAKAD</h3>
            </div>
            <div class="card-body">
                <p> Rangkaian kegiatan pembelajaran dari mulai presensi sampai penilaian peserta didik bisa dimonitoring oleh orang tua. Oleh karena itu peserta didik wajib aktif dalam pengupdatetan data secara berkala sesuai dengan arahan Bidang Kurikulum dan Kesiswaan.</p>
                <p> Berikut informasi terkait update data peserta didik Tahun Pelajaran 2023-2024 </p>
                <div class="timeline">
                    <div> <i class="fas fa-key bg-danger"></i>
                        <div class="timeline-item">

                            <h3 class="timeline-header">Login Ke Aplikasi</h3>
                            <div class="timeline-body">
                                Untuk login ke aplikasi silahkan isikan NISN (Nomor Induk Siswa Nasional) yang tertera di Ijazah SD/MI. Apabila tidak bisa silahkan hubungi bagian Admin SIAKAD INKA. Dan Password defaultnya "Kamil123"
                            </div>
                        </div>
                    </div>
                    <div> <i class="fas fa-user bg-warning"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">Update Data Peserta Didik</h3>
                            <div class="timeline-body">
                                Silahkan update data sesuai arahan yang ada di dashboard masing-masing. Data harus sesuai dengan berkas (Kartu Keluarga dan Ijazah).
                            </div>
                        </div>
                    </div>
                    <div> <i class="fas fa-check bg-success"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">Verifikasi Selesai</h3>
                            <div class="timeline-body">
                                Silahkan menunggu verifikasi data dari Admin dengan persyaratan memberikan Fotocopy Ijazah dan Kartu Keluarga masing-masing 1 lembar.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg"><b>Login Siakad </b> </h3>
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
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-headset"></i> Hotline</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        Ibnul Wafa
                        <p><i class="fa-brands fa-whatsapp"></i> 089643124964</p>
                    </li>
                    <li>
                        Fajar Mu'allim
                        <p><i class="fa-brands fa-whatsapp"></i> </p>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <i class="fa-solid fa-clock"></i> Hari Kerja
                <p> Senin-Jum'at Pukul 08:00-14:00 WIB</p>
            </div>
        </div>
    </div>
</div>






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







<?= $this->endSection() ?>