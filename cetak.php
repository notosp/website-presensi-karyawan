<?php

 /* include autoloader */

include('koneksi.php');
include('format-tgl.php');
require_once 'dompdf/autoload.inc.php';


 /* reference the Dompdf namespace */

use Dompdf\Dompdf;

 /* instantiate and use the dompdf class */

$dompdf = new Dompdf();

$atas = $_POST['atas'];
$bawah = $_POST['bawah'];
$j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = '1'"));
$qy = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND absensi.tgl_absen BETWEEN '$atas' AND '$bawah' ORDER BY absensi.id_absensi");
$qy1 = mysqli_query($connect, "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND absensi.absen_lembur != '' AND absensi.tgl_absen BETWEEN '$atas' AND '$bawah' ORDER BY absensi.id_absensi DESC");

$html = '
<!DOCTYPE html>
<html>
<head>
<style>
body{
  height:80%;
}
table {
    border-collapse: collapse;
}

table, th, td {
		padding : 7px;
    border: 1px solid black;
		text-align:center;
}
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3 class="mt-30" align="center">LAPORAN ABSENSI BANK WAKAF<br>KARANGSUCI - PURWOKERTO<br><span>Jl. Letjend Pol Soemarto, Purwanegara, Purwokerto Utara</span></h3>
      <p align="center">__________________________________________________________________________________________________________________________________</p>

			<center>
			<h4>Laporan Absensi tanggal '.indonesian_date($atas).' sampai tanggal '.indonesian_date($bawah).'</h4>
      <table>
       <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">NIP</th>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Absen Pagi</th>
          <th class="text-center">Status Absen Pagi</th>
          <th class="text-center">Absen Sore</th>
          <th class="text-center">Status Absen Sore</th>
          <th class="text-center">Absen Lembur</th>
          <th class="text-center">Jumlah Lembur</th>
        </tr>
       </thead>
       <tbody>
       ';
       $no = 1;
       while ($a = mysqli_fetch_array($qy)) {

$html .= '<tr>
           <td>'. $no .'</td>
           <td>'. $a['nip'] .'</td>
           <td>'. $a['nama_pegawai'] .'</td>
           <td>'. indonesian_date($a['tgl_absen']) .'</td>';
           if($a['absen_pagi'] == ''){
$html .=  '<td> - </td>'; }else{
$html .=  '<td>'. $a['absen_pagi'] .'</td>'; }
$html .=  '<td>'. $a['status_pagi'] .'</td>';
           if($a['absen_sore'] == ''){
$html .=  '<td> - </td>'; }else{
$html .=  '<td>'. $a['absen_sore'] .'</td>'; }
$html .=  '<td>'. $a['status_sore'] .'</td>';
           if($a['absen_lembur'] == ''){
$html .=  '<td> - </td>'; }else{
$html .=  '<td>'. $a['absen_lembur'] .'</td>'; }
           if($a['jml_lembur'] == ''){
$html .=  '<td> - </td>'; }else{
$html .=  '<td>'. $a['jml_lembur'] .'</td>'; }
$html .=  '</tr>';
      $no++; }
$html .= '</tbody>
      </table>
      <br>
      <br>
      <h2>Laporan Data Lembur</h2>
      <table>
      <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">NIP</th>
         <th class="text-center">Tanggal</th>
         <th class="text-center">Nama</th>
         <th class="text-center">Absen Lembur</th>
         <th class="text-center">Jumlah Lembur</th>
         <th class="text-center">Uang Lembur</th>
       </tr>
      </thead>
      <tbody>
      ';
      $no = 1;
      while ($a1 = mysqli_fetch_array($qy1)) {

      $html .= '<tr>
                <td>'. $no .'</td>
                <td>'. $a1['nip'] .'</td>
                <td>'. $a1['nama_pegawai'] .'</td>
                <td>'. indonesian_date($a1['tgl_absen']) .'</td>';
                if($a1['absen_lembur'] == ''){
      $html .=  '<td> - </td>'; }else{
      $html .=  '<td>'. $a1['absen_lembur'] .'</td>'; }
                if($a1['jml_lembur'] == ''){
      $html .=  '<td> - </td>'; }else{
      $html .=  '<td>'. $a1['jml_lembur'] .'</td>'; }
      $html .=  '<td>Rp'. number_format($j['uang_lembur'] * $a1['jml_lembur']) .',-</td>';
      $html .=  '</tr>';
     $no++; }
     $html .= '</tbody>
           </table>
			</center>
    </div>
  </div>
</div>
</body>
</html>';

// echo $html;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');


/* Render the HTML as PDF */

$dompdf->render();


/* Output the generated PDF to Browser */

 $dompdf->stream("Laporan-absensi-tgl-".indonesian_date($atas)."-".indonesian_date($bawah).".pdf");

 ?>
