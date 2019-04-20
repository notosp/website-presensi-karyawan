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
     $awalpagi = antiinjection($_POST['awal-pagi']);
     $akhirpagi = antiinjection($_POST['akhir-pagi']);
     $awalsore = antiinjection($_POST['awal-sore']);
     $akhirsore = antiinjection($_POST['akhir-sore']);
		 $lembur = antiinjection($_POST['lembur']);
		 $uanglembur = antiinjection($_POST['uang-lembur']);
     // $uangmakan = antiinjection($_POST['uang-makan']);

    $sql = mysqli_query($connect, "UPDATE jam SET
      awalabsen_pagi = '$awalpagi',
      akhirabsen_pagi = '$akhirpagi',
      awalabsen_sore = '$awalsore',
      akhirabsen_sore = '$akhirsore',
      absen_lembur = '$lembur',
			uang_lembur = '$uanglembur'
			WHERE id_jam = '$id'");
      if($sql){
    echo '<script language="javascript">swal("", "Jumlah uang lembur berhasil dirubah!", "success").then(() => { window.location="setting-waktu"; });</script>';
  }else{
    echo '<script language="javascript">swal("", "Jumlah uang lembur gagal dirubah!", "error").then(() => { window.location="setting-waktu"; });</script>';
  }
?>
