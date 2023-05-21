<?php
// Membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tgslogin");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Periksa apakah form lupa password disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    // Query untuk memeriksa apakah username valid
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dan username valid
    if (mysqli_num_rows($result) == 1) {
        // Proses pemulihan password
        // ...
        // Implementasikan logika pemulihan password di sini
        // ...

        // Contoh: Mengirim email ke pengguna dengan tautan untuk mengatur ulang password
        $resetLink = "https://example.com/reset_password.php?username=" . urlencode($username);
        $emailMessage = "Halo, Anda dapat mengatur ulang password Anda melalui tautan berikut: $resetLink";
        mail($userEmail, "Reset Password", $emailMessage);

        // Redirect ke halaman informasi pemulihan password
        header("Location: login.php");
        exit();
    } else {
        echo "Username tidak ditemukan.";
    }
}
?>

<!-- Form lupa password -->
<form action="lupapassword.php" method="POST"><br>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>

    <input type="submit" name="submit" value="Reset Password">
</form>
