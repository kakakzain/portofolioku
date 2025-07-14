<?php
include '../config/koneksi.php'; // Sesuaikan path jika perlu

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID tidak valid.";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM pesanan WHERE id=$id");

if ($query) {
    echo "<script>
        alert('Jasa berhasil dihapus.');
        window.location.href = 'dashboard.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data!');
        window.history.back();
    </script>";
}
