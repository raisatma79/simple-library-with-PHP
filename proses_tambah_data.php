<?php
include('db_peminjaman.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nama_buku = isset($_POST['nama_buku']) ? $_POST['nama_buku'] : '';
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
    $kode_isbn = isset($_POST['kode_isbn']) ? $_POST['kode_isbn'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
    $tanggal_peminjaman = isset($_POST['tanggal_peminjaman']) ? $_POST['tanggal_peminjaman'] : '';
    $tanggal_kembali = isset($_POST['tanggal_kembali']) ? $_POST['tanggal_kembali'] : '';
    
    if($nama && $nama_buku && $penerbit && $kode_isbn && $pengarang && $tahun_terbit && $tanggal_peminjaman && $tanggal_kembali) {
        $sql = "INSERT INTO peminjaman (nama, nama_buku, penerbit, kode_isbn, pengarang, tahun_terbit, tanggal_peminjaman, tanggal_kembali) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssissss", $nama, $nama_buku, $penerbit, $kode_isbn, $pengarang, $tahun_terbit, $tanggal_peminjaman, $tanggal_kembali);

            if ($stmt->execute()) {
                echo "<p>Data berhasil ditambahkan</p>";
                header("Location: tambah_data.php");
            } else {
                echo "<p>Execute Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>All fields are required!</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah Data</h1>
                            </div>
                            <form method="post" class="user">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-user" id="nama"
                                        placeholder="nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama_buku" class="form-control form-control-user" id="nama_buku"
                                        placeholder="nama buku" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="penerbit" class="form-control form-control-user" id="penerbit"
                                        placeholder="penerbit" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="kode_isbn" class="form-control form-control-user" id="kode_isbn"
                                        placeholder="kode_isbn" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pengarang" class="form-control form-control-user" id="pengarang"
                                        placeholder="Pengarang" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="tahun_terbit" class="form-control form-control-user" id="tahun_terbit"
                                        placeholder="tahun_terbit" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal_peminjaman" class="form-control form-control-user" id="tanggal_peminjaman" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal_kembali" class="form-control form-control-user" id="tanggal_kembali" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Tambahkan Data</button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="tambah_data.php">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
