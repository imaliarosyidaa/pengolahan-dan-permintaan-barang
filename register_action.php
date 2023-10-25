<?php
//menyertakan file koneksi.php
require 'config/koneksi.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO tbl_user (username, password)
VALUES ('$uername', '$password')";

if ($connection->query($sql) === TRUE) {
    echo "  
    <script> 
        alert('Akun Berhasil dibuat...!');
        document.location.href='index.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($connection);
?>
