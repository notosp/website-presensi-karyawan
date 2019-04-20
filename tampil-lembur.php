<?php
$qy_lembur = $connect->query("SELECT * FROM pengajuan_lembur, pegawai WHERE pengajuan_lembur.nip = pegawai.nip");
$result = array();
while ($fetchData = $qy_lembur->fetch_assoc()) {
  $result[] = $fetchData;
}
echo json_encode($result);
 ?>
