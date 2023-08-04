<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url() ?>/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <title>AJAX</title>
</head>

<body>
    <div class="container w-50">
        <div class="card mt-5">
            <div class="card-header">Transaksi</div>
            <div class="card-body">
                <form action="<?= base_url('home/save') ?>" method="post">
                    <div class="form-group">
                        <label for="nama-barang">Nama Barang</label>
                        <select name="nama-siswa" id="nama-siswa" class="form-control form-select-sm" required>
                            <option value="" selected disabled>-- Pilih Barang --</option>
                            <?php foreach ($siswa as $value) : ?>
                                <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="warna">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="warna">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="warna">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" readonly required>
                    </div>
                    <!-- <div class="form-group">
						<label for="size">Size</label>
						<input type="text" name="size" id="size" class="form-control" readonly required>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" name="harga" id="harga" class="form-control" readonly required>
					</div> -->
                    <hr>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#nama-siswa').on('change', (event) => {
            getSiswa(event.target.value).then(tbl_siswa => {
                $('#nisn').val(tbl_siswa.nisn);
                $('#tempat_lahir').val(tbl_siswa.tempat_lahir);
                $('#tanggal_lahir').val(tbl_siswa.tanggal_lahir);
                $('#nama_ibu').val(tbl_siswa.nama_ibu);
                // $('#size').val(barang.size);
                // $('#harga').val(barang.harga);
            });
        });

        async function getSiswa(id) {
            let response = await fetch('/api/homesiswa/' + id)
            let data = await response.json();

            return data;
        }
    </script>
    <script>
        // For Select2 4.0
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--small",
            dropdownCssClass: "select2--small",
        });
        $('#nama-siswa').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
</body>

</html>