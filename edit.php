<?php
include "koneksi.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namadep = $_POST['namadep'];
    $namabel = $_POST['namabel'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usia = $_POST['usia'];
    $jk = $_POST['jk'];
    $ttl = $_POST['ttl'];
    $email = $_POST['email'];
    $notel = $_POST['notel'];
    $role = $_POST['role']; // Tambahan role

    $update = "UPDATE register SET 
                namadep='$namadep', 
                namabel='$namabel', 
                username='$username', 
                password='$password', 
                usia='$usia', 
                jk='$jk', 
                ttl='$ttl', 
                email='$email', 
                notel='$notel', 
                role='$role' 
                WHERE id='$id'";

    if (mysqli_query($con, $update)) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href='index.php?module=galeri#pos';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diperbarui: " . mysqli_error($con) . "');
            window.location.href='index.php?module=galeri#pos';
        </script>";
    }
}

mysqli_close($con);
?>
