<?php
include "koneksi.php";

$mysql = "INSERT INTO register 
    (namadep, namabel, username, password, usia, jk, ttl, email, notel, role) 
    VALUES 
    ('" . $_POST['namadep'] . "', 
    '" . $_POST['namabel'] . "', 
    '" . $_POST['username'] . "', 
    '" . $_POST['password'] . "', 
    '" . $_POST['usia'] . "', 
    '" . $_POST['jk'] . "', 
    '" . $_POST['ttl'] . "', 
    '" . $_POST['email'] . "', 
    '" . $_POST['notel'] . "', 
    'user')";

if (!mysqli_query($con, $mysql)) {
    die("Error: " . mysqli_error($con));
}

echo "<script>alert('Selamat, anda telah terdaftar');window.location.href='index.php';</script>";

mysqli_close($con);
?>
