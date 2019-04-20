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
$nip = antiinjection($_POST['nip']);
$wkt = antiinjection($_POST['waktu']);
$hour = $wkt;
$tgl = antiinjection($_POST['tgl']);

$j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = '1'"));

date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i");
$awalpagi = $j['awalabsen_pagi'];
$akhirpagi = $j['akhirabsen_pagi'];

$awalsore = $j['awalabsen_sore'];
$akhirsore = $j['akhirabsen_sore'];

$awallembur = $j['awalabsen_lembur'];
$akhirlembur = $j['akhirabsen_lembur'];

$sel = $hour - $lembur;
$cek = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM absensi WHERE tgl_absen = '$tgl' AND nip = '$_SESSION[nip]'"));
$id = $cek['id_absensi'];

if (empty($id)) {
	echo '<script language="javascript">swal("Absen gagal!", "Mohon jalankan cron terlebih dahulu", "error").then(() => { window.location="masuk"; });</script>';
}else{
	if($wkt >= $awalpagi && $wkt <= $akhirpagi){

	    mysqli_query($connect, "UPDATE absensi SET absen_pagi = '$wkt', status_pagi = 'H' WHERE id_absensi = '$id'");
	    echo '<script language="javascript">swal("Absen berhasil!", "Data absen pagi tersimpan", "success").then(() => { window.location="masuk"; });</script>';

	}else if($wkt >= $awalsore && $wkt <= $akhirsore){

			mysqli_query($connect, "UPDATE absensi SET absen_sore = '$wkt', status_sore = 'H' WHERE id_absensi = '$id'");
			echo '<script language="javascript">swal("Absen berhasil!", "Data absen sore ", "success").then(() => { window.location="masuk"; });</script>';

		}else if($wkt >= $awallembur && $wkt <= $akhirlembur){

				mysqli_query($connect, "UPDATE absensi SET absen_lembur = '$wkt', status_lembur = 'H' WHERE id_absensi = '$id'");
				echo '<script language="javascript">swal("Absen berhasil!", "Data absen lembur ", "success").then(() => { window.location="masuk"; });</script>';

	}else{
	    echo "<script>alert('Gagal Simpan.');</script>";
	    echo "<meta http-equiv='refresh' content='0; url=media.php?pages=login'>";
		}
	}
}
?>
