<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$npm = $_POST['npm'];
$program_studi = $_POST['program_studi'];
$isi_aduan = $_POST['isi_aduan'];

// Menyimpan ke database
$sql = mysqli_query($koneksi, "INSERT INTO pengaduan (username, password, email, nama_lengkap, npm, program_studi, isi_aduan) 
VALUES ('$username', '$password', '$email', '$nama_lengkap', '$npm', '$program_studi', '$isi_aduan')");
if ($sql) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Keseluruhan Berhasil Disimpan!'); window.location.href='formpengaduan.php'</script>";
} else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Pengaduan Gagal Ditambahkan!!');</script>";
}
?>
