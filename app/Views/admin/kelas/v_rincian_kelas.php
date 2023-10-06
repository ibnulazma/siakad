<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Siswa Kelas <?= $kelas['kelas'] ?></h3>
            <a class="btn btn-danger btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
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

            <div class="container text-center mr-2">
                <a href="<?= base_url('kelas/halaman/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-blue btn-sm"><i class="fa-regular fa-file-lines"></i> Halaman Depan</a>
                <a href="<?= base_url('kelas/label/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-black btn-sm"><i class="fa-solid fa-tag"></i> Label</a>
                <a href="<?= base_url('kelas/print/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-pink btn-sm"><i class="fas fa-print"></i> Print Biodata</a>
                <a href="<?= base_url('kelas/printexcel/' . $kelas['id_kelas']) ?>" target="_blank" class="btn bg-green btn-sm"><i class="fas fa-file-excel"></i> Excel</a>
            </div>
            <div class="tabel-responsive">
                <table class="table table-bordered mt-5" width="100%">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center" width="20px">#</th>
                            <th class="text-center" width="20px">NISN</th>
                            <th>Nama Peserta Didik</th>
                            <th>Jenis Kelamin</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datasiswa as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><a href="<?= base_url('kelas/detail_siswa/' . $value['id_siswa']) ?>"><i class="fas fa-user"></i></a></td>
                                <td class="text-center"><?= $value['nisn'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['jenis_kelamin'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?= $value['id_siswa'] ?>">
                                            <i class="fas fa-book"></i>
                                        </button>
                                        <a href="<?= base_url('kelas/hapusanggota/' . $value['id_siswa'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
            <div class="modal-body">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tidakpunya as $key => $value) { ?>

                            <?php if ($kelas['id_tingkat'] == $value['id_tingkat']) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td></td>
                                    <td><?= $value['jenis_kelamin'] ?></td>
                                    <td>
                                        <a href="<?= base_url('kelas/addanggota/' . $value['id_siswa'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ModalHapus -->







<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>