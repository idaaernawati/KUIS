<html>
<head>
    <title>FORMULIR PENGADUAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">TAMPILAN DATA PENGADUAN</h1><br>
    <div class="card">
        <p>Tanggal : <?php echo date('d F Y'); ?></p>
        <div class="card-header bg-dark text-white">
            REGISTRASI SISTEM INFORMASI PENGADUAN FASILKOM UPNVJT
        </div>
        <div class="card-body">
            <form method="post" action="logout.php">
                <div class="form-group row">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>NPM</th>
                            <th>Program Studi</th>
                            <th>Isi Aduan</th>
                        </tr>
                        <?php
                            include 'koneksi.php';
                            $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                            foreach ($pengaduan as $row) {
                                echo "<tr>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['nama_lengkap'] . "</td>
                                    <td>" . $row['npm'] . "</td>
                                    <td>" . $row['program_studi'] . "</td>
                                    <td>" . $row['isi_aduan'] . "</td>                                    
                                </tr>";
                            }
                        ?>
                    </table>
                </div>
            </form>
        </div>
</body>
</html>

