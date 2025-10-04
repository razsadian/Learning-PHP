<?php 
// setting database
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "login_access";
// setting koneksi
$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "Connection Failed";
    die( "Fatal Error");
}
?>