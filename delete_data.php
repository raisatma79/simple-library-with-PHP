<?php
session_start();
include('db_peminjaman.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Data berhasil dihapus.";
        header("Location: tambah_data.php");
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan saat menghapus data.";
        header("Location: tambah_data.php");
    }

    $stmt->close();
} else {
    $_SESSION['error_message'] = "Permintaan tidak valid.";
    header("Location: tambah_data.php");
}

$conn->close();
?>
