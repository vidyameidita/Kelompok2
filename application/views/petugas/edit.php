<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fa-duotone fa-warehouse-full"></i>
            </div>
            <div class="sidebar-brand-text mx-1">PETUGAS</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('petugas/dashboard_petugas') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('petugas/pengaduan_petugas') ?>">
                <i class="fas fa-wa fa-book"></i>
                <span>Pengaduan</span></a>


        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('petugas/respon_petugas') ?>">
                <i class="fas fa-wa fa-file-invoice"></i>
                <span>Respon</span></a>
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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

<div class="modal-body">
	<section class="content">
		<?php foreach($pengaduan_petugas as $val) { ?>
		<form action="<?php echo base_url(). 'petugas/pengaduan_petugas/update/'.$val->id_tiket; ?>"
			method="post">

			<div class="form-group">
                <label>NIK</label>
                <input type="text" name="id_user" class="form-control" readonly value="<?php echo $val->id_user ?>" >
            </div>

            <div class="form-group">
                <label>Jenis Pengaduan</label>
                <select name="id_jenis_pengaduan" class="form-control" readonly value="<?php echo $val->$id_jenis_pengaduan ?>">
                    <option value="101">Pelanggaran</option>
                    <option value="102">Perizinan</option>
                    <option value="103">Kritik</option>
                    <option value="104">Saran</option>
                    <option value="105">Pengaduan</option>
                    <option value="106">Pertanyaan</option>
                    </select>
            </div>


            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="text" name="tgl_tiket" class="form-control" readonly
                value="<?php echo $val->tgl_tiket ?>">
            </div>


            <div class="form-group">
                <label>Status</label>
                <select name="id_status" class="form-control" value="<?php echo $val->$id_status ?>">
                    <option value="1">Proses</option>
                    <option value="2">Diterima</option>
                    <option value="3">Ditolak</option>
                    </select>
            </div>

            <div class="form-group">
                <label>Isian Laporan</label>
                <input type="text" name="isian_laporan" class="form-control" readonly
                value="<?php echo $val->isian_laporan ?>">
            </div>

			<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        	<button type="submit" class="btn btn-primary">Save</button>
			
		</form>
	<?php } ?>
	</section>
</div>

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
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>