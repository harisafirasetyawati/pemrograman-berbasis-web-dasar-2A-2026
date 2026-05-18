<?php
include 'config/koneksi.php';

if (isset($_POST['register'])) {

    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $cek = $conn->prepare("SELECT id FROM users WHERE username=?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan')</script>";
    } else {

        $stmt = $conn->prepare("INSERT INTO users(nama, username, password, role) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $nama, $username, $password, $role);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Registrasi berhasil');
                    window.location='login.php';
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow-lg form-card">

        <h2 class="text-center mb-4">Register</h2>

        <form method="POST">

            <input type="text"
                   name="nama"
                   class="form-control mb-3"
                   placeholder="Nama"
                   required>

            <input type="text"
                   name="username"
                   class="form-control mb-3"
                   placeholder="Username"
                   required>

            <input type="password"
                   name="password"
                   class="form-control mb-3"
                   placeholder="Password"
                   minlength="6"
                   required>

            <select name="role" class="form-control mb-3" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button class="btn btn-primary w-100" name="register">
                Register
            </button>

        </form>

        <p class="mt-3 text-center">
            Sudah punya akun?
            <a href="login.php">Login</a>
        </p>

    </div>
</div>

</body>
</html>