<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Reset Password</title>

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

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="main-content-boxed">
          <!-- Main Container -->
          <main id="main-container">
              <!-- Page Content -->
              <div class="bg-body-dark bg-pattern" style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
                  <div class="row mx-0 justify-content-center">
                      <div class="hero-static col-lg-6 col-xl-4">
                          <div class="content content-full overflow-hidden">
                            <div class="py-30 text-center" style="margin-top:40px;">

                                <h1 class="h4 font-w700 mt-30 mb-10">Password Baru Anda adalah : </h1>
                            </div>

                              <!-- Reminder Form -->
                              <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.js) -->
                              <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                  <div class="block block-themed block-rounded block-shadow">
                                      <div class="block-header bg-gd-primary">

                                      </div>
                                      <?php
                                        require_once "functions.php";
                                        require_once "koneksi.php";

                                        if (isset($_GET['email']) && isset($_GET['token'])) {

                                          $email = $connect->real_escape_string($_GET['email']);
                                          $token = $connect->real_escape_string($_GET['token']);

                                          $sql = $connect->query("SELECT id_user FROM pengguna WHERE
                                            email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()
                                          ");

                                          if ($sql->num_rows > 0) {
                                            $newPassword = generateNewString();
                                            $newPasswordEncrypted = md5('vieyama'.$newPassword);
                                            $connect->query("UPDATE pengguna SET token='', password = '$newPasswordEncrypted', status='Baru'
                                              WHERE email='$email'
                                            ");
                                            ?>
                                      <div class="block-content">
                                          <div class="form-group row">
                                              <div class="col-12">
                                                  <input type="text" readonly class="form-control" value="<?= $newPassword ?>" id="myInput">
                                              </div>
                                          </div>
                                          <div class="form-group text-center">
                                              <button type="button" class="btn btn-primary" onclick="myFunction()">
                                                  <i class="fa fa-copy mr-10"></i> Copy text
                                              </button>
                                          </div>
                                      </div>
                                      <div class="block-content bg-body-light">
                                          <div class="form-group text-center">
                                              <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="masuk">
                                                  <i class="fa fa-user text-muted mr-5"></i> Sign In
                                              </a>
                                          </div>
                                      </div>
                                      <?php
                                    } else
                                      redirectToLoginPage();
                                  } else {
                                    redirectToLoginPage();
                                  }
                                ?>
                                  </div>
                              <!-- END Reminder Form -->
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END Page Content -->
          </main>
          <!-- END Main Container -->
        </div>



        <!-- END Page Container -->
        <script>
        function myFunction() {
          var copyText = document.getElementById("myInput");
          copyText.select();
          document.execCommand("copy");
          alert("Copied the text: " + copyText.value);
        }
        </script>
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/op_auth_signin.js"></script>
    </body>
</html>
