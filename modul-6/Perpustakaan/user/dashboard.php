<?php
include '../config/auth.php';
include '../config/koneksi.php';

/*
========================================
TAMBAH BUKU
========================================
*/

if(isset($_POST['tambah'])){

    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun'];
    $stok    = $_POST['stok'];
    $kategori= $_POST['kategori'];

    $stmt = $conn->prepare("INSERT INTO buku
                            (judul, penulis, tahun_terbit, stok, kategori)
                            VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssis",
        $judul,
        $penulis,
        $tahun,
        $stok,
        $kategori
    );

    if($stmt->execute()){
        echo "<script>alert('Buku berhasil ditambahkan')</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku')</script>";
    }
}

$data = $conn->query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2>
                    📚 Dashboard User
                </h2>

                <p class="mt-2">
                    Selamat datang di Sistem Perpustakaan
                </p>

            </div>

            <a href="../logout.php"
            class="btn btn-danger px-4">

                Logout

            </a>

        </div>

        <!-- FORM TAMBAH BUKU -->
        <div class="card p-4 mb-4">

            <h4 class="mb-3">
                ➕ Tambah Buku
            </h4>

            <form method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Judul Buku
                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Penulis
                        </label>

                        <input type="text"
                               name="penulis"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Tahun Terbit
                        </label>

                        <input type="number"
                               name="tahun"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Stok Buku
                        </label>

                        <input type="number"
                               name="stok"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Kategori Buku
                        </label>

                        <input type="text"
                               name="kategori"
                               class="form-control"
                               required>

                    </div>

                </div>

                <button type="submit"
                        name="tambah"
                        class="btn btn-success">

                    Tambah Buku

                </button>

            </form>

        </div>

        <!-- TABLE -->
        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Kategori</th>

                </tr>

            </thead>

            <tbody>

            <?php
            $no = 1;

            while($row = $data->fetch_assoc()) :
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td>
                    <?= htmlspecialchars($row['judul']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['penulis']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['tahun_terbit']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['stok']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['kategori']); ?>
                </td>

            </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>