      <style media="screen">
      @media(max-width: 768px){
        #log{
          padding: 30px;
          overflow: hidden;
        }
        .btn-cuy{
          margin-left: 50px;
        }
      }

      </style>
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="hero bg-white-op-5" id="log">
                  <div class="hero-static col-lg-6 col-xl-4 col-md-6">
                    <div class="py-30 text-center" style="margin-top:40px;">
                        <a class="link-effect font-w700" href="#">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">Bank</span><span class="font-size-xl">Wakaf</span>
                        </a>
                        <h1 class="h4 font-w700 mt-30 mb-10">Selamat datang di Absensi Bank Wakaf</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Silahkan Masukan NIP dan Password anda untuk melakukan Absensi</h2>
                    </div>
                      <div class="content content-full overflow-hidden">

                          <form class="js-validation-signin" method="POST" action="login_proses.php">
                              <div class="block block-themed block-rounded block-shadow">
                                  <div class="block-header bg-gd-dusk">
                                      <h3 class="block-title">Silahkan Masuk</h3>
                                  </div>
                                  <div class="block-content">
                                      <div class="form-group row">
                                          <div class="col-12">
                                              <label for="login-username">Username</label>
                                              <input type="text" class="form-control" id="login-username" name="login-username">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-12">
                                              <label for="login-password">Password</label>
                                              <input type="password" class="form-control" id="login-password" name="login-password">
                                          </div>
                                      </div>
                                      <div class="form-group row mb-0">
                                          <div class="col-sm-12 text-sm-center push">
                                              <button type="submit" name="btn-login" id="btn-login" style="width : 150px" class="btn btn-alt-primary btn-cuy">
                                                  <i class="si si-login mr-10"></i> Masuk
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="block-content bg-body-light">
                                    <div class="form-group text-center">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="masuk">
                                            <i class="fa fa-plus mr-5"></i> Presensi QR Code
                                        </a>

                                    </div>
                                </div>
                              </div>
                          </form>
                          <!-- END Sign In Form -->
                      </div>
                  </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
