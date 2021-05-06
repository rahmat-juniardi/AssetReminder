<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>/img/logoBPDNew.png" alt="logo" style="width:30px;">
        </div>
        <div class="sidebar-brand-text mx-3">BPD DIY</div>
    </a>


    <!-- Heading -->
    <div class="sidebar-heading mb-3">
        Reminder Asset
    </div>

    <!-- Menu Users -->
    <li class="nav-item">
        <a class="nav-link" href="/users">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Menu Assets -->
    <li class="nav-item">
        <a class="nav-link" href="/asset">
            <i class="fas fa-fw fa-folder"></i>
            <span>Assets</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- History -->
    <li class="nav-item">
        <a class="nav-link" href="/history" style="text-decoration: underline; text-align: center;"><span>History</span></a>
    </li>

    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->