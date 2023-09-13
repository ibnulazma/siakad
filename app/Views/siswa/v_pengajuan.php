<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<p>Untuk melakukan pengajuan pindah sekolah dari SMP Insan Kamil silahkan klik tombol berikut:</p>

<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Pengajuan Mutasi
</button>




<?php foreach ($mutasi as $value) { ?>

    <div class="row mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">

                    <tbody>

                        <tr>
                            <td>
                                <?php if ($value['status'] == 1) { ?>
                                    <span class="btn btn-info btn-sm"> Silahkan Hubungi Wali Kelas Untuk Cetak Permohonan</span>
                                <?php } ?>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?= form_open('siswa/ajuan/' . $siswa['id_siswa']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan Mutasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p> Adapun syarat untuk mutasi/pindah dari SMP INSAN KAMIL sebagai berikut:</p>
                <ul>
                    <li>Melunasi tunggakan</li>
                    <li>Surat Keterangan Diterima Dari Sekolah Yang Di Tuju</li>
                    <li>Cetak surat permohonan melalui Wali kelas masing masing</li>
                    <li>Klik tombol submit untuk melakukan pengajuan mutasi</li>
                </ul>
                <div class="form-group">
                    <label for="">Alasan Pindah</label>
                    <select name="alasan" id="" class="form-control">
                        <option value="Keinginan Orang Tua">Keinginan Orang Tua</option>
                        <option value="Pindah Rumah">Pindah Rumah</option>
                        <option value="Sambil Pondok">Sambil Pondok</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>