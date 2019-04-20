<?php
$data = base64_encode($_POST['data']);
echo '<center><img src="http://'.$_SERVER['SERVER_NAME'].'/qrcodegenerate/data.php?data='.$data.'" /></center>'; 
?>
