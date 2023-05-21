<?php
// Membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tgslogin");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Periksa apakah form login disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username dan password benar
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dan username/password benar
    if (mysqli_num_rows($result) == 1) {
        // Redirect ke halaman formpengaduan.php jika login berhasil
        header("Location: formpengaduan.php");
        session_start();
        $_SESSION['logged_in'] = true;
        exit();
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!-- Form login -->
<form action="login.php" method="POST"><br>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="submit" value="Login">
</form>

<!-- Tombol Lupa Password -->
<a href="lupapassword.php">Lupa Password?</a> <br>
<a href="formpengaduan.php">From Pengaduan</a>