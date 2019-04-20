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

$qy = mysqli_query($connect, "DELETE FROM jabatan WHERE id_jabatan = '$id'");
if($qy){
    echo '<script language="javascript">swal("Hapus berhasil!", "Data Jabatan Terhapus!", "success").then(() => { window.history.back(); });</script>';
}else{
		echo '<script language="javascript">swal("Hapus Gagal!", "Data Jabatan Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
}

?>
