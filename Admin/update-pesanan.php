<?php
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$id       = $_POST['id'];
$nama     = htmlspecialchars($_POST['nama']);
$email    = htmlspecialchars($_POST['email']);
$telepon  = htmlspecialchars($_POST['telepon']);
$jasa     = htmlspecialchars($_POST['jasa']);
$pesan    = htmlspecialchars($_POST['pesan']);

$query = "UPDATE pesanan SET
    nama='$nama',
    email='$email',
    telepon='$telepon',
    jasa='$jasa',
    pesan='$pesan'
    WHERE id=$id";

if (mysqli_query($conn, $query)) {
  echo "<script>
      alert('Pesanan berhasil diupdate!');
      window.location.href = 'dashboard.php';
    </script>";
} else {
  echo "<script>
      alert('Gagal mengupdate pesanan.');
      window.history.back();
    </script>";
}
