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
include "koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

        $nip = antiinjection($_POST['nip']);
        $nama = antiinjection($_POST['nama']);
        $password_lama			= antiinjection($_POST['pass_lama']);
    		$password_baru			= antiinjection($_POST['pass_baru']);
    		$konfirmasi_password	= antiinjection($_POST['konfirmasi_pass']);

				$salt ='vieyama';
        $hash = md5($salt . $password_lama);
				$hash_baru = md5($salt . $password_baru);

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nip = '$nip' AND password = '$hash'"));
					if ($cek_user > 0) {
						$cek=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengguna WHERE nip = '$nip'"));
								if ($cek['hak_akses'] == 'Admin') {
						       if ($password_baru == $konfirmasi_password) {
	                   mysqli_query($connect, "UPDATE `pengguna` SET
	                     `password`='$hash_baru', `status` = 'Lama' WHERE `nip` = '$nip'");
										 mysqli_query($connect, "UPDATE `pegawai` SET
	                     `nama_pegawai`='$nama' WHERE `nip` = '$nip'");
	                   echo '<script language="javascript">swal("", "Password berhasil dirubah!", "success").then(() => { window.location="dashboard-admin"; });</script>';
	  					       }else{
	                     echo '<script language="javascript">swal("", "Password tidak cocok!", "error").then(() => { window.history.back(); });</script>';
	                   }
								}else{
									if ($password_baru == $konfirmasi_password) {
										mysqli_query($connect, "UPDATE `pengguna` SET
											`password`='$hash_baru', `status` = 'Lama' WHERE `nip` = '$nip'");
										mysqli_query($connect, "UPDATE `pegawai` SET
											`nama_pegawai`='$nama' WHERE `nip` = '$nip'");
										echo '<script language="javascript">swal("", "Password berhasil dirubah!", "success").then(() => { window.location="dashboard-pegawai"; });</script>';
										}else{
											echo '<script language="javascript">swal("", "Password tidak cocok!", "error").then(() => { window.history.back(); });</script>';
										}
								}
					} else {
            echo '<script language="javascript">swal("", "Password tidak ditemukan!", "error").then(() => { window.history.back(); });</script>';
				}
?>
