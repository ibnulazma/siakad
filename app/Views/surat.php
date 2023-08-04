<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url() ?>/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.css">
    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>AJAX</title>
</head>

<body>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Pilih Siswa</label>
                <select name="nama-siswa" class="form-control" id="nama-siswa">
                    <option value="">Pilih Siswa</option>
                    <?php foreach ($siswa as $value) : ?>
                        <option value="<?= $value['id_siswa'] ?>"><?= $value['nama_siswa'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">NISN</label>
                <input type="text" id="nisn" name="nisn" class="form-control">
            </div>
        </div>
    </div>



    <script>
        $('#nama-siswa').on('change', (event) => {
            getSiswa(event.target.value).then(tbl_siswa => {
                $('#nisn').val(tbl_siswa.nisn);
                // $('#nama_ibu').val(tbl_siswa.nama_ibu);
                // $('#size').val(barang.size);
                // $('#harga').val(barang.harga);
            });
        });

        async function getSiswa(id) {
            let response = await fetch('<?= base_url() ?>/api/surat/' + id)
            let data = await response.json();

            return data;
        }
    </script>


</body>