<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>





<?php if ($siswa['status_daftar'] == 1) { ?>
    <a href="<?= base_url('siswa/edit_alamat/' . $siswa['id_siswa']) ?>" class="btn btn-danger">Silahkan update data terlebih dahulu</a>
<?php } elseif ($siswa['status_daftar'] == 2) { ?>
    <span class="badge badge-warning">Verifikasi</span>
<?php } elseif ($siswa['status_daftar'] == 3) { ?>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Pendidikan Agama Islam</td>
                        <td><?= $nilai['pai'] ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pendidikan Kewarganegaraan</td>
                        <td><?= $nilai['pkn'] ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bahasa Indonesia</td>
                        <td><?= $nilai['indo'] ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Matematika</td>
                        <td><?= $nilai['mtk'] ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td><?= $nilai['ipa'] ?></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Ilmu Pengetahuan Sosial</td>
                        <td><?= $nilai['pkn'] ?></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Bahasa Inggris</td>
                        <td><?= $nilai['inggris'] ?></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Seni Budaya dan Kesenian</td>
                        <td><?= $nilai['sbk'] ?></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Prakarya</td>
                        <td><?= $nilai['prky'] ?></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Pendidikan Jasmani, Olah Raga dan Kesehatan</td>
                        <td><?= $nilai['pjok'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Kurikulum Mulok</b></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Teknologi Informatika dan Komputer</td>
                        <td><?= $nilai['tik'] ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Baca Tulis Alquran</td>
                        <td><?= $nilai['btq'] ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tajwid</td>
                        <td><?= $nilai['tjwd'] ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Terjemah</td>
                        <td><?= $nilai['trjmh'] ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Fiqih</td>
                        <td><?= $nilai['fiqih'] ?></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Muhadhoroh</td>
                        <td><?= $nilai['mhd'] ?></td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
<?php } ?>




<?= $this->endSection() ?>