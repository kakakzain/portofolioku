<?php
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID tidak valid.";
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id=$id");

if (mysqli_num_rows($data) === 0) {
    echo "Pesanan tidak ditemukan.";
    exit;
}

$pesanan = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <style>
        body {
            background: linear-gradient(to right, #f97316, #3b82f6);
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            max-width: 700px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #3b82f6;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        .btn {
            background-color: #3b82f6;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #f97316;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Edit Data Pesanan</h2>
        <form action="update-pesanan.php" method="POST">
            <input type="hidden" name="id" value="<?= $pesanan['id'] ?>">

            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($pesanan['nama']) ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($pesanan['email']) ?>" required>

            <label for="telepon">Nomor Telepon</label>
            <input type="tel" id="telepon" name="telepon" value="<?= htmlspecialchars($pesanan['telepon']) ?>" required>

            <label for="jasa">Jenis Jasa</label>
            <input type="text" id="jasa" name="jasa" value="<?= htmlspecialchars($pesanan['jasa']) ?>" required>

            <label for="pesan">Pesan/Keterangan</label>
            <textarea id="pesan" name="pesan" required><?= htmlspecialchars($pesanan['pesan']) ?></textarea>

            <button type="submit" class="btn">Update Pesanan</button>
        </form>

        <a href="dashboard.php" class="back-link">← Kembali ke Dashboard</a>
    </div>

</body>

</html>