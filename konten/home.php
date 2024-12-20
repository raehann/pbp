<?php
include "./koneksi.php";

// Simulasi login
$logged_in = isset($_SESSION['user_id']);
$username = $logged_in ? $_SESSION['username'] : null;
$role = $logged_in ? $_SESSION['role'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .form-container {
            display: none;
            margin-top: 20px;
        }
        .form-container.active {
            display: block;
        }
        .welcome {
            margin-top: 20px;
            display: none;
        }
        .button-container {
            margin-top: 10px;
        }
        button {
            margin: 5px;
            padding: 10px 20px;
            background-color: lightgray;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: gray;
            color: white;
        }
    </style>
    <script>
        function handleVisibility(loggedIn) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const welcomeMessage = document.getElementById('welcome');
            const loginButton = document.getElementById('show-login');
            const registerButton = document.getElementById('show-register');

            if (loggedIn) {
                // Jika sudah login
                loginForm.style.display = 'none';
                welcomeMessage.style.display = 'block';
                loginButton.style.display = 'none'; // Hilangkan tombol login
            } else {
                // Jika belum login
                loginForm.style.display = 'block';
                welcomeMessage.style.display = 'none';
            }

            // Event listener untuk tombol Login
            loginButton.addEventListener('click', function () {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            });

            // Event listener untuk tombol Register
            registerButton.addEventListener('click', function () {
                registerForm.style.display = 'block';
                loginForm.style.display = 'none';
            });
        }

        window.onload = function () {
            handleVisibility(<?php echo $logged_in ? 'true' : 'false'; ?>);
        };
    </script>
</head>
<body>
    <div align="center">
        <!-- Pesan Selamat Datang -->
        <div id="welcome" class="welcome">
            <h2>Halo, <?php echo htmlspecialchars($username); ?></h2>
            <p>Anda login sebagai <strong><?php echo htmlspecialchars($role); ?></strong>.</p>
        </div>

        <!-- Tombol Login dan Register -->
        <div class="button-container">
            <button id="show-login">Login</button>
            <button id="show-register">Register</button>
        </div>

        <!-- Form Login -->
        <div id="login-form" class="form-container">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button type="submit" name="login">Login</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Form Register -->
        <div id="register-form" class="form-container">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>Nama Depan:</td>
                        <td><input type="text" name="namadep"></td>
                    </tr>
                    <tr>
                        <td>Nama Belakang:</td>
                        <td><input type="text" name="namabel"></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Usia:</td>
                        <td><input type="number" name="usia"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin:</td>
                        <td><input type="text" name="jk"></td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir:</td>
                        <td><input type="text" name="ttl"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>No Telepon:</td>
                        <td><input type="text" name="notel"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button type="submit" name="register">Register</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>