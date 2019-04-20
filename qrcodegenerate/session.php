<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<script src="assets/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
		<script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">
	</head>
</html>
<?php
session_start();
if(empty($_SESSION['nip'])) {
	echo '<script language="javascript">swal("Akses ditolak!","","error").then(() => { window.location="index.php"; });</script>';
	exit;
}
?>
