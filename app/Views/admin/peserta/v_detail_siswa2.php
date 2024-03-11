<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-4">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                    $gender = "L";
                    if ($gender == $siswa['jenis_kelamin']) { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                    <?php } else { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                    <?php  } ?>

                </div>
                <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>
                <p class="text-muted text-center">(<?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?>)</p>
                <?php if ($siswa['status_daftar'] == 1) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-danger">Belum Aktif</p>
                    </div>
                <?php } elseif ($siswa['status_daftar'] == 2) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-info">Verifikasi</p>
                    </div>
                <?php } elseif ($siswa['status_daftar'] == 3) { ?>
                    <div class="tombol text-center">
                        <p class="badge badge-success">Aktif</p>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">ijazah</p>
                            <span class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">akte</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">kk</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <strong>IDENTITAS</strong>
                </h5>
                <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#identitas"><i class="fas fa-edit"></i> </button>
            </div>
            <div class="card-body">
                <ul class="list-group  mb-3">
                    <li class="list-group-item">
                        <span>TTL: <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tanggal_lahir'] ?> </span>
                    </li>
                    <li class="list-group-item">
                        <span>NIK : <?= $siswa['nik'] ?> </span>
                    </li>
                    <li class="list-group-item">
                        <span>NISN : <?= $siswa['nisn'] ?> </span>
                    </li>
                    <li class="list-group-item">
                        <span>NIS : <?= $siswa['nis'] ?> </span>
                    </li>
                    <!--  -->
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <strong>ALAMAT</strong>
                </h5>
                <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#alamat"><i class="fas fa-edit"></i> </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">

                            <li class="list-group-item">
                                <span> Alamat: <?= $siswa['alamat'] ?></span>
                            </li>
                            <li class="list-group-item">
                                <span> RT/ RW: <?= $siswa['rt'] ?>/<?= $siswa['rw'] ?></span>
                            </li>
                            <li class="list-group-item">
                                <span> Desa/Kel: <?= $siswa['desa'] ?> </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span> Kec: <?= $siswa['nama_kecamatan'] ?> </span>
                            </li>
                            <li class="list-group-item">
                                <span> Kab/Kota: <?= $siswa['city_name'] ?> </span>
                            </li>
                            <li class="list-group-item">
                                <span> Kode Pos: <?= $siswa['kodepos'] ?> </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <strong>DATA ORANG TUA</strong>
                </h5>
                <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#orangtua"><i class="fas fa-edit"></i> </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span> Nama Ayah: <?= $siswa['nama_ayah'] ?></span>
                            </li>
                            <li class="list-group-item">
                                NIK Ayah: <?= $siswa['nik_ayah'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Tahun Lahir: <?= $siswa['tahun_ayah'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Pendidikan : <?= $siswa['didik_ayah'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Pekerjaan : <?= $siswa['kerja_ayah'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Penghasilan : <?= $siswa['hasil_ayah'] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span> Nama Ibu: <?= $siswa['nama_ibu'] ?></span>
                            </li>
                            <li class="list-group-item">
                                NIK Ibu: <?= $siswa['nik_ibu'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Tahun Lahir: <?= $siswa['tahun_ibu'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Pendidikan : <?= $siswa['didik_ibu'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Pekerjaan : <?= $siswa['kerja_ibu'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Penghasilan : <?= $siswa['hasil_ibu'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">DATA PERIODIK dan REGISTRASI</h5>
                <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#periodik"><i class="fas fa-edit"></i> </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">

                            <li class="list-group-item">
                                <span> Anak Ke : <?= $siswa['anak_ke'] ?></span>
                            </li>
                            <li class="list-group-item">
                                <span> Berat Badan : <?= $siswa['berat'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Tinggi Badan : <?= $siswa['tinggi'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Lingkar Kepala : <?= $siswa['lingkar'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Jumlah Saudara : <?= $siswa['jml_saudara'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Tinggal Bersama : <?= $siswa['tinggal'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Transportasi : <?= $siswa['transportasi'] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span> Anak </span>
                            </li>
                            <li class="list-group-item">
                                Hobi: <?= $siswa['hobi'] ?></span>
                            </li>
                            <li class="list-group-item">
                                Cita-cita: <?= $siswa['cita_cita'] ?></span>
                            </li>
                            <li class="list-group-item">
                                No Telp : <?= $siswa['telp_anak'] ?></span>
                            </li>
                            <li class="list-group-item">
                                No Seri Ijazah : <?= $siswa['seri_ijazah'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




















<!-- Modal dEditIdentitas-->
<div class="modal fade" id="identitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('peserta/edit_identitas/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Nama Siswa</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tempat</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tanggal Lahir</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="<?= $siswa['tanggal_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">NISN</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="nisn" value="<?= $siswa['nisn'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">NIK</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="nik" value="<?= $siswa['nik'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">NIS</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="nis" value="<?= $siswa['nis'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Kelas</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="id_kelas" class="form-control">
                                    <?php if ($siswa['id_kelas'] = NULL) { ?>
                                        <option value="">-Pilih Kelas</option>
                                        <?php foreach ($kelas as $key => $value) { ?>
                                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                                        <?php } ?>
                                    <?php } else {  ?>
                                        <?php foreach ($kelas as $key => $value) { ?>
                                            <option value="<?= $value['id_kelas'] ?>" <?= $siswa['kelas'] == $value['kelas'] ? 'selected' : '' ?>> <?= $value['kelas'] ?></option>
                                        <?php } ?>
                                    <?php     } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- EditAlamat -->
<div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('peserta/update_alamat/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Alamat</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " name="alamat" value="<?= $siswa['alamat'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">RT</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="rt" value="<?= $siswa['rt'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">RW</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="rw" value="<?= $siswa['rw'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Provinsi</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="provinsi" class="form-control select2bs4  " style="width: 100%;" id="provinsi" value="<?= old('provinsi') ?>">
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $row) { ?>
                                        <option value="<?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Kab/Kota</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="kabupaten" class="form-control select2bs4 " style="width: 100%;" id="kabupaten">
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Kecamatan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="kecamatan" class="form-control select2bs4 " style="width: 100%;" id="kecamatan">
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Desa</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="desa" class="form-control select2bs4 " style="width: 100%;" id="desa">
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Kode Pos</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="kodepos" value="<?= $siswa['kodepos'] ?>">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- Modal Orangtua-->
<div class="modal fade" id="orangtua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Orng Tua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('peserta/update_orangtua/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Nama Ayah</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">NIK AYAH</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="nik_ayah" value="<?= $siswa['nik_ayah'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tahun Lahir</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="tahun_ayah" value="<?= $siswa['tahun_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Pendidikan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="didik_ayah" class="form-control">
                                    <option value="">-- Pilih Pendidikan --</option>
                                    <?php foreach ($didik as $key => $value) { ?>
                                        <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ayah'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Pekerjaan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="kerja_ayah" class="form-control ">
                                    <?php foreach ($kerja as $key => $value) { ?>
                                        <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ayah'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Penghasilan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="hasil_ayah" class="form-control <?= ($validation->hasError('hasil_ayah')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)" value="<?= $siswa['hasil_ayah'] ?>">
                                    <?php foreach ($hasil as $key => $value) { ?>
                                        <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ayah'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">No Telp</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="telp_ayah" class="form-control" value="<?= $siswa['telp_ayah'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Nama Ibu</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">NIK Ibu</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nik_ibu" value="<?= $siswa['nik_ibu'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tahun Lahir</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tahun_ibu" value="<?= $siswa['tahun_ibu'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Pendidikan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="didik_ibu" class="form-control">
                                    <?php foreach ($didik as $key => $value) { ?>
                                        <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ibu'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Pekerjaan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="kerja_ibu" class="form-control">
                                    <?php foreach ($kerja as $key => $value) { ?>
                                        <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ibu'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Penghasilan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="hasil_ibu" class="form-control">
                                    <option value="">--Pilih Penghasilan--</option>
                                    <?php foreach ($hasil as $key => $value) { ?>
                                        <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ibu'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">No Telp</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="telp_ibu" class="form-control" value="<?= old('telp_ibu') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="modal fade" id="periodik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Periodik dan Registrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('peserta/update_alamat/' . $siswa['id_siswa']) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Berat Badan</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="berat" value="<?= $siswa['berat'] ?>"></td>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tinggi Badan</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="tinggi" value="<?= $siswa['tinggi'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Lingkar Kepala</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="lingkar" value="<?= $siswa['lingkar'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Anak Ke</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="number" class="form-control " name="anak_ke" value="<?= $siswa['anak_ke'] ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Jumlah Saudara Kandung</label>
                            </div>
                            <div class="col-sm-8">
                                <input type=" number" class="form-control " name="jml_saudara" value="<?= $siswa['jml_saudara'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Tinggal Bersama</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="tinggal" class="form-control select2bs4 " style="width: 100%;">
                                    <option value="">--Tinggal Bersama--</option>
                                    <?php foreach ($tinggal as $key => $value) { ?>
                                        <option value="<?= $value['tinggal'] ?>" <?= $siswa['tinggal'] == $value['tinggal'] ? 'selected' : '' ?>> <?= $value['tinggal'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Transportasi</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="transportasi" class="form-control select2bs4 " style="width: 100%;">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($transportasi as $key => $value) { ?>
                                        <option value="<?= $value['transportasi'] ?>" <?= $siswa['transportasi'] == $value['transportasi'] ? 'selected' : '' ?>> <?= $value['transportasi'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Hobi</label>
                            </div>
                            <div class="col-sm-8">
                                <input type=" number" class="form-control " name="hobi" value="<?= $siswa['hobi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Cita cita</label>
                            </div>
                            <div class="col-sm-8">
                                <input type=" number" class="form-control " name="cita_cita" value="<?= $siswa['cita_cita'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Telp Anak</label>
                            </div>
                            <div class="col-sm-8">
                                <input type=" number" class="form-control " name="telp_anak" value="<?= $siswa['telp_anak'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Seri Ijazah</label>
                            </div>
                            <div class="col-sm-8">
                                <input type=" number" class="form-control " name="seri_ijazah" value="<?= $siswa['seri_ijazah'] ?>">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

















<?= $this->endSection() ?>