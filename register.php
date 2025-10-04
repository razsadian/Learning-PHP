<?php 
include 'service/database.php'; 
// menangkap data yang di kirim dari form
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
// menambahkan data ke database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if($db->query($sql)) {
    echo "your account created successfully";
} else {
    echo "Error";

}


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
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="zora123" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="zoraxxx@gmail.com" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="******" required><br>

        <button type="submit" name="register">Register</button>
    </form>
    <?php include 'layout/footer.html' ?>
</body>
</html>