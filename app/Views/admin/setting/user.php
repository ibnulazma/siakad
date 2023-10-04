<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="col-md-4">
        <div class="card card-pink">
            <div class="card-header p-2">
                <h5 class="card-title">Tambah User</h5>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="" class="form-control" value="<?= implode($randompass) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="" id="" class="form-control">
                            <option value="">Superadmin</option>
                            <option value="">Admin</option>
                            <option value="">Piket</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    misalkan
    <div class="col-md-8">
        <div class="card card-blue">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar User
                </h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($user as $key => $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_user'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>




<?= $this->endSection() ?>