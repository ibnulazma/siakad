<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>















<?php
$session = \Config\Services::session();
if (!empty($session->getFlashdata('pesan'))) {
    echo  '<div class="alert alert-danger" role="alert">
                       
            ' . $session->getFlashdata('pesan') . '
            </div>';
}
if (!empty($session->getFlashdata('sukses'))) {
    echo  '<div class="alert alert-success" role="alert">
                       
            ' . $session->getFlashdata('sukses') . '
            </div>';
}
?>

<div class="row">
    <div class="col-md-5">

        <?= form_open_multipart('peserta/upload') ?>
        <div class="form-group">
            <div class="input-group">
                <input type="file" class="form-control" name="fileimport" id="exampleInputFile">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary" type="submit">Upload</button>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>

    <div class="col-md-7">
        <div class="input-group-append">
            <button class="input-group-text bg-success mb-3 mr-2" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus-circle mr-2"></i> Tambah Siswa</button>
            <button class="input-group-text bg-danger mb-3" id="delete-selected"> <i class="fas fa-trash-alt mr-2"></i> Hapus Banyak</button>
        </div>

    </div>
</div>

<div class="text-sm">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Data <?= $subtitle ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>#</th>
                            <th>NISN</th>
                            <th>NIK</th>
                            <th>Nama Siswa</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Ibu Kandung</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr class="
                        <?php
                            $hasil = "Sudah Meninggal";
                            if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } else { ?>
                            
                        <?php  } ?>


                        ">
                                <td><?= $key + 1 ?></td>
                                <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' . $value['id_siswa']) ?>"><i class="fas fa-user"></i></a></td>
                                <td class="text-center"><?= $value["nisn"] ?></td>
                                <td class="text-center"><?= $value["nik"] ?></td>
                                <td><?= $value["nama_siswa"] ?></td>
                                <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                <td class="text-center"> <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                <td><?= $value["nama_ibu"] ?></td>
                                <td class="text-center"><?= $value["jenis_kelamin"] ?></td>


                                <td class="text-center">
                                    <?php if ($value['status_daftar'] <= 0) { ?>
                                        <span class="badge bg-danger">keluar</span>

                                    <?php } elseif ($value['status_daftar'] == 1) { ?>
                                        <span class="badge bg-warning">belum aktif</span>
                                    <?php } elseif ($value['status_daftar'] == 2) { ?>
                                        <span class="badge bg-info">pilih rombel</span>
                                    <?php } elseif ($value['status_daftar'] == 3) { ?>
                                        <span class="badge bg-success">aktif</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editbiodata<?= $value['id_siswa'] ?>"> <i class="fas fa-pencil"></i> </a>
                                    <a class="btn btn-xs btn-info" href="<?= base_url('peserta/bukuinduk/' .  $value['id_siswa']) ?>"> <i class="fas fa-book"></i> </a>
                                    <a class="btn btn-xs btn-danger" href="<?= base_url('peserta/delete/' .  $value['id_siswa']) ?>"> <i class="fas fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal TambahManual -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('peserta/add') ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" name="nik">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Tingkat</label>
                            <select name="id_tingkat" id="" class="form-control">
                                <option value="">Pilih Tingkat</option>
                                <?php foreach ($tingkat as $key => $value) { ?>
                                    <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- VerifikasiData -->

<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_siswa'] . $value['id_tingkat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('peserta/verifikasi/' . $value['id_siswa']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Ijazah Tingkat <?= $value['tingkat'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="<?= $value['nama_siswa'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['id_kelas'] ?>"><?= $row['kelas'] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>


<!-- Editbiodata -->
<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="editbiodata<?= $value['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <?php echo form_open('peserta/editbiodata/' . $value['id_siswa']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Biodata <?= $value['nama_siswa'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="" value="<?= $value['nama_siswa'] ?>" id="">
                    </div>

                    <tr>
                        <td colspan="2"><b>B. KONTAK </b></td>
                    </tr>
                    <tr>
                        <td>10. Alamat</td>
                        <td><?= $value['alamat'] ?> RT <?= $value['rt'] ?> RW <?= $value['rw'] ?> Desa/Kel. <?= $value['desa'] ?> Kec. <?= $value['kecamatan'] ?></td>
                    </tr>
                    <tr>
                        <td>11. Nomor Telepon</td>
                        <td><?= $value['telp_anak'] ?></td>
                    </tr>
                    <tr>
                        <td>12. Tinggal Bersama</td>
                        <td><?= $value['tinggal'] ?></td>
                    </tr>
                    <tr>
                        <td>13. Jarak Tempat tinggal Ke Sekolah</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="2"><b>C. DATA AYAH </b></td>
                    </tr>
                    <tr>
                        <td>14. Nama</td>
                        <td><?= $value['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>15. Tahun Lahir</td>
                        <td><?= $value['tahun_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>16. NIK </td>
                        <td><?= $value['nik_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>17. Pendidikan Terakhir</td>
                        <td><?= $value['didik_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>18. Pekerjaan </td>
                        <td><?= $value['kerja_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>19. Penghasilan</td>
                        <td><?= $value['hasil_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>20. Telepon</td>
                        <td><?= $value['telp_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>D. DATA IBU </b></td>
                    </tr>
                    <tr>
                        <td>21. Nama</td>
                        <td><?= $value['nama_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>22. Tahun Lahir</td>
                        <td><?= $value['tahun_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>23. NIK </td>
                        <td><?= $value['nik_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>24. Pendidikan Terakhir</td>
                        <td><?= $value['didik_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>25. Pekerjaan </td>
                        <td><?= $value['kerja_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>26. Penghasilan</td>
                        <td><?= $value['hasil_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>27. Telepon</td>
                        <td><?= $value['telp_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>E. KESEHATAN </b></td>
                    </tr>
                    <tr>
                        <td>28. Tinggi Badan</td>
                        <td><?= $value['tinggi'] ?> cm</td>
                    </tr>
                    <tr>
                        <td>28. Berat Badan</td>
                        <td><?= $value['berat'] ?> kg</td>
                    </tr>
                    <tr>
                        <td>28. Lingkar Kepala</td>
                        <td><?= $value['lingkar'] ?> cm</td>
                    </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>










<?= $this->endSection() ?>