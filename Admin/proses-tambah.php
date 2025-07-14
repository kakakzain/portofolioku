<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

// Validasi data yang dikirim dari form
if (
  empty($_POST['nama']) ||
  empty($_POST['email']) ||
  empty($_POST['telepon']) ||
  empty($_POST['jasa']) ||
  empty($_POST['pesan'])
) {
  echo "<script>
        alert('Data pesanan tidak lengkap!');
        window.history.back();
    </script>";
  exit;
}

// Amankan input dan bersihkan spasi
$nama     = mysqli_real_escape_string($conn, trim($_POST['nama']));
$email    = mysqli_real_escape_string($conn, trim($_POST['email']));
$telepon  = mysqli_real_escape_string($conn, trim($_POST['telepon']));
$jasa     = mysqli_real_escape_string($conn, trim($_POST['jasa']));
$pesan    = mysqli_real_escape_string($conn, trim($_POST['pesan']));

// Simpan data ke tabel pesanan
$query = "INSERT INTO pesanan (nama, email, telepon, jasa, pesan) VALUES 
          ('$nama', '$email', '$telepon', '$jasa', '$pesan')";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "<script>
        alert('✅ Pesanan berhasil disimpan!');
        window.location.href = 'dashboard.php';
    </script>";
} else {
  echo "<script>
        alert('❌ Gagal menyimpan pesanan!');
        window.history.back();
    </script>";
}
