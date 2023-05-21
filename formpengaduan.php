<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<?php
    include 'koneksi.php';
?>
<html>

<head>
    <title>FORMULIR PENGADUAN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

    <?php
    $error_username = "";
    $error_password = "";
    $error_email = "";
    $error_nama_lengkap = "";
    $error_npm = "";
    $error_program_studi = "";
    $error_isi_aduan = "";
    
    $username = "";
    $password = "";
    $email = "";
    $nama_lengkap = "";
    $npm = "";
    $program_studi = "";
    $isi_aduan = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["nis"])) {
            $error_nis = "NIS Tidak Boleh Kosong";
        } else {
            $nis = cek_input($_POST["nis"]);
            if (!is_numeric($nis)) {
                $error_nis = "NIS Hanya Boleh Angka";
            }
        }

        if (empty($_POST["no_peserta_ujian"])) {
            $error_no_peserta_ujian = "No Peserta Ujian Tidak Boleh Kosong";
        } else {
            $no_peserta_ujian = cek_input($_POST["no_peserta_ujian"]);
            if (!is_numeric($no_peserta_ujian)) {
                $error_no_peserta_ujian = "Nomor Peserta Ujian Hanya Boleh Angka";
            }
        }

        if (empty($_POST["no_skhun"])) {
            $error_no_skhun = "Nomor Seri SKHUN Tidak Boleh Kosong";
        } else {
            $no_skhun = cek_input($_POST["no_skhun"]);
            if (!is_numeric($no_skhun)) {
                $error_no_skhun = "Nomor Seri SKHUN Hanya Boleh Angka";
            }
        }

        if (empty($_POST["no_ijazah"])) {
            $error_no_ijazah = "No Seri Ijazah Tidak Boleh Kosong";
        } else {
            $no_ijazah = cek_input($_POST["no_ijazah"]);
            if (!is_numeric($no_ijazah)) {
                $error_no_ijazah = "Nomor Seri Ijazah Hanya Boleh Angka";
            }
        }

    }

    function cek_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <br>
    <h1 class="text-center">FORMULIR PENGADUAN</h1><br>
    <div class="card">
        <p>Tanggal : <?php echo date('d F Y'); ?></p>
        <div class="card-header bg-primary text-white">
            REGISTRASI SISTEM INFORMASI PENGADUAN FASILKOM UPNVJT
        </div>
        <div class="card-body">
            <form method="post" action="readform.php">

                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-10">
                        <input type="text" name="username" id="username"
                            class="form-control <?php echo ($error_username !="" ? "is-invalid" : ""); ?>"
                            placeholder="Username" value="<?php echo $username; ?>"> <span
                            class="warning"><?php echo $error_username ?></span>
                    </div>
                </div> <br>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" id="password"
                            class="form-control <?php echo ($error_password !="" ? "is-invalid" : ""); ?>"
                            placeholder="Password" value="<?php echo $password; ?>"> <span
                            class="warning"><?php echo $error_password ?></span>
                    </div>
                </div><br>


                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" id="email"
                            class="form-control <?php echo ($error_email !="" ? "is-invalid" : ""); ?>"
                            placeholder="Email" value="<?php echo $email; ?>"> <span
                            class="warning"><?php echo $error_email ?></span>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                            class="form-control <?php echo ($error_nama_lengkap !="" ? "is-invalid" : ""); ?>"
                            placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>"> <span
                            class="warning"><?php echo $error_nama_lengkap ?></span>
                    </div>
                </div> <br>

                <div class="form-group row">
                    <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" name="npm" id="npm"
                            class="form-control <?php echo ($error_npm !="" ? "is-invalid" : ""); ?>"
                            placeholder="NPM" value="<?php echo $npm; ?>"> <span
                            class="warning"><?php echo $error_npm ?></span>
                    </div>
                </div><br>
                
                <div class="form-group row">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="radio" name="program_studi" value="Informatika">Informatika</label>
                        <input type="radio" name="program_studi" value="Sistem Informasi">Sistem Informasi</label>
                        <input type="radio" name="program_studi" value="Sains Data">Sains Data</label>
                        <span class="warning"><?php echo $error_program_studi; ?></span>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="isi_aduan" class="col-sm-2 col-form-label">Isi Aduan</label>
                    <div class="col-sm-10">
                        <input type="text" name="isi_aduan" id="isi_aduan"
                            class="form-control <?php echo ($error_isi_aduan !="" ? "is-invalid" : ""); ?>"
                            placeholder="Isi Aduan" value="<?php echo $isi_aduan; ?>"> <span
                            class="warning"><?php echo $error_isi_aduan ?></span>
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>