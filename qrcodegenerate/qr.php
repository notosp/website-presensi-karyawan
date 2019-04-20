<!DOCTYPE html>
<html>
<head>
	<title>qr code</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// session_start();
include("koneksi.php");
include("session.php");

$sql=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengguna WHERE nip='$_SESSION[nip]'"));
// echo $sql['device'] . "<br>";
// echo $_SERVER['HTTP_USER_AGENT'];

$qy_pegawai = mysqli_query($connect, "SELECT * FROM pengguna WHERE nip = '$_SESSION[nip]'");

?>
	<div class="wrapper">
		<div class="container content">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<?php
						$str = 'abcdefghijklmnopqrstuvwxyz1234567891011';
						$shuffled = str_shuffle($str);
						mysqli_query($connect, "UPDATE pengguna SET kode_qrcode = '$shuffled' WHERE nip = '$_SESSION[nip]'");
						?>
					<input type="hidden" class="form-control" id="data" value="<?= $shuffled; ?>" placeholder="Free text for share">

					<center><h3 class="header-h3"><center>Qr Code Absen</h3><center>
						<a class="dropdown-item" href="logout.php">
								<i class="si si-logout mr-5"></i> Sign Out
						</a>
						<input type="hidden" class="form-control" id="hiddendata">
					<div id="hasil"></div>
				</div><!--<div class="col-xs-12 col-md-6">-->
			</div><!--row-->
		</div><!-- container content-->
	</div><!--wrapper-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script type="text/javascript">
	setTimeout(function(){
	   window.location.reload(1);
	}, 15000);


	$( document ).ready(function() {
		if($("#data").val()!=''){
			$('#hiddendata').val($("#data").val());
			var formData = {data:$("#hiddendata").val()};
			getdata(formData);
		}else{
			$("#hiddendata").val('');
			$("#hasil").html('');
		}
});

function getdata(formData){
	$.ajax({
		url : "parameter.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
			$("#hasil").html(data);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('error');
		}
	});
}
</script>
</body>
</html>
