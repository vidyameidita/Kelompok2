    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h2 class="h2 text-gray-900 mb-4">
                                    SISTEM PENGADUAN MASYARAKAT
                                </h2>
                                <h2 class="h2 text-gray-900 mb-4"><b>KOTA MALANG</b></h2>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftarkan Akun Baru!</h1>
                            </div>
                            <form class="user" method="POST" action="<?= base_url('auth/daftar'); ?>">
                                <?php //echo validation_errors(); 
                                ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan NIK" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select name="jk" id="jk" class="form-control" style="border-radius: 30px; height: 48px; font-size: 13px;" required>
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi" required>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Rumah" value="<?= set_value('alamat'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomor Telepon" value="<?= set_value('telp'); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Silahkan Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>