<?php
include '../config/auth.php';
include '../config/koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM buku WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$data = $stmt->get_result()->fetch_assoc();

if (isset($_POST['update'])) {

    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    $kategori = htmlspecialchars($_POST['kategori']);

    $update = $conn->prepare("UPDATE buku SET
                              judul=?,
                              penulis=?,
                              tahun_terbit=?,
                              stok=?,
                              kategori=?
                              WHERE id=?");

    $update->bind_param("sssisi",
        $judul,
        $penulis,
        $tahun,
        $stok,
        $kategori,
        $id
    );

    if ($update->execute()) {
        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <div class="text-center mb-4">

            <h2>
                ✏️ Edit Data Buku
            </h2>

            <p>
                Perbarui informasi buku perpustakaan
            </p>

        </div>

        <form method="POST">

            <!-- JUDUL -->
            <label>
                📖 Judul Buku
            </label>

            <input type="text"
            name="judul"
            class="form-control mb-3"
            value="<?= htmlspecialchars($data['judul']); ?>"
            required>

            <!-- PENULIS -->
            <label>
                ✍️ Nama Penulis
            </label>

            <input type="text"
            name="penulis"
            class="form-control mb-3"
            value="<?= htmlspecialchars($data['penulis']); ?>"
            required>

            <!-- TAHUN -->
            <label>
                📅 Tahun Terbit
            </label>

            <input type="number"
            name="tahun"
            class="form-control mb-3"
            value="<?= htmlspecialchars($data['tahun_terbit']); ?>"
            required>

            <!-- STOK -->
            <label>
                📦 Jumlah Stok
            </label>

            <input type="number"
            name="stok"
            class="form-control mb-3"
            value="<?= htmlspecialchars($data['stok']); ?>"
            required>

            <!-- KATEGORI -->
            <label>
                🏷️ Kategori Buku
            </label>

            <input type="text"
            name="kategori"
            class="form-control mb-4"
            value="<?= htmlspecialchars($data['kategori']); ?>"
            required>

            <!-- BUTTON -->
            <div class="d-flex gap-2">

                <button type="submit"
                name="update"
                class="btn btn-success w-100">

                    💾 Update Buku

                </button>

                <a href="dashboard.php"
                class="btn btn-danger w-100">

                    ❌ Batal

                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>