<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<script src="assets/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
		<script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">

			</head>
	<body>

	</body>
</html>

<?php

include('koneksi.php');

function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}


if(empty($_POST['login-username']) && empty($_POST['login-password'])){

	echo '<script language="javascript">swal("Akses ditolak!","","error").then(() => { window.location="masuk"; });</script>';

}else{

	$uname = antiinjection($_POST['login-username']);
	$pass = antiinjection($_POST['login-password']);
  $salt ='vieyama';
  $hash = md5($salt . $pass);

  //------ANTI XSS & SQL INJECTION-------//

  $sql=mysqli_query($connect, "SELECT * FROM pengguna WHERE nip='$uname' AND password='$hash'");
  $r=mysqli_fetch_array($sql);

  $hak = $r['hak_akses'];

  if ($r['nip']==$uname and $r['password']==$hash)
  {
    session_start();
    $_SESSION['nip']=$r['nip'];
    $_SESSION['password']=$r['password'];

			echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-pegawai"; });</script>';

  }else{
		echo '<script language="javascript">swal("Login Gagal!", " Silahkan cek lagi username dan password anda!", "error").then(() => { window.location="masuk"; });</script>';
  }
}

?>
