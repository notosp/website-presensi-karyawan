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

$id = antiinjection($_GET['nip']);


$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pegawai WHERE nip='$id'"));

if(is_file("assets/img/avatars/".$data['foto']))
	 unlink("assets/img/avatars/".$data['foto']);

	 $qy = mysqli_query($connect, "DELETE FROM pegawai WHERE nip = '$id'");
	 $qy1 = mysqli_query($connect, "DELETE FROM pengguna WHERE nip = '$id'");
			if($qy AND $qy1){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data Pegawai Terhapus!", "success").then(() => { window.history.back(); });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data Pegawai Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
