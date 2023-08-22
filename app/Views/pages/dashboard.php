<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center bg-gradient-primary" href="/dashboard">
            <div class="sidebar-brand-icon rotate-n-0">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?= $USERNAME; ?></div>
        </a>
        <span class="text-center bg-warning text-dark"><?= $STATUS_USER; ?>&nbsp;</span>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link text-center" href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span style="font-size: 1rem;">
                    Dashboard
                </span></a>

        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <div class="sidebar-heading">
            Menu <!-- visible only for admin -->
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-database "></i>
                <span>Employee Management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">SubMenu</h6>
                    <a class="collapse-item" href="/employee">
                        <i class="fas fa-fw fa-user"></i>
                        <span>employee</span></a>
                    <a class="collapse-item" href="/payroll">
                        <i class="fas fa-fw fa-money-check"></i>
                        <span>Payroll</span></a>
                    <a class="collapse-item" href="/attendance">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Attendance</span></a>
                    <a class="collapse-item" href="/sppd">
                        <i class="fas fa-fw fa-list"></i>
                        <span>SPPD</span></a>
                </div>
            </div>
        </li>
        <!-- Nav Item - User Management -->
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="fas fa-fw fa-user"></i>
                <span>User Management</span></a>
        </li>
        <?php if ($STATUS_USER === 'admin') { ?>
            <!-- Nav Item - Activity Log -->
            <li class="nav-item">
                <a class="nav-link" href="/log">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Activity Log</span></a>
            </li>
        <?php } ?>


        <!-- Nav Item - payroll -->
        <li class="nav-item">

        </li>

        <!-- Nav Item - SPPD -->
        <li class="nav-item">

        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top bg-gradient-primary">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">2</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Notification
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2020</div>
                                    <span class="font-weight-bold">Your custom notification</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2020</div>
                                    Your Account was just signed in to from a new device!
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="">Show All Notifications</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-light"><?= $NAMA_USER; ?></span>
                            <img class="img-profile rounded-circle" src="<?php echo base_url('assets/user.png');
                                                                            ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Edit Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- edit content start here-->

            <div class="container-fluid">

                <?= $this->renderSection('content'); ?>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. Copyright &copy; Your Website <?php echo date("Y"); ?></p>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
    </div>


</div>
</div>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url('/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/js/jquery.min.js');
                ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');
                ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/js/jquery.easing.min.js');
                ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js');
                ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/js/Chart.min.js');
                ?>"></script>


<?= $this->endSection('content'); ?>