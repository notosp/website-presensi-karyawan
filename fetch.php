<?php
//fetch.php
include('koneksi.php');
include('format-tgl.php');
$columns = array('nip', 'nama_pegawai', 'tgl_absen', 'absen_pagi', 'status_pagi', 'absen_sore', 'status_sore', 'absen_lembur', 'jml_lembur');

$query = "SELECT * FROM absensi, pegawai WHERE absensi.nip = pegawai.nip AND ";

$j = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jam WHERE id_jam = 1"));

if($_POST["is_date_search"] == "yes")
{
 $query .= 'absensi.tgl_absen BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (absensi.nip LIKE "%'.$_POST["search"]["value"].'%"
  OR pegawai.nama_pegawai LIKE "%'.$_POST["search"]["value"].'%"
  OR absensi.absen_pagi LIKE "%'.$_POST["search"]["value"].'%"
  OR absensi.absen_sore LIKE "%'.$_POST["search"]["value"].'%")
 ';
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
 $sub_array[] = $row["tgl_absen"];
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
  <button type="submit" class="btn btn-rounded btn-warning" style="width:100px" data-toggle="tooltip" title="Edit">
    <i class="si si-note"> Edit</i>
  </button><br/>
</form>'.'<a class="btn btn-rounded btn-alt-primary" style="width:100px" href="hapus-absensi.php?id='. $row["id_absensi"] .'"><i class="si si-trash mr-5"></i>Hapus</a>';
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
