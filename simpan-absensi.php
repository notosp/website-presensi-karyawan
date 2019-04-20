<?php
include ('koneksi.php');


function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$nip = antiinjection($_POST['nip']);
$waktu = antiinjection($_POST['waktu']);
$tgl = antiinjection($_POST['tgl']);
$tgl = antiinjection($_POST['tgl']);
$id = antiinjection($_POST['id']);
date_default_timezone_set("Asia/Jakarta");

$awalpagi  ='06:00:00am';
$akhirpagi ='08:00:00am';

$awalsore  ='03:00:00pm';
$akhirsore ='12:00:00pm';
$lembur    ='10:00:00pm';

if ($waktu >= $awalpagi && $waktu <= $akhirpagi) {
  echo "siang";

}elseif ($waktu >= $awalsore && $waktu <= $akhirsore) {
  if ($waktu >= $lembur) {
    echo "lembur";

  }else {
    echo "biasa sore";
  }
}else {
  echo "salah";
}
 ?>
