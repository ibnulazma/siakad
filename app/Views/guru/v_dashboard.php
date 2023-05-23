<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">
    <div class="col-lg-4">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/' . session()->get('foto')) ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= session()->get('nama') ?></h3>
                <p class="text-muted text-center">(<?= session()->get('username') ?>)
                </p>

                <ul class="list-group list-group-unbordered mb-3">


                    <li class="list-group-item">
                        <?= $guru['telp_guru'] ?></a>
                    </li>
                </ul>
                <a href=" #" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
        </div>
        <div class=" card">
            <div class="card-body box-profile">
                <div id="map" style="width: 400px; height: 400px;"></div>
            </div>



        </div>

    </div>





    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script>
        const map = L.map('map').setView([51.505, -0.09], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>

















    <?= $this->endSection() ?>