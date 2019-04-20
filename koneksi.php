<?php
$database_username = 'root';
$database_password = '';
$pdo_conn = new PDO( 'mysql:host=localhost;dbname=absensi', $database_username, $database_password );

$hostname = "localhost";
$username = "root";
$password = "";
$database = "absensi";

$connect = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
