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

$nip = antiinjection($_POST['nip']);
$nama = antiinjection($_POST['nama']);
$tmp_lahir = antiinjection($_POST['tmp_lahir']);
$tgl_lahir = antiinjection($_POST['tgl_lahir']);
$jk = antiinjection($_POST['jk']);
$alamat = antiinjection($_POST['alamat']);
$jabatan = antiinjection($_POST['jabatan']);
$salt ='vieyama';
$pass = md5($salt . antiinjection($_POST['nip']));

if($_FILES['foto']['name']!=''){
		$target_dir = "assets/img/avatars/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);
		$fotobaru = $_FILES["foto"]["name"];

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check file size
		if ($_FILES["foto"]["size"] > 2000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar tidak boleh lebih dari 2MB", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar hanya boleh berupa JPG, PNG atau JPEG", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				}
		}

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nip = '$nip'"));
	if ($cek > 0) {
		echo '<script language="javascript">swal("Simpan gagal!", "Data Pegawai Sudah Ada!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
	}else{
		mysqli_query($connect, "INSERT INTO pengguna (nip, password, hak_akses)
			VALUES ('$nip','$pass','Pegawai')");
		mysqli_query($connect, "INSERT INTO pegawai (nip, nama_pegawai, alamat, jk, tmp_lahir, tgl_lahir, foto, jabatan)
			VALUES ('$nip','$nama','$alamat','$jk','$tmp_lahir','$tgl_lahir','$fotobaru','$jabatan')");
		echo '<script language="javascript">swal("Simpan berhasil!", "Data Pegawai tersimpan", "success").then(() => { window.location="kelola-pegawai"; });</script>';
	}
}else{
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nip = '$nip'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Pegawai Sudah Ada!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO pengguna (nip, password, hak_akses)
			VALUES ('$nip','$pass','Pegawai')");
		mysqli_query($connect, "INSERT INTO pegawai (nip, nama_pegawai, alamat, jk, tmp_lahir, tgl_lahir, jabatan)
			VALUES ('$nip','$nama','$alamat','$jk','$tmp_lahir','$tgl_lahir','$jabatan')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Pegawai tersimpan", "success").then(() => { window.location="kelola-pegawai"; });</script>';
	}
}
?>
