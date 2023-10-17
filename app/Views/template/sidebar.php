<div class=" row d-flex justify-content-start p-2 ml-2 mt-3 text-sm">
    <a href="" class="mr-3">
        <img src="<?= base_url() ?>/foto/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width:50px">
    </a>
    <div class="nama">
        <h5 class="font-weight-bolder">SIAKAD INKA <br>

            <?php if (session()->get('level') == 'admin') { ?>
                <span style="font-weight: 50;">Administrator</span>

            <?php } else if (session()->get('level') == 'ptk') { ?>
                <span style="font-weight: 50;">PTK</span>
            <?php } else if (session()->get('level') == 'siswa') { ?>
                <span style="font-weight: 50;">Siswa</span>
            <?php } ?>
        </h5>
    </div>
</div>
<hr>
<div class="sidebar">
    <nav class="">
        <?php if (session()->get('level') == 'admin') { ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link <?= $menu == 'admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= $menu == 'setting' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('ta') ?>" class="nav-link <?= $submenu == 'ta' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tahun Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('setting') ?>" class="nav-link <?= $submenu == 'profil' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile Sekolah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('setting/user') ?>" class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item <?= $menu == 'akademik' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'akademik' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Akademik
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url('peserta') ?>" class="nav-link <?= $submenu == 'peserta' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peserta Didik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('guru') ?>" class="nav-link <?= $submenu == 'guru' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PTK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelas') ?>" class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rombongan Belajar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mapel') ?>" class="nav-link <?= $submenu == 'mapel' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('jadwal') ?>" class="nav-link <?= $submenu == 'jadwal' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Pelajaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= $menu == 'nilai' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'nilai' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Penilaian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('nilai/tapel') ?>" class="nav-link <?= $submenu == 'tapel' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setting</p>
                            </a>
                            <a href="<?= base_url('nilai/uts') ?>" class="nav-link <?= $submenu == 'uts' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UTS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('nilai/pas') ?>" class="nav-link <?= $submenu == 'pas' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PAS</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item <?= $menu == 'surat' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'surat' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Administrasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('surat') ?>" class="nav-link <?= $submenu == 'terima' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Penerimaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('surat/mutasi') ?>" class="nav-link <?= $submenu == 'mutasi' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Mutasi</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item <?= $menu == 'ppdb' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'ppdb' ? 'active' : '' ?>">
                        <i class="fa-solid fa-table-list nav-icon"></i>
                        <p>
                            PPDB
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('ppdb') ?>" class="nav-link <?= $submenu == 'ppdb' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formulir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('daftar') ?>" class="nav-link <?= $submenu == 'daftr' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Ulang</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/backup') ?>" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Backup Database

                        </p>
                    </a>
                </li>
            </ul>
        <?php } elseif (session()->get('level') == 'pendidik') { ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= base_url('pendidik') ?>" class="nav-link <?= $menu == 'pendidik' ? 'active' : '' ?>">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pendidik/pengajuan') ?>" class="nav-link <?= $menu == 'pengajuan' ? 'active' : '' ?>">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>
                            Pengajuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('nilai') ?>" class="nav-link <?= $menu == 'nilai' ? 'active' : '' ?>">
                        <i class="fas fa-paper-plane nav-icon"></i>
                        <p>
                            Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link  ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>

        <?php } elseif (session()->get('level') == 'siswa') { ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="<?= base_url('siswa') ?>" class="nav-link <?= $menu == 'siswa' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('siswa/profile') ?>" class="nav-link <?= $menu == 'profile' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('siswa/pengajuan') ?>" class="nav-link <?= $menu == 'pengajuan' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pengajuan

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('siswa/nilai') ?>" class="nav-link <?= $menu == 'nilai' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Penilaian

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link  ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        <?php } ?>
    </nav>
</div>