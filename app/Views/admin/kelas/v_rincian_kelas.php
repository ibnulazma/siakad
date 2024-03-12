<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Siswa Kelas <?= $kelas['kelas'] ?></h3>
            <button class="btn btn-warning btn-xs float-right mr-2" data-toggle="modal" data-target="#upload"> <i class="fas fa-upload"></i> P3MP</button>
            <button class="btn btn-danger btn-xs float-right mr-2" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</button>
            <a class="btn btn-success btn-xs float-right mr-2" href="<?= base_url('kelas') ?>"> <i class="fas fa-backward"></i></i> Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-5">
                <tr>
                    <th width="100px">Wali Kelas</th>
                    <td width="20px">:</td>
                    <td><?= $kelas['nama_guru'] ?></td>
                    <th>Jumlah </th>
                    <td width="20px">:</td>
                    <td><?= $jml_siswa ?></td>
                </tr>
                <tr>
                    <th width="50px">Kelas</th>
                    <td width="30px">:</td>
                    <td><?= $kelas['kelas'] ?></td>
                    <th>Tingkat</th>
                    <td width="20px">:</td>
                    <td><?= $kelas['tingkat'] ?></td>
                </tr>
            </table>


            <?php if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo ' </div>';
            } ?>

            <div class="container text-center">

                <div class="row d-flex justify-content-between">
                    <div class="col-md-10">
                        <a href="<?= base_url('kelas/halaman/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-blue btn-sm"><i class="fa-regular fa-file-lines"></i> Halaman Depan</a>
                        <a href="<?= base_url('kelas/label/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-black btn-sm"><i class="fa-solid fa-tag"></i> Label</a>
                        <a href="<?= base_url('kelas/print/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-pink btn-sm"><i class="fas fa-print"></i> Print Biodata</a>
                        <a href="<?= base_url('kelas/printexcel/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-green btn-sm"><i class="fas fa-file-excel"></i> Excel</a>
                        <a href="<?= base_url('kelas/ledger/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-info btn-sm"><i class="fas fa-table"></i> Leger</a>

                    </div>
                </div>
            </div>
            <div class="tabel-responsive">
                <table class="table table-bordered mt-5" id="example2" width="100%">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center" width="10%">#</th>
                            <th class="text-center" width="20%">NISN</th>
                            <th>Nama Peserta Didik</th>
                            <th width="20%">JK</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datasiswa as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['jenis_kelamin'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="<?= base_url('kelas/bukuinduk/' .  $value['id_siswa']) ?>" target="_blank" class="btn btn-sm btn-info "><i class=" fas fa-book"></i></a>
                                        <a href="<?= base_url('kelas/halamansiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-success "><i class="fa-solid fa-file"></i> </a>
                                        <a href="<?= base_url('kelas/biodatasiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm bg-black "><i class="fa-solid fa-address-card"></i> </a>
                                        <a href="<?= base_url('kelas/labelsiswa/' .  $value['id_siswa']) ?>" target="_blank" class="btn btn-sm bg-pink "><i class="fa-solid fa-tag"></i> </a>
                                        <a href="<?= base_url('kelas/hapusanggota/' . $value['nisn']) ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kelas/tambahanggota') ?>
            <div class="modal-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                            <th>Jenis Kelamin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db     = \Config\Database::connect();

                        $ta = $db->table('tbl_ta')
                            ->where('status', '1')
                            ->get()->getRowArray();
                        foreach ($tidakpunya as $key => $value) { ?>

                            <?php if ($kelas['id_tingkat'] == $value['id_tingkat']) { ?>
                                <tr>
                                    <td><input type="checkbox" name="nisn[]" value="<?= $value['nisn'] ?>"></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['tingkat'] ?></td>
                                    <td><?= $value['jenis_kelamin'] ?></td>
                                    <input type="hidden" name="id_kelas[]" value="<?= $kelas['id_kelas'] ?>">
                                    <input type="hidden" name="id_ta[]" value="<?= $ta['id_ta'] ?>">
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning "><i fas fa-upload></i> Tambah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('kelas/upload/' . $kelas['id_kelas']) ?>
            <div class="modal-body">
                <input type="file" class="form-control" name="fileimport">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning "><i fas fa-upload></i> Upload</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<!-- ModalHapus -->







<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>