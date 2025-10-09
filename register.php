<?php 
include 'service/database.php'; 
session_start();
$error = "";

$register_message = "";

if(isset($_SESSION ["is_login"])) { // memvalidasi session jika user sudah login memblok ke register/login
    header("location: dashboard.php");
}
// menangkap data yang di kirim dari form
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $has_password = hash("sha256", $password); // enkripsi password menggunakan sha256
}
if(empty($username && $password)) { //validasi jika user mengisi form kosong
    echo $error = "Username is required";
} else {
// memvalidasi apakah data duplikat?
try {
// menambahkan data ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$has_password')";
    if($db->query($sql)) {
    $register_message = "Register Successful";
    }else {
    $register_message = "Register Failed";
    }
} catch (mysqli_sql_exception) { //parameter exception untuk menangkap error
    $register_message = "Duplicate Username, Please use another username";
}$db->close(); // menutup koneksi database
} 








?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'layout/header.html' ?>
    <h1>Register Page</h1>
    <i><?= $register_message ?></i>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="zora123" ><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="******" ><br>

        <button type="submit" name="register">Register</button>
    </form>
    <?php include 'layout/footer.html' ?>
</body>
</html>