<?php
global $conn;

$user_name = "root";
$password = "";
$database = "test";
$server = "localhost";
$conn = mysql_connect($server, $user_name, $password);
mysql_select_db($database);
$_SESSION['connectionVariable']=$conn;

?>