<?php
include "./koneksi.php";

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Anda harus login terlebih dahulu!";
    echo "<script>
        alert('Anda harus login terlebih dahulu!');
        window.location.href = '?module=home#pos';
    </script>";
    exit;
}

$search = isset($_POST['search']) ? $_POST['search'] : '';

if (!empty($search)) {
    $query = "SELECT * FROM register WHERE username LIKE '%$search%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Hasil Pencarian:</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>ID</th>
                <th style='text-align: center;'>Nama Depan</th>
                <th style='text-align: center;'>Nama Belakang</th>
                <th>Username</th>
                <th>Password</th>
                <th>Usia</th>
                <th style='text-align: center;'>Jenis Kelamin</th>
                <th style='text-align: center;'>TTL</th>
                <th style='text-align: center;'>Email</th>
                <th style='text-align: center;'>No Telp</th>
                <th style='text-align: center;'>Role</th> 
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['namadep'] . "</td>";
            echo "<td>" . $row['namabel'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['usia'] . "</td>";
            echo "<td>" . $row['jk'] . "</td>";
            echo "<td>" . $row['ttl'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['notel'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Data tidak ditemukan.</h2>";
    }
}
?>

<h2>Cari Berdasarkan Username</h2>
<form method="POST" action="">
    <input type="text" name="search" placeholder="Masukkan username" value="<?php echo $search; ?>">
    <button type="submit">Cari</button>
</form>
