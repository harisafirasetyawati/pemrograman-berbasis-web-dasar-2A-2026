<?php
include '../config/auth.php';
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
$data = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<head>
    <title>Dashboard Admin</title>
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

    <div class="d-flex justify-content-between mb-4">
        <h2>Data Buku</h2>

        <div>
            <a href="tambah.php" class="btn btn-primary">
                Tambah Buku
            </a>

            <a href="../logout.php" class="btn btn-danger">
                Logout
            </a>
        </div>
    </div>

    <table class="table table-hover align-middle">

        <tr class="table-pink">
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while($row = $data->fetch_assoc()) :
        ?>

        <tr>
            <td><?= $no++; ?></td>

            <td><?= htmlspecialchars($row['judul']); ?></td>
            <td><?= htmlspecialchars($row['penulis']); ?></td>
            <td><?= htmlspecialchars($row['tahun_terbit']); ?></td>
            <td><?= htmlspecialchars($row['stok']); ?></td>
            <td><?= htmlspecialchars($row['kategori']); ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id']; ?>"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <a href="hapus.php?id=<?= $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus?')">
                   Hapus
                </a>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>

</div>

<script src="../assets/script.js"></script>

</body>
</html>