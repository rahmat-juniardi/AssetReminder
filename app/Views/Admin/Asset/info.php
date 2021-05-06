<?= $this->extend('Templates/Admin/index'); ?>

<?= $this->section('content'); ?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-danger">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">Aset X mendekati waktu jatuh tempo.</span>
                    </div>
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Vin.S</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Main Content -->
<div class="d-flex justify-content-center align-items-center h-75">
    <div class="card w-75">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title font-weight-bold"><?= $aset['no_kontrak']; ?></h5>
            <table class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Jenis Aset</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Sisa Waktu</th>
                        <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><?= $aset['jenis_aset']; ?></th>
                        <th><?= $aset['lokasi']; ?></th>
                        <th><?= date_format(date_create($aset['tanggal_mulai']), "d-M-Y"); ?></th>
                        <th><?= date_format(date_create($aset['tanggal_berakhir']), "d-M-Y"); ?></th>
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $tgl_1 = date($aset['tanggal_mulai']);
                        $tgl_2 = date($aset['tanggal_berakhir']);

                        $selisih =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%Y%");
                        $selisih2 =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%m%");
                        $selisih3 =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%d%");
                        $hari = date_diff(date_create($tgl_1), date_create($tgl_2));
                        $hari->format("%a");
                        ?>
                        <th><?php
                            if ($selisih != 0) {
                                echo $selisih . ' Tahun ';
                            }
                            if ($selisih2 != 0) {
                                echo $selisih2 . ' Bulan ';
                            }
                            echo $selisih3 . ' Hari'; ?></th>
                        <?php $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY); ?>
                        <th><?= $fmt->formatCurrency($aset['saldo'], 'Rp. '); ?></th>
                    </tr>
            </table>
            <div class="p text-muted ml-auto">Last update <?= date_format(date_create($aset['updated_at']), "d-M-Y | g:i A"); ?></div>
        </div>
    </div>
</div>

<div class="h5"><a href="/asset" class="p-4">kembali</a></div>

<!-- End of Main Content -->

<?= $this->endSection(); ?>