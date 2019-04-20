<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Absensi Online</title>
    <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/js/jquery-clockpicker.min.css">
</head>

</style>
  <div id="page-container" class="main-content-boxed">
      <!-- Main Container -->
      <main id="main-container">
          <!-- Page Content -->
          <div class="hero bg-white-op-5" id="log">
            <div class="hero-static col-lg-6 col-xl-4 col-md-6">
                <div class="content content-full overflow-hidden">

                    <form class="js-validation-signin" method="POST" action="login-proses.php">
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
