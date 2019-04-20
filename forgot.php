<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once "functions.php";
    require_once "koneksi.php";

    if (isset($_POST['email'])) {

        $email = $connect->real_escape_string($_POST['email']);

        $sql = $connect->query("SELECT id_user FROM pengguna WHERE email='$email'");
        if ($sql->num_rows > 0) {

            $token = generateNewString();

	        $connect->query("UPDATE pengguna SET token='$token',
                      tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE email='$email'
            ");


            //Load Composer's autoloader
            require 'vendor/autoload.php';

          //Create a new PHPMailer instance
          $mail = new PHPMailer;
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = 'yoviefp@gmail.com';                 // SMTP username
              $mail->Password = 'vieyama33';                           // SMTP password
              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 587;                                    // TCP port to connect to


              //Recipients
              $mail->setFrom('yoviefp@gmail.com', 'Administrator');
              $mail->addAddress($email);
              $mail->Subject = "Reset Password";

              $mail->isHTML(true);

	             $mail->Body = "
	            Hi,<br><br>

	            In order to reset your password, please click on the link below:<br>
	            <a href='http://localhost/absensi/resetPassword.php?email=$email&token=$token'>Klik disini !!</a><br><br>

              Manager,<br>

	        ";

	        if ($mail->send())
    	        exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
    	    else
    	        exit(json_encode(array("status" => 0, "msg" => $mail->ErrorInfo)));
        } else
            exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Inputs!')));
    }
?>
<div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                              <div class="py-30 text-center" style="margin-top:40px;">
                                  <a class="link-effect font-w700" href="#">
                                      <i class="si si-fire"></i>
                                      <span class="font-size-xl text-primary-dark">Bank</span><span class="font-size-xl">Wakaf</span>
                                  </a>
                                  <h1 class="h4 font-w700 mt-30 mb-10">Selamat datang di Absensi Bank Wakaf</h1>
                                  <h2 class="h5 font-w400 text-muted mb-0">Silahkan Masukan NIP dan Password anda untuk melakukan Absensi</h2>
                              </div>

                                <!-- Reminder Form -->
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-primary">
                                            <h3 class="block-title">Password Reminder</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option">
                                                    <i class="si si-wrench"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="reminder-credential">Username or Email</label>
                                                    <input class="form-control" id="email" placeholder="Your Email Address">
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa fa-asterisk mr-10"></i> Password Reminder
                                                </button>
                                            </div>
                                            <center><p id="response"></p></center>
                                        </div>
                                        <div class="block-content bg-body-light">
                                            <div class="form-group text-center">
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="masuk">
                                                    <i class="fa fa-user text-muted mr-5"></i> Sign In
                                                </a>
                                            </div>
                                        </div>
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
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- END Page Container -->
        <script type="text/javascript">
            var email = $("#email");

            $(document).ready(function () {
                $('.btn-primary').on('click', function () {
                    if (email.val() != "") {
                        email.css('border', '1px solid green');

                        $.ajax({
                           url: 'forgot.php',
                           method: 'POST',
                           dataType: 'json',
                           data: {
                               email: email.val()
                           }, success: function (response) {
                                if (!response.success)
                                    $("#response").html(response.msg).css('color', "red");
                                else
                                    $("#response").html(response.msg).css('color', "green");
                            }
                        });
                    } else
                        email.css('border', '1px solid red');
                });
            });
        </script>
