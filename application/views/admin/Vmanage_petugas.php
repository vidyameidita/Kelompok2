<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fa-duotone fa-warehouse-full"></i>
            </div>
            <div class="sidebar-brand-text mx-1">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/registrasi_admin') ?>">
                <i class="fas fa-wa fa-id-card"></i>
                <span>Registrasi</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/pengaduan') ?>">
                <i class="fas fa-wa fa-book"></i>
                <span>Pengaduan</span></a>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/manage_petugas') ?>">
                <i class="fas fa-wa fa-users"></i>
                <span>Manage Petugas</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/laporan') ?>">
                <i class="fas fa-wa fa-file-invoice"></i>
                <span>Laporan</span></a>
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
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Manage Petugas</h1>
                </div>

                <!-- <script type="text/javascript">window.location.href = </script> -->
                <!-- Content Row -->
                <section class="content">
                	<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data Petugas
                	</button>
                	<table class="table">
                		<tr>
                			<th>NO</th>
                			<th>NAMA PETUGAS</th>
                			<th>USERNAME</th>
                			<th>TELEPON</th>
                			<th>LEVEL</th>
                			<th colspan="2">AKSI</th>
                		</tr>
                		<?php

                		$no = 1;
                		// foreach ($variable as $key => $value) {
                		// 	# code...
                		// }
                		foreach ($manage_petugas as $tgr => $val) {?>
                		<tr>
                			<td><?php echo $no++ ?></td>
                			<td><?php echo $val->nama_petugas ?></td>
                			<td><?php echo $val->username ?></td>
                			<td><?php echo $val->telp_petugas ?></td>
                			<td><?php echo $val->role ?></td>
                			<td onclick="javascript: return confirm('Anda Yakin Hapus? ')"><?php echo anchor('admin/manage_petugas/hapus/'.$val->id_petugas, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                			<td><?php echo anchor('admin/manage_petugas/edit/'.$val->id_petugas, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                		</tr>

                	<?php } ?>
                	</table>
                	
                </section>
                

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Input Petugas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'admin/manage_petugas/tambah_aksi'; ?>">

        	<div class="form-group">
        		<label>NAMA LENGKAP PETUGAS</label>
        		<input type="text" name="nama_petugas" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>USERNAME</label>
        		<input type="text" name="username" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>PASSWORD</label>
        		<input type="text"
        		 name="password" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>TELEPON</label>
        		<input type="text" name="telp_petugas" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>LEVEL</label>
        		<select name="id_role">
					<option value="1">Admin</option>
					<option value="2">User</option>
					<option value="3">Customer Service</option>
					<option value="4">Petugas ODP</option>
					</select>
        		<!-- <input type="text" name="level" class="form-control"> -->
        	</div>

        	<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        	<button type="submit" class="btn btn-primary">Save</button>

        </form>
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