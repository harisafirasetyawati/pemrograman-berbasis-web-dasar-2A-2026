<?php
include '../config/auth.php';
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {

    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    $kategori = htmlspecialchars($_POST['kategori']);

    $stmt = $conn->prepare("INSERT INTO buku(judul, penulis, tahun_terbit, stok, kategori)
                            VALUES(?,?,?,?,?)");

    $stmt->bind_param("sssis", $judul, $penulis, $tahun, $stok, $kategori);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<head>

    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

    <h2 class="mb-4 text-center">
        📚 Tambah Data Buku
    </h2>

    <form method="POST">

        <!-- JUDUL -->
        <label class="form-label fw-bold">
            📖 Judul Buku
        </label>

        <input type="text"
        name="judul"
        class="form-control mb-3"
        placeholder="Masukkan judul buku"
        required>

        <!-- PENULIS -->
        <label class="form-label fw-bold">
            ✍️ Nama Penulis
        </label>

        <input type="text"
        name="penulis"
        class="form-control mb-3"
        placeholder="Masukkan nama penulis"
        required>

        <!-- TAHUN -->
        <label class="form-label fw-bold">
            📅 Tahun Terbit
        </label>

        <input type="number"
        name="tahun"
        class="form-control mb-3"
        placeholder="Contoh: 2025"
        required>

        <!-- STOK -->
        <label class="form-label fw-bold">
            📦 Jumlah Stok Buku
        </label>

        <input type="number"
        name="stok"
        class="form-control mb-3"
        placeholder="Masukkan jumlah stok"
        required>

        <!-- KATEGORI -->
        <label class="form-label fw-bold">
            🏷️ Kategori Buku
        </label>

        <input type="text"
        name="kategori"
        class="form-control mb-3"
        placeholder="Contoh: Novel, Komik, Edukasi"
        required>

        <!-- BUTTON -->
        <button type="submit"
        name="simpan"
        class="btn btn-primary w-100 py-2 mt-2">

            💾 Simpan Buku

        </button>

    </form>

</div>

</body>
</html>