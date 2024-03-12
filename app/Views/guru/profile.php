<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>

                                <input type="text" class="form-control" name="nama_guru" value=" <?= $data['nama_guru'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt_lahir" value="<?= $data['tmpt_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value=<?= $data['tgl_lahir'] ?>>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NUPTK</label>
                                <input type="text" class="form-control" name="nuptk" value=<?= $data['nuptk'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Email Aktif</label>
                                <input type="text" class="form-control" name="email" value=<?= $data['email'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="text" class="form-control" name="email" value=<?= $data['telp_guru'] ?>>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>










<?= $this->endSection() ?>