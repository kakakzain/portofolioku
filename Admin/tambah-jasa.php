<?php
include '../config/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pesanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-inbox me-2"></i> Tambah Data Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses-tambah.php" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama pemesan">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required placeholder="contoh@email.com">
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label fw-bold">Nomor Telepon</label>
                                <input type="tel" name="telepon" id="telepon" class="form-control" required placeholder="08xxxxxxxxxx">
                            </div>

                            <div class="mb-3">
                                <label for="jasa" class="form-label fw-bold">Jenis Jasa</label>
                                <input type="text" name="jasa" id="jasa" class="form-control" required placeholder="Jenis jasa yang diminta">
                            </div>

                            <div class="mb-3">
                                <label for="pesan" class="form-label fw-bold">Pesan/Keterangan</label>
                                <textarea name="pesan" id="pesan" class="form-control" rows="4" required placeholder="Catatan atau permintaan khusus..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100 shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Pesanan
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="dashboard.php" class="text-decoration-none text-primary fw-bold">
                                <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Pesanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>