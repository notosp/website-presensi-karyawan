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

				$id_baru = antiinjection($_POST['id']);
        $id = antiinjection($_POST['id_lama']);
        $nama = antiinjection($_POST['nama']);

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM jabatan WHERE id_jabatan = '$id'"));
					if ($cek_user > 0) {
						mysqli_query($connect, "UPDATE `jabatan` SET `id_jabatan` = '$id_baru', `nama_jabatan` = '$nama' WHERE `id_jabatan` = '$id'");
						echo '<script language="javascript">swal("", "Jabatan berhasil dirubah!", "success").then(() => { window.location="kelola-jabatan"; });</script>';
					} else {
						echo '<script language="javascript">swal("", "Jabatan tidak ditemukan!", "error").then(() => { window.history.back(); });</script>';
				}
?>
