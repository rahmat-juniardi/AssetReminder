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

<div class="d-flex flex-column mx-auto col-lg-6 p-5">
    <div class="h2 mx-auto text-primary mb-4 border-primary" style="border-bottom: 3px solid;">EDIT DATA</div>
    <div class="w-100">
        <form action="/home/update/<?= $aset['id']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="" class="form-label">No Kontrak</label>
                <input type="hidden" name="no_kontrak" value="<?= $aset['no_kontrak']; ?>">
                <input type="text" class="form-control" id="" value="<?= $aset['no_kontrak']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Kegiatan</label>
                <input type="text" class="form-control" id="" name="jenis_aset" value="<?= $aset['jenis_aset']; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="" name="lokasi" value="<?= $aset['lokasi']; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="" name="tanggal_mulai" value="<?= date_format(date_create($aset['tanggal_mulai']), "Y-m-d"); ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal berakhir</label>
                <input type="date" class="form-control" id="" name="tanggal_berakhir" value="<?= date_format(date_create($aset['tanggal_berakhir']), "Y-m-d"); ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Saldo</label>
                <input type="number" class="form-control" id="" name="saldo" value="<?= $aset['saldo']; ?>">
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary ml-auto px-4">Edit</button>
            </div>
        </form>
    </div>
</div>
<!-- End of Main Content -->


<?= $this->endSection(); ?>