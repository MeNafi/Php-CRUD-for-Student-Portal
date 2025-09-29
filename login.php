<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin/index.php");
        exit();
    } else {
        $error = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1>🔐 Admin Login</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
</body>
</html>
