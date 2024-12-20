<?php
include "koneksi.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    $delete = "DELETE FROM register WHERE id = $id";

    if (mysqli_query($con, $delete)) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href='index.php?module=galeri#pos'; // Redirect ke halaman galeri
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus: " . mysqli_error($con) . "');
            window.location.href='index.php?module=galeri#pos'; // Redirect ke halaman galeri
        </script>";
    }
} else {
    header("Location: index.php?module=galeri#pos");
    exit();
}

mysqli_close($con);
?>
