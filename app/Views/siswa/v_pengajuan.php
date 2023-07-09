<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<p>Untuk melakukan pengajuan pindah sekolah dari SMP Insan Kamil silahkan klik tombol berikut:</p>

<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Pengajuan Mutasi
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Adapun syarat untuk mutasi/pindah dari SMP INSAN KAMIL sebagai berikut:</p>
                <ul>
                    <li>Melunasi pembayaran sampai bulan berjalan sebelum tanggal 10</li>
                    <li>Surat Keterangan Diterima Dari Sekolah Yang Di Tuju</li>
                    <li>Cetak surat permohonan melalui wali kelas masing masing</li>
                    <li>Klik tombol submit untuk melakukan pengajuan mutasi</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>