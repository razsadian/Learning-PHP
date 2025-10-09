<?php 
include 'service/database.php';
session_start();

$login_message = "";

if(isset($_SESSION ["is_login"])) { // memvalidasi session jika user sudah login jump ke dasboard
    header("location: dashboard.php");
}
// menangkap data yang di kirim dari form
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash('sha256', $password);
// mengecek data di database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password' ";
    $result = $db->query($sql);
    // mengecek apakah username dan password ada di database
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc(); // menampilkan data user
        $_SESSION ["username"] = $data['username']; // membuat session untuk bisa di akses di semua halaman terkait
        $_SESSION ["is_login"] = true;

        header("location: dashboard.php");
    } else {
        $login_message = "Login Failed, Account not found";
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
    <h1>Login Page</h1>
    <i><?= $login_message ?></i>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="zora123" required?></br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="******" required?></br>
        <button type="submit" name="submit">Login</button>
    </form>
    <?php include 'layout/footer.html' ?>
</body>
</html>