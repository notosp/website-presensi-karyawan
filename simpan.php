<?php
include('koneksi.php');
date_default_timezone_set("Asia/Jakarta");
$wkt = date("H:i");
$tgl = date("Y-m-d");

$j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = '1'"));
$awalpagi = $j['awalabsen_pagi'];
$akhirpagi = $j['akhirabsen_pagi'];
$awalsore = $j['awalabsen_sore'];
$akhirsore = $j['akhirabsen_sore'];
$awallembur = $j['awalabsen_lembur'];
$akhirlembur = $j['akhirabsen_lembur'];

$pulanglembur = $j['batasjam_lembur'];
$sel = $pulanglembur - $akhirlembur;


if(isset($_POST['send'])){
		$arr= array();

		$cek1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengguna WHERE kode_qrcode = '$_POST[credential]'"));
		$cek = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM absensi WHERE tgl_absen = '$tgl' AND nip = '$cek1[nip]'"));
		$id = $cek['id_absensi'];

		if (empty($id)) {
			$arr['success'] = false;

		}else{
			if($wkt >= $awalpagi && $wkt <= $akhirpagi){
				mysqli_query($connect, "UPDATE absensi SET absen_pagi = '$wkt', status_pagi = 'H' WHERE id_absensi = '$id'");
				$arr['success'] = true;

			}elseif($wkt >= $awalsore && $wkt <= $akhirsore){
				mysqli_query($connect, "UPDATE absensi SET absen_sore = '$wkt', status_sore = 'H' WHERE id_absensi = '$id'");
				$arr['success'] = true;

			}elseif($wkt >= $awallembur && $wkt <= $akhirlembur){
				mysqli_query($connect, "UPDATE absensi SET absen_lembur = '$wkt', status_lembur = 'H' WHERE id_absensi = '$id'");
				$arr['success'] = true;

			}elseif($wkt > $akhirlembur && $wkt <= $pulanglembur){
				$jam = $wkt-$awallembur;
				$uang = $jam*$j['uang_lembur'];
				mysqli_query($connect, "UPDATE absensi SET pulang_lembur = '$wkt',jml_lembur = '$jam', uang_lembur = $uang WHERE id_absensi = '$id'");
				$arr['success'] = true;

			}else{
				$arr['success'] = false;

			}
		}
		echo json_encode($arr);
	}

?>
