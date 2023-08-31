<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-2">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <div class="gambar">
                        <?php
                        $gender = "L";
                        if ($gender == $siswa['jenis_kelamin']) { ?>
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                        <?php } else { ?>
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                        <?php  } ?>
                    </div>

                    <button class="btn btn-danger btn-sm mt-4">Ganti Foto</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="float-right">

                    <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-gauge"></i> Dashboard</a>

                    <a href="<?= base_url('siswa/resetdata/' . $siswa['id_siswa']) ?>" class="btn btn-danger btn-sm"><i class="fa-regular fa-pen-to-square fa-beat"></i> Update</a>
                </div>
            </div>
            <div class="card-body text-sm">
                <div class="keterangan">
                    <div class="row">
                        <div class="col-md-6">
                            <table width="50%" class="table">
                                <tr>
                                    <td><b>NISN</b></td>
                                    <td><?= $siswa['nisn'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td><?= $siswa['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Siswa</b></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>
                                        <?php $jk = 'L';
                                        if ($jk == $siswa['jenis_kelamin']) { ?>
                                            Laki-laki
                                        <?php } else { ?>

                                            Perempuan
                                        <?php } ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tempat Lahir</b></td>
                                    <td><?= $siswa['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Lahir</b></td>
                                    <td><?= $siswa['tanggal_lahir'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table width="50%" class="table">
                                <tr>
                                    <td><b>Nama Ibu</b></td>
                                    <td><?= $siswa['nama_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kelas</b></td>
                                    <td><?= $siswa['kelas'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Status</b></td>

                                    <?php if ($siswa['status_daftar'] == 1) { ?>
                                        <td class="text-danger">Belum Akif</td>
                                    <?php  } else if ($siswa['status_daftar'] == 2) { ?>
                                        <td class="text-danger">Verifikasi</td>
                                    <?php  } else if ($siswa['status_daftar'] == 3) { ?>
                                        <td>Akif</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td><b>Tahun Pelajaran</b></td>
                                    <td><?= $siswa['ta'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php if ($siswa['status_daftar'] == 1) { ?>

            <?= form_open('siswa/edit_siswa/' . $siswa['id_siswa']) ?>
            <?= csrf_field() ?>

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#alamat" data-toggle="tab">Alamat Domisili</a></li>
                        <li class="nav-item"><a class="nav-link" href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                        <li class="nav-item"><a class="nav-link" href="#periodik" data-toggle="tab">Periodik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#registrasi" data-toggle="tab">Registrasi</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="alamat">
                            <div class="row">
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td width="30%"><b>Alamat</b></td>
                                            <td>
                                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" value="<?= old('alamat') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>RT</b></td>
                                            <td>
                                                <input type="number" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" name="rt" value="<?= old('rt') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('rt'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>RW</b></td>
                                            <td>
                                                <input type="number" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" name="rw" value="<?= old('rw') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('rw'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi</b></td>
                                            <td>
                                                <select name="provinsi" class="form-control  select2bs4" style="width: 100%;" id="provinsi">

                                                    <option value="">--Pilih Provinsi--</option>
                                                    <?php foreach ($provinsi as $row) { ?>
                                                        <option value=" <?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Kab/Kota</b></td>
                                            <td>
                                                <select name="kabupaten" class="form-control select2bs4" style="width: 100%;" id="kabupaten">
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table" width="50%">
                                        <tr>
                                            <td width="30%"><b>Kecamatan</b></td>
                                            <td>
                                                <select name="kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan">
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('kecamatan'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Desa/Kel</b></td>
                                            <td>
                                                <select name="desa" class="form-control select2bs4 <?= ($validation->hasError('desa')) ? 'is-invalid' : ''; ?>" style="width: 100%;" id="desa">
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('desa'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Pos</b></td>
                                            <td>
                                                <input type="number" class="form-control <?= ($validation->hasError('kodepos')) ? 'is-invalid' : ''; ?>" name="kodepos" value="<?= old('kodepos') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('kodepos'); ?>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="orangtua">
                            <div class="row">
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Nama Ayah</b></td>
                                            <td>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" name="nama_ayah" value="<?= old('nama_ayah') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_ayah'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tahun Lahir</b></td>
                                            <td><input type="number" class="form-control <?= ($validation->hasError('tahun_ayah')) ? 'is-invalid' : ''; ?>" name="tahun_ayah" value="<?= old('tahun_ayah') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tahun_ayah'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Pendidikan</b></td>
                                            <td>
                                                <select name="didik_ayah" class="form-control <?= ($validation->hasError('didik_ayah')) ? 'is-invalid' : ''; ?>">
                                                    <option value="">-- Pilih Pendidikan --</option>
                                                    <?php foreach ($didik as $key => $value) { ?>
                                                        <option value="<?= $value['pendidikan'] ?>"> <?= $value['pendidikan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('didik_ayah'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Pekerjaan</b></td>
                                            <td>
                                                <select name="kerja_ayah" class="form-control <?= ($validation->hasError('didik_ayah')) ? 'is-invalid' : ''; ?>" id="dropdown" onChange="opsi(this)">
                                                    <option value="">--Pilih Pekerjaan--</option>
                                                    <?php foreach ($kerja as $key => $value) { ?>
                                                        <option value="<?= $value['pekerjaan'] ?>"> <?= $value['pekerjaan'] ?></option>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('kerja_ayah'); ?>
                                                        </div>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Penghasilan</b></td>
                                            <td>
                                                <select name="hasil_ayah" class="form-control <?= ($validation->hasError('hasil_ayah')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)">
                                                    <option value="">--Pilih Penghasilan--</option>
                                                    <?php foreach ($hasil as $key => $value) { ?>
                                                        <option value="<?= $value['penghasilan'] ?>"> <?= $value['penghasilan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('hasil_ayah'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>No Hp Ayah</b></td>
                                            <td>
                                                <input type="text" class="form-control" name="telp_ayah <?= ($validation->hasError('telp_ayah')) ? 'is-invalid' : ''; ?>" value="<?= old($siswa['telp_ayah']) ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('telp_ayah'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Nama Ibu</b></td>
                                            <td>
                                                <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" readonly>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><b>Tahun Lahir</b></td>
                                            <td><input type="number" class="form-control" name="tahun_ibu" value="<?= $siswa['tahun_ibu'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pendidikan</b></td>
                                            <td>
                                                <select name="didik_ibu" class="form-control">
                                                    <option value="">-- Pilih Pendidikan --</option>
                                                    <?php foreach ($didik as $key => $value) { ?>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Pekerjaan</b></td>
                                            <td>
                                                <select name="kerja_ibu" class="form-control" id="dropdown" onChange="opsi(this)">
                                                    <option value="">--Pilih Pekerjaan--</option>
                                                    <?php foreach ($kerja as $key => $value) { ?>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <td><b>Pengasilan</b></td>
                                        <td>
                                            <select name="hasil_ibu" class="form-control" id="dipilih" onChange="opsi(this)">
                                                <option value="">--Pilih Penghasilan--</option>
                                                <?php foreach ($hasil as $key => $value) { ?>

                                                <?php } ?>
                                            </select>
                                        </td>
                                        <tr>
                                            <td><b>No Hp Ibu</b></td>
                                            <td><input type="number" class="form-control" name="telp_ibu" value="<?= $siswa['telp_ibu'] ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="periodik">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tr>
                                            <td><b>Berat Badan</b></td>
                                            <td><input type="number" class="form-control" name="berat" value="<?= $siswa['berat'] ?>"> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tinggi Badan</b></td>
                                            <td><input type="number" class="form-control" name="tinggi" value="<?= $siswa['tinggi'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Lingkar Kepala</b></td>
                                            <td><input type="number" class="form-control" name="lingkar" value="<?= $siswa['lingkar'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Anak Ke</b></td>
                                            <td><input type="number" class="form-control" name="anak_ke" value="<?= $siswa['anak_ke'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah Saudara Kandung</b></td>
                                            <td><input type="number" class="form-control" name="jml_saudara" value="<?= $siswa['jml_saudara'] ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class=" col-md-6">
                                    <table class="table">
                                        <tr>
                                            <td><b>Tinggal Bersama</b></td>
                                            <td>
                                                <select name="tinggal" class="form-control select2bs4" style="width: 100%;">
                                                    <option value="">--Tinggal Bersama--</option>
                                                    <?php foreach ($tinggal as $key => $value) { ?>
                                                        <option value="<?= $value['tinggal'] ?>" <?= $siswa['tinggal'] == $value['tinggal'] ? 'selected' : '' ?>> <?= $value['tinggal'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Transportasi</b></td>
                                            <td>
                                                <select name="transportasi" class="form-control select2bs4" style="width: 100%;">
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach ($transportasi as $key => $value) { ?>
                                                        <option value="<?= $value['transportasi'] ?>" <?= $siswa['transportasi'] == $value['transportasi'] ? 'selected' : '' ?>> <?= $value['transportasi'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="registrasi">

                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3 btn-block">Simpan</button>
            <?= form_close() ?>


        <?php  } else if ($siswa['status_daftar'] == 2) { ?>

            <div class="alert alert-warning">
                Verifikasi : Silahkan Kumpulkan Fotocopy Ijazah dan Kartu Keluarga !!!
            </div>

        <?php  } else if ($siswa['status_daftar'] == 3) { ?>

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#alamat" data-toggle="tab">Alamat Domisili</a></li>
                        <li class="nav-item"><a class="nav-link" href="#orangtua" data-toggle="tab">Orang Tua</a></li>
                        <li class="nav-item"><a class="nav-link" href="#periodik" data-toggle="tab">Periodik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#registrasi" data-toggle="tab">Registrasi</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="alamat">
                            <div class="row">
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Alamat</b></td>
                                            <td><?= $siswa['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>RT</b></td>
                                            <td><?= $siswa['rt'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>RW</b></td>
                                            <td><?= $siswa['rw'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Desa/Kelurahan</b></td>
                                            <td><?= $siswa['desa'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Pos</b></td>
                                            <td><?= $siswa['kodepos'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table" width="50%">
                                        <tr>
                                            <td><b>Kecamatan</b></td>
                                            <td><?= $siswa['nama_kecamatan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kab/Kota</b></td>
                                            <td><?= $siswa['kabupaten'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi</b></td>
                                            <td><?= $siswa['provinsi'] ?></td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="orangtua">
                            <div class="row">
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Nama Ayah</b></td>
                                            <td><?= $siswa['nama_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tahun Lahir</b></td>
                                            <td><?= $siswa['tahun_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pendidikan</b></td>
                                            <td><?= $siswa['didik_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pekerjaan</b></td>
                                            <td><?= $siswa['kerja_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Penghasilan</b></td>
                                            <td><?= $siswa['hasil_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>No Ayah</b></td>
                                            <td><?= $siswa['telp_ayah'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Nama Ibu</b></td>
                                            <td><?= $siswa['nama_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tahun Lahir</b></td>
                                            <td><?= $siswa['tahun_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pendidikan</b></td>
                                            <td><?= $siswa['didik_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pekerjaan</b></td>
                                            <td><?= $siswa['kerja_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Penghasilan</b></td>
                                            <td><?= $siswa['hasil_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>No Ibu</b></td>
                                            <td><?= $siswa['telp_ibu'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="periodik">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <table width="50%" class="table">
                                        <tr>
                                            <td><b>Berat Badan</b></td>
                                            <td><?= $siswa['berat'] ?> kg</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tinggi Badan</b></td>
                                            <td><?= $siswa['tinggi'] ?> cm</td>
                                        </tr>
                                        <tr>
                                            <td><b>Lingkar Kepala</b></td>
                                            <td><?= $siswa['lingkar'] ?> cm</td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah Saudara Kandung</b></td>
                                            <td><?= $siswa['jml_saudara'] ?></td>
                                        </tr>
                                    </table> -->
                                </div>
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Tinggal Bersama</b></td>
                                            <td><?= $siswa['tinggal'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Transportasi</b></td>
                                            <td><?= $siswa['transportasi'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="registrasi">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <table width="50%" class="table">
                                        <tr>
                                            <td><b>Status Pendaftaran</b></td>
                                            <td><?= $siswa['berat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>No Seri Ijazah</b></td>
                                            <td><?= $siswa['seri_ijazah'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Hobi</b></td>
                                            <td><?= $siswa['hobi'] ?> cm</td>
                                        </tr>

                                    </table> -->
                                </div>
                                <div class="col-md-6">
                                    <table width="50%" class="table">
                                        <tr>
                                            <td><b>Cita-cita</b></td>
                                            <td><?= $siswa['cita_cita'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>No Hp/Wa</b></td>
                                            <td><?= $siswa['telp_anak'] ?> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script>
    function opsi(value) {
        var st = $("#dropdown").val();
        if (st == "Sudah Meninggal") {
            document.getElementById("dipilih").disabled = true;
        } else {
            document.getElementById("dipilih").disabled = false;
        }
    }
</script>



<!-- //Data Wilayah  -->


<?= $this->endSection() ?>