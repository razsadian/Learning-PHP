<?php 
include 'service/database.php';
// menangkap data yang di kirim dari form
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
// mengecek data di database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $result = $db->query($sql);
    // mengecek apakah username dan password ada di database
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc(); // menampilkan data user
        echo "Login Successful " . 'Welcome ' . $data['username'];
    } else {
        echo "Login Failed";
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
    <h1>Login Page</h1>
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