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




<!-- Buku Induk -->

<?php foreach ($datasiswa as $key => $value) { ?>

    <!-- Modal -->
    <div class="modal fade" id="detail<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-border">

                        <tr>
                            <th colspan="5" class="text-center">LEMBAR BUKU INDUK SISWA</th>
                        </tr>

                        <tr>
                            <td colspan="3">NOMOR INDUK SISWA</td>
                            <td>:</td>
                            <td><?= $value['nisn'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">NOMOR INDUK SISWA NASIONAL</td>
                            <td>:</td>
                            <td><?= $value['nisn'] ?></td>
                        </tr>
                        </tbody>
                    </table>


                    <table>

                        <tr>
                            <th>A. </th>
                            <th colspan="6">KETERANGAN TENTANG DIRI SISWA</th>
                        </tr>


                        <tr>
                            <td rowspan="12"></td>
                            <td>1.</td>
                            <td>Nama Siswa</td>
                            <td></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a. Nama Lengkap</td>
                            <td>:</td>
                            <td colspan="3"><?= $value['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Nama Panggilan</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Janis Kelamin</td>
                            <td>:</td>
                            <td colspan="6"><?= $value['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Tempat dan Tanggal Lahir</td>
                            <td>:</td>
                            <td colspan="6"><?= $value['tempat_lahir'] ?>, <?= date('d M Y', strtotime($value['tanggal_lahir'])) ?></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Agama</td>
                            <td>:</td>
                            <td colspan="6">Islam</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td colspan="6">Indonesia</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Jumlah Saudara Kandung</td>
                            <td>:</td>
                            <td colspan="6"></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Jumlah Saudara Tiri</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Jumlah Saudara Angkat</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>Anak Yatim/Yatim Piatu</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Bahasa Sehari-hari Di rumah</td>
                            <td>:</td>
                            <td colspan="3">Indonesia/Sunda</td>
                        </tr>
                        </tbody>
                    </table>


                    <table>

                        <tr>
                            <th>B.</th>
                            <th colspan="6">KETERANGAN TEMPAT TINGGAL</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td>12.</td>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td colspan="3"><?= $value['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>a. RT/RW</td>
                            <td>:</td>
                            <td colspan="3"><?= $value['rt'] ?>/<?= $value['rw'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>b. Desa/Kelurahan</td>
                            <td>:</td>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>c. Kecamatan</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>d. Kab/Kota</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>e. Provinsi</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>13.</td>
                            <td>Nomor Telp</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>14.</td>
                            <td>Tinggal Dengan</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>15.</td>
                            <td>Jarak Tempat Tinggal Ke Sekolah</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>

                    </table>


                    <table>

                        <tr>
                            <th>C.</th>
                            <th colspan="6">KETERANGAN KESEHATAN</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td>16.</td>
                            <td>Golongan Darah</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>17.</td>
                            <td>Penyakit Yang Pernah Diderita</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>18.</td>
                            <td>TBC/Cacar/Malaria/Asma dan Lain-Lain</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>19.</td>
                            <td>Kelainan Jasmani</td>
                            <td>:</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>20.</td>
                            <td>Tinggi Badan</td>
                            <td>:</td>
                            <td colspan="3"><?= $value['tinggi'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>21.</td>
                            <td>Berat Badan</td>
                            <td>:</td>
                            <td colspan="3"><?= $value['berat'] ?></td>
                        </tr>

                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th>D.</th>
                                <th colspan="6">KETERANGAN TENTANG AYAH KANDUNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>22.</td>
                                <td>Nama Ayah</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['nama_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>23.</td>
                                <td>Tahun Lahir</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['tahun_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>24.</td>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['didik_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>25.</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['kerja_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>26.</td>
                                <td>Penghasilan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['hasil_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>27.</td>
                                <td>No Telp</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['telp_ayah'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th>E.</th>
                                <th colspan="6">KETERANGAN TENTANG IBU KANDUNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>28.</td>
                                <td>Nama Ibu</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['nama_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>29.</td>
                                <td>Tahun Lahir</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['tahun_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>30.</td>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['didik_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>31.</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['kerja_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>32.</td>
                                <td>Penghasilan</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['hasil_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>33.</td>
                                <td>No Telp</td>
                                <td>:</td>
                                <td colspan="3"><?= $value['telp_ibu'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>



<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>