<?php
include('db_peminjaman.php');

// Mendapatkan ID dari POST
$id = isset($_POST['id']) ? $_POST['id'] : '';

// Validasi jika ID kosong
if (empty($id)) {
    echo "ID tidak ditemukan!";
    exit;
}

// Ambil data dari database berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $kode_isbn = $_POST['kode_isbn'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Update data di database
    $updateQuery = mysqli_query($conn, "UPDATE peminjaman SET 
        nama='$nama', 
        nama_buku='$nama_buku', 
        penerbit='$penerbit', 
        kode_isbn='$kode_isbn', 
        pengarang='$pengarang', 
        tahun_terbit='$tahun_terbit', 
        tanggal_peminjaman='$tanggal_peminjaman', 
        tanggal_kembali='$tanggal_kembali' 
        WHERE id='$id'");

    if ($updateQuery) {
        echo "Data berhasil diupdate!";
        header("Location: tambah_Data.php");
        // echo "<a href='tambah_data.php'>Kembali ke daftar</a>";
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
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
                                <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                            </div>
                            <form method="post" class="user">
                                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-user" value="<?php echo $data['nama'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama_buku" class="form-control form-control-user" value="<?php echo $data['nama_buku'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="penerbit" class="form-control form-control-user" value="<?php echo $data['penerbit'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="kode_isbn" class="form-control form-control-user" value="<?php echo $data['kode_isbn'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pengarang" class="form-control form-control-user" value="<?php echo $data['pengarang'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="tahun_terbit" class="form-control form-control-user" value="<?php echo $data['tahun_terbit'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal_peminjaman" class="form-control form-control-user" value="<?php echo $data['tanggal_peminjaman'];?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal_kembali" class="form-control form-control-user" value="<?php echo $data['tanggal_kembali'];?>" required>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Simpan Data</button>
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
