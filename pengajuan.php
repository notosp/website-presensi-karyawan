<?php
include('koneksi.php');
$kepentingan = $_POST['kepentingan'];
$nip = $_POST['nip'];
$tgl = $_POST['tgl'];
$waktu = $_POST['waktu'];
$absen = $_POST['absen'];

$result["message"] = "";

if ($kepentingan == "") {
  $result["message"] = '
  <div class="alert alert-success alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Warning</h3>
      <p class="mb-0">Kepentingan harus diisi!</p>
  </div>
  ';
}else{

  $qy = $connect->query("INSERT into pengajuan_lembur VALUES (null, '$nip','$kepentingan','$waktu','$tgl','$absen','Tidak')");

  $result["message"] = '
  <div class="alert alert-success alert-dismissable" role="alert">
      <button type="button" class="close" onclick="myFunction()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
      <p class="mb-0">Pengajuan lembur terkirim</p>
  </div>
  ';
}

echo json_encode($result);
 ?>
