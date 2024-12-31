<?php
session_start();
include('db_login.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $email = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Akun berhasil dihapus.";
        } else {
            $_SESSION['error_message'] = "Gagal menghapus akun. Coba lagi nanti.";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Data tidak valid.";
    }
} else {
    $_SESSION['error_message'] = "Akses tidak valid.";
}

header("Location: account.php");
exit();
