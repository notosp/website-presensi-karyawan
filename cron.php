<?php
include "koneksi.php";

$sql = mysqli_query($connect, "SELECT * FROM pegawai");
$userinfo = array();

while($row_user = mysqli_fetch_assoc($sql)){
   $userinfo[] = $row_user;
}

foreach($userinfo as $usrinfo){
   $date = date('Y-m-d');
   $query = "INSERT INTO `absensi`(`nip`, `tgl_absen`) VALUES ('" . $usrinfo['nip'] . "', '$date')";
   $result = mysqli_query($connect, $query) or die(mysqli_error());
}

?>
