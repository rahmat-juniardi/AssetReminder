<?= $this->extend('Templates/Admin/index'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div id="content">

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

    <!-- Begin Page Content -->

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="d-flex p-5">
        <a href="/asset/add" class="ml-auto"><button class="btn btn-primary">Tambah</button></a>
    </div>
    <div class="container-fluid d-flex justify-content-center pt-3 pb-5">

        <table id="table_id" class="display table table-striped table-bordered table-hover my-4">
            <thead class="bg-primary text-light">
                <tr>
                    <th>NO</th>
                    <th>No Kontrak</th>
                    <th>Jenis Kegiatan</th>
                    <th>Lokasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Sisa Waktu</th>
                    <th class="tindakan">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($aset as $a) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['no_kontrak']; ?></td>
                        <td><?= $a['jenis_aset']; ?></td>
                        <td><?= $a['lokasi']; ?></td>
                        <td><?= date_format(date_create($a['tanggal_mulai']), "d-M-Y"); ?></td>
                        <td><?= date_format(date_create($a['tanggal_berakhir']), "d-M-Y"); ?></td>
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $tgl_1 = date($a['tanggal_mulai']);
                        $tgl_2 = date($a['tanggal_berakhir']);

                        $selisih =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%Y%");
                        $selisih2 =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%m%");
                        $selisih3 =  date_diff(date_create($tgl_2), date_create($tgl_1))->format("%d%");
                        $hari = date_diff(date_create($tgl_1), date_create($tgl_2));
                        $hari->format("%a");
                        ?>
                        <td class="text-white <?= ($hari->format("%a") < 30) ? "text-danger" : "text-success"; ?>">
                            <?php
                            if ($selisih != 0) {
                                echo $selisih . ' Tahun ';
                            }
                            if ($selisih2 != 0) {
                                echo $selisih2 . ' Bulan ';
                            }
                            echo $selisih3 . ' Hari'; ?>
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="/asset/<?= $a['id']; ?>" class="btn btn-primary">Info</a>
                            <a href="/asset/edit/<?= $a['id']; ?>" class="btn btn-warning mx-2"><i class="fas fa-edit"></i></a>
                            <form action="/asset//<?= $a['id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "scrollX": true,
            "columnDefs": [{
                "targets": 'tindakan',
                "orderable": false,
            }]
        });

    });
</script>

<?= $this->endSection(); ?>