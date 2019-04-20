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
// include('session.php');

function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}

$id = antiinjection($_POST['id']);
$nama = antiinjection($_POST['nama']);

$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM jabatan WHERE id_jabatan = '$id'"));

if ($cek > 0) {
  echo '<script language="javascript">swal("Simpan gagal!", "Data jabatan sudah ada!", "warning").then(() => { window.history.back(); });</script>';
}else{
  mysqli_query($connect, "INSERT INTO jabatan (id_jabatan, nama_jabatan)
  VALUES ('$id','$nama')");
  echo '<script language="javascript">swal("Simpan berhasil!", "Data jabatan tersimpan", "success").then(() => { window.history.back(); });</script>';
}
?>
