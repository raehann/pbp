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

$editId = isset($_GET['edit']) ? $_GET['edit'] : null;

if ($editId) {
    $query = "SELECT * FROM register WHERE id = '$editId'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $editData = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!');</script>";
        $editId = null;
    }
}

// Mendapatkan role pengguna yang login
$logged_in_role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
?>

<h2>Daftar Member</h2>

<table width="1200" border="1">
    <tr>
        <th>ID</th>
        <th style="text-align: center;">Nama Depan</th>
        <th style="text-align: center;">Nama Belakang</th>
        <th>Username</th>
        <th>Password</th>
        <th>Usia</th>
        <th style="text-align: center;">Jenis Kelamin</th>
        <th style="text-align: center;">TTL</th>
        <th style="text-align: center;">Email</th>
        <th style="text-align: center;">No Telepon</th>
        <th style="text-align: center;">Role</th> 
        <?php if ($logged_in_role === 'admin'): ?>
            <th colspan="2" style="text-align: center;">Aksi</th>
        <?php endif; ?>
    </tr>

    <?php
    $query = "SELECT * FROM register";
    $result = mysqli_query($con, $query);

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
        if ($logged_in_role === 'admin') {
            echo "<td><a href='index.php?module=galeri&edit=" . $row['id'] . "#pos'>Edit</a></td>";
            echo "<td><a href='hapus.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a></td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<br>
<?php if ($editId && $logged_in_role === 'admin'): ?>
    <h2>Edit Data</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $editData['id']; ?>" />
        <table>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="namadep" value="<?php echo $editData['namadep']; ?>" /></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td><input type="text" name="namabel" value="<?php echo $editData['namabel']; ?>" /></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $editData['username']; ?>" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $editData['password']; ?>" /></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia" value="<?php echo $editData['usia']; ?>" /></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk" value="<?php echo $editData['jk']; ?>" /></td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td><input type="text" name="ttl" value="<?php echo $editData['ttl']; ?>" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $editData['email']; ?>" /></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td><input type="text" name="notel" value="<?php echo $editData['notel']; ?>" /></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <option value="admin" <?php echo ($editData['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?php echo ($editData['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="update">Simpan</button>
                    <button><a href="index.php?module=galeri#pos">Batal</a></button>
                </td>
            </tr>
        </table>
    </form>
    <hr />
<?php endif; ?>
<?php
mysqli_close($con);
?>
