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
    $nip_lama = antiinjection($_POST['nip_lama']);
    $nama = antiinjection($_POST['nama']);
    $tmp_lahir = antiinjection($_POST['tmp_lahir']);
    $tgl_lahir = antiinjection($_POST['tgl_lahir']);
    $jk = antiinjection($_POST['jk']);
    $alamat = antiinjection($_POST['alamat']);
    $jabatan = antiinjection($_POST['jabatan']);
    $salt ='vieyama';
    $pass = md5($salt . antiinjection($_POST['nip']));

    if (isset($_POST['ubah_foto'])) {
      if($_FILES['foto']['name']!='')
      {
        $target_dir = "assets/img/avatars/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $fotobaru = $_FILES["foto"]["name"];

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        // gambar 1
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
          echo '<script language="javascript">swal("Simpan gagal!", "File bukan gambar", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
            $uploadOk = 0;
        }

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
      }

        $data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pegawai WHERE nip='$nip_lama'")); 
        if(is_file("assets/img/avatars/".$data['foto']))
        unlink("assets/img/avatars/".$data['foto']);

        mysqli_query($connect, "UPDATE pegawai SET
          nip = '$nip',
          nama_pegawai = '$nama',
          alamat = '$alamat',
          jk = '$jk',
          tmp_lahir = '$tmp_lahir',
          tgl_lahir = '$tgl_lahir',
          foto = '$fotobaru',
          jabatan = '$jabatan' WHERE nip = '$nip_lama'");
        echo '<script language="javascript">swal("Update berhasil!", "Data Pegawai terupdate", "success").then(() => { window.location="kelola-pegawai"; });</script>';

    }else{

      mysqli_query($connect, "UPDATE pegawai SET
        nip = '$nip',
        nama_pegawai = '$nama',
        alamat = '$alamat',
        jk = '$jk',
        tmp_lahir = '$tmp_lahir',
        tgl_lahir = '$tgl_lahir',
        jabatan = '$jabatan' WHERE nip = '$nip_lama'");
      echo '<script language="javascript">swal("Update berhasil!", "Data Pegawai terupdate", "success").then(() => { window.location="kelola-pegawai"; });</script>';

    }
?>
