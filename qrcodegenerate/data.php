<?php
$data = $_GET['data'];
include('phpqrcode/qrlib.php'); 
$codeContents = base64_decode($data); 
QRcode::png($codeContents, false, QR_ECLEVEL_L, 10); 
?>