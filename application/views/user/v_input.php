<?php
date_default_timezone_set("Asia/Jakarta");
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fa-duotone fa-warehouse-full"></i>
            </div>
            <div class="sidebar-brand-text mx-1">Masyarakat</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('user') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('user/tulis_laporan') ?>">
                <i class="fas fa-fw fa-pen-alt"></i>
                <span>Tulis Laporan</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('user/daftar_laporan') ?>">
                <i class="fas fa-wa fa-id-card"></i>
                <span>Daftar Laporan</span></a>
        </li>




        <!-- Nav Item - Utilities Collapse Menu -->
        

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

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                            <img class="img-profile rounded-circle" src="https://lisa.infomedia.co.id/digitallearning/uploads/secure/reserv/user.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
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
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tulis Laporan Anda</h1>
                </div>

                
                <?php
                //generate random integer
                $no_tiket = rand(100000, 999999);
                ?>

                <!-- Content Row -->
                <div class="modal-body">
                    <form action="<?php echo base_url().'user/tambah_laporan'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label">No. Tiket</label>
                            <input type="text" name="no_tiket" class="form-control" value="<?php echo $no_tiket; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Jenis Laporan : </label>
                            <select name="id_jenis_pengaduan" class="form-control" required>
                                <option value="" selected>--Pilih--</option>
                                <option value="1">Pelanggaran</option>
                                <option value="2">Perizinan</option>
                                <option value="3">Kritik</option>
                                <option value="4">Saran</option>
                                <option value="5">Pengaduan</option>
                                <option value="6">Pertanyaan</option>
                            </select>
                        </div>

                        <div class="form-group"> 
                            <label>Lokasi :</label>
                            <input type="text" name="lokasi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pembuatan Tiket : </label>
                            <input type="text" class="form-control" name="tgl_tiket" value="<?php echo date("d - m - Y"); ?>" readonly>
                        </div>

                        <div class="form-group" required>
                            <label>Isian Laporan : </label>
                            <textarea class="form-control" name="isian_laporan"></textarea>
                        </div>

                        <div class="form-group" required>
                            <label>Upload Foto : </label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Tambah Laporan" class="btn btn-success">
                        </div>
                    </form>

                </div>
                    
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bengkel TI 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Logout jika ingin keluar dari aplikasi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-primary" href="<?php echo base_url().'auth/logout'; ?>">Logout</a>
            </div>
        </div>
    </div>
</div>