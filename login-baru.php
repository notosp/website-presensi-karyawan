
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">


        <style type="text/css">

        #v{
            width:100%;
            height:100%;
        }
        #qr-canvas{
            display:none;
        }

        #result{
            border: solid #0101;
        	border-width: 1px 1px 1px 1px;
        	padding:20px;
        	width:100%;
        }
        </style>

<script type="text/javascript" src="llqrcode.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="webqr.js"></script>

</head>

<body>
  <div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-dark bg-pattern" style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
            <div class="row mx-0 justify-content-center">
                <div class="hero-static col-lg-6 col-xl-4">
                    <div class="content content-full overflow-hidden">
                        <!-- Header -->
                        <div class="py-30 text-center">
                            <a class="link-effect font-w700" href="index.html">
                                <i class="si si-fire"></i>
                                <span class="font-size-xl text-primary-dark">Bank</span><span class="font-size-xl">Wakaf</span>
                            </a>
                            <h1 class="h4 font-w700 mt-30 mb-10">Selamat datang di Presensi Bank Wakaf</h1>
                            <h2 class="h5 font-w400 text-muted mb-0">Silahkan dekatkan QR Code Anda pada Webcam untuk melakukan Absensi</h2>
                        </div>
                        <form class="js-validation-signin" action="be_pages_auth_all.html" method="post">
                            <div class="block block-themed block-rounded block-shadow">
                                <div class="block-header bg-gd-dusk">
                                    <h3 class="block-title">Silahkan Presensi</h3>
                                </div>
                                <div class="block-content">
                                    <div id="mainbody">
                                      <table class="tsel" border="0">
                                      <tr>
                                        <td><img class="selector" id="webcamimg"/></td>
                                        <td><img class="selector" id="qrimg" onclick="setimg()"></td></tr>
                                      <tr>
                                        <td colspan="2" align="center">
                                          <div id="outdiv"></div>
                                       </td>
                                     </tr>
                                    </table>
                                    <br>
                                      <form class="" action="simpan.php" method="post">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-username">NIP</label>
                                                <div id="result"></div>
                                            </div>
                                        </div>
                                    </div>

                                    </form>
                                </div>
                                <center><p id="response"></p></center>


                                <div class="block-content bg-body-light">
                                    <div class="form-group text-center">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login">
                                            <i class="fa fa-plus mr-5"></i> Masuk Akun
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
  </div>
  <!-- Codebase Core JS -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/core/jquery.slimscroll.min.js"></script>
  <script src="assets/js/core/jquery.scrollLock.min.js"></script>
  <script src="assets/js/core/jquery.appear.min.js"></script>
  <script src="assets/js/core/jquery.countTo.min.js"></script>
  <script src="assets/js/core/js.cookie.min.js"></script>
  <script src="assets/js/codebase.js"></script>
  <script src="assets/js/pages/op_auth_signin.js"></script>

  <canvas id="qr-canvas"></canvas>
  <script type="text/javascript">load();</script>
</body>
</html>
