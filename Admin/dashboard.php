<?php
include '../config/koneksi.php'; // Sesuaikan path jika perlu

// Cek apakah sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil data dari tabel pesanan
$query = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Pesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-700">

    <!-- Navbar -->
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600 flex items-center gap-2">🧾 Admin Portofolio</h1>
            <a href="logout.php" class="text-sm px-4 py-2 border rounded-md text-red-600 border-red-500 hover:bg-red-50 transition">Logout</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6 space-y-6">
        <!-- Info Card -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded-lg p-4 border-l-4 border-blue-500">
                <h2 class="text-sm font-medium text-gray-500">Total Pesanan</h2>
                <p class="text-3xl font-bold text-blue-600"><?= mysqli_num_rows($query) ?></p>
            </div>
        </div>

        <!-- Header & Action -->
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">📥 Daftar Pesanan</h3>
            <a href="tambah-jasa.php" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">➕ Tambah Jasa</a>
        </div>

        <!-- Table -->
        <div class="overflow-auto shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-100 text-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium">No</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Nama</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Telepon</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Jasa</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Pesan</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Tanggal</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?= $no++ ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['telepon']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['jasa']) ?></td>
                            <td class="px-4 py-2"><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
                            <td class="px-4 py-2"><?= $row['tanggal'] ?></td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="edit-jasa.php?id=<?= $row['id'] ?>" class="text-sm px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>
                                <a href="hapus-jasa.php?id=<?= $row['id'] ?>" class="text-sm px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>