<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>mywebsite</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
</head>
<body>
    <div id="container">
        <div id="header">
            <div class="gif-group">
                <img src="images/shine.gif" alt="shine">
                <img src="images/neon.gif" alt="neon">
            </div>
        </div>

        <div id="sidebar">
            <h3>Navigasi</h3>
            <ul id="navmenu">
                <li><a href="index.php" class="selected">Insert</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="?module=galeri#pos">View</a></li>
                <li><a href="?module=jadwal#pos">Search</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div id="page">
            <?php 
                if (isset($_GET['module'])) {
                    include "konten/" . $_GET['module'] . ".php";
                } else {
                    include "konten/home.php";
                }
            ?>
        </div>

        <div id="clear"></div>

        <div id="footer">
            <p>&copy; 2010</p>
        </div>
    </div>
</body>
</html>
