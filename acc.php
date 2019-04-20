<?php
include('koneksi.php');
include('format-tanggal.php');
$id_pengajuan = $_POST['id_pengajuan'];
$absensi = $_POST['absensi'];
$acc = $_POST['acc'];

$k = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM pengajuan_lembur WHERE id_lembur = '$id_pengajuan'"));
$e = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengguna where nip = '$k[nip]'"));
$email = $e['email'];
//Load Composer's autoloader
require 'vendor/autoload.php';

$result["message"] = "";

if($acc == ""){
  $result["message"] = 'Tidak ada perubahan';
}elseif ($acc == "Tidak") {

  $qy = $connect->query("UPDATE pengajuan_lembur SET arsip = 'Ya' WHERE id_lembur = '$id_pengajuan'");

  $result["message"] = '
  <div class="alert alert-warning alert-dismissable" role="alert">
      <button type="button" class="close" onclick="myFunction()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
      <p class="mb-0">Pengajuan lembur ditolak</p>
  </div>
  ';


      // //Create a new PHPMailer instance
      // $mail = new PHPMailer;
      //     $mail->isSMTP();                                      // Set mailer to use SMTP
      //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
      //     $mail->Username = 'yoviefp@gmail.com';                 // SMTP username
      //     $mail->Password = 'vieyama33';                           // SMTP password
      //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      //     $mail->Port = 587;                                    // TCP port to connect to
      //
      //
      //     //Recipients
      //     $mail->setFrom('yoviefp@gmail.com', 'Administrator');
      //     $mail->addAddress($email);
      //     $mail->Subject = "Pengajuan Lembur";
      //
      //     $mail->isHTML(true);
      //
      //      $mail->Body = "
      //     Hi,<br><br>
      //
      //     Berdasarkan pengajuan lembur yang diajukan pada ".indonesian_date($k['tgl'])." dengan keperluan <b>".$k['keperluan']."</b> ditolak.<br><br>
      //
      //     Manager,<br>";

}else{
  $qy1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM absensi WHERE id_absensi = '$absensi'"));
  $jml = $_POST['wkt'] - $qy1['absen_sore'];
  $uang = $jml * $_POST['uang'];

        //
        // //Create a new PHPMailer instance
        // $mail = new PHPMailer;
        //     $mail->isSMTP();                                      // Set mailer to use SMTP
        //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
        //     $mail->Username = 'yoviefp@gmail.com';                 // SMTP username
        //     $mail->Password = 'vieyama33';                           // SMTP password
        //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        //     $mail->Port = 587;                                    // TCP port to connect to
        //
        //
        //     //Recipients
        //     $mail->setFrom('yoviefp@gmail.com', 'Administrator');
        //     $mail->addAddress($email);
        //     $mail->Subject = "Pengajuan Lembur";
        //
        //     $mail->isHTML(true);
        //
        //      $mail->Body = "
        //     Hi,<br><br>
        //
        //     Berdasarkan pengajuan lembur yang diajukan pada ".indonesian_date($k['tgl'])." dengan keperluan <b>".$k['keperluan']."</b> diterima.<br><br>
        //
        //     Manager,<br>";

  $qy = $connect->query("UPDATE pengajuan_lembur SET arsip = 'Ya' WHERE id_lembur = '$id_pengajuan'");
  $qy2 = $connect->query("UPDATE absensi SET absen_lembur = '$_POST[wkt]', jml_lembur = '$jml', verifikasi_lembur = 'Ya', uang_lembur = '$uang' WHERE id_absensi = '$absensi'");

  $result["message"] = '
  <div class="alert alert-success alert-dismissable" role="alert">
      <button type="button" class="close" onclick="myFunction()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
      <p class="mb-0">Pengajuan lembur disetujui</p>
  </div>
  ';
}

echo json_encode($result);
 ?>
