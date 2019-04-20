<?php
//fetch.php
include('koneksi.php');
include('format-tgl.php');
$columns = array('nip', 'nama_pegawai', 'tgl_absen', 'absen_lembur', 'jml_lembur');

$query = "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND ";

$j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = 1"));

if(isset($_POST["search"]["value"]))
{
 $query .= 'month(absensi.tgl_absen) = "'.$_POST["bulan"].'" AND ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY id_absensi DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();
$no = 1;
while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $no;
 $sub_array[] = $row["nip"];
 $sub_array[] = indonesian_date($row["tgl_absen"]);
 $sub_array[] = $row["nama_pegawai"];
 if($row['absen_pagi'] == ''){
 $sub_array[] = '-';
 }else{
 $sub_array[] = $row["absen_pagi"].' WIB';
 }
 $sub_array[] = $row["status_pagi"];
 if($row['absen_sore'] == ''){
 $sub_array[] = '-';
 }else{
 $sub_array[] = $row["absen_sore"].' WIB';
 }
 $sub_array[] = $row["status_sore"];
 $sub_array[] = $row["absen_lembur"];

 if($row['jml_lembur'] == ''){
 $sub_array[] = '-';
 }else{
 $sub_array[] = $row["jml_lembur"].' Jam';
 }

 if($row['jml_lembur'] == ''){
 $sub_array[] = '-';
 }else{
 $sub_array[] = "Rp".number_format($row["jml_lembur"] * $j['uang_lembur']).",-";
 }

  $sub_array[] = '<form class="" action="edit-absensi" method="post">
   <input type="hidden" name="id" value="'. $row["id_absensi"] .'">
   <button type="submit" class="btn btn-rounded btn-secondary" data-toggle="tooltip" title="Edit">
     <i class="si si-note"></i>
   </button>
 </form>';
 $sub_array[] .= "<a class='btn btn-rounded btn-alt-primary' href='hapus-absensi.php?id=". $row["id_absensi"] ."'><i class='si si-trash mr-5'></i>Hapus</a>";
 $data[] = $sub_array;



 $no ++;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
