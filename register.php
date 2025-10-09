<?php 
include 'service/database.php'; 

$register_message = "";
// menangkap data yang di kirim dari form
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
// menambahkan data ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if($db->query($sql)) {
    $register_message = "Register Successful";
}
} else {
    $register_message = "Register Failed";

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
        <input type="text" id="username" name="username" placeholder="zora123" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="******" required><br>

        <button type="submit" name="register">Register</button>
    </form>
    <?php include 'layout/footer.html' ?>
</body>
</html>