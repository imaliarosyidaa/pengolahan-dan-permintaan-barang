<?php
//menyertakan file koneksi.php
require 'config/koneksi.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($username == $row['username'] && $password == $row['password']) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit();
    }
}

mysqli_close($connection);
?>
