<?php
include 'config/koneksi.php'; // Pastikan file koneksi tersedia

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama     = htmlspecialchars($_POST['nama']);
  $email    = htmlspecialchars($_POST['email']);
  $telepon  = htmlspecialchars($_POST['telepon']);
  $jasa     = htmlspecialchars($_POST['jasa']);
  $pesan    = htmlspecialchars($_POST['pesan']);

  $query = "INSERT INTO pesanan (nama, email, telepon, jasa, pesan)
            VALUES ('$nama', '$email', '$telepon', '$jasa', '$pesan')";

  if (mysqli_query($conn, $query)) {
    echo "<script>
      alert('Pesanan berhasil dikirim! Terima kasih.');
      window.location.href = 'index.html';
    </script>";
  } else {
    echo "<script>
      alert('Pesanan gagal dikirim!');
      window.history.back();
    </script>";
  }
} else {
  header("Location: index.html");
  exit;
}
