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

				$id = antiinjection($_POST['id']);
				$statuspagi = antiinjection($_POST['status_pagi']);
				$statussore = antiinjection($_POST['status_sore']);
				$sore = antiinjection($_POST['sore']);
				$pagi = antiinjection($_POST['pagi']);
				$lembur = antiinjection($_POST['lembur']);
        $uang = antiinjection($_POST['uang']);

				date_default_timezone_set("Asia/Jakarta");
				$jam = date("H:i");

				$sel = $sore - $lembur;
				$total=$sel*$uang;

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM absensi WHERE id_absensi = '$id'"));
					if ($cek_user > 0) {
						mysqli_query($connect, "UPDATE `absensi` SET absen_pagi = '$pagi', absen_sore = '$sore', status_pagi = '$statuspagi', status_sore = '$statussore', absen_lembur = '$lembur', jml_lembur = '$sel', uang_lembur = '$total' WHERE `id_absensi` = '$id'");
						echo '<script language="javascript">swal("", "Absensi berhasil dirubah!", "success").then(() => { window.location="kelola-absensi"; });</script>';
					} else {
						echo '<script language="javascript">swal("", "Absensi tidak ditemukan!", "error").then(() => { window.history.back(); });</script>';
				}
?>
