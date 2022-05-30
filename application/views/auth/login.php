    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
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

                                    <?= $this->session->flashdata('pesan'); ?>

                                    <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="login_email" name="login_email" aria-describedby="emailHelp" placeholder="Alamat Email" value="<?= set_value('login_email'); ?>">
                                            <?= form_error('login_email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="login_password" name="login_password" placeholder="Kata Sandi" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/daftar'); ?>">Daftarkan akun baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>