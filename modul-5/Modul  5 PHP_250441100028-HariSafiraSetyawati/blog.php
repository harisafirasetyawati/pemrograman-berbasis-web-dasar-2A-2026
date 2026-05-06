<?php
// DATA ARTIKEL
$artikel = [
    "html" => [
        "judul" => "Belajar HTML Pertama Kali",
        "tanggal" => "11 Maret 2026",
        "isi" => "Pertama kali belajar HTML terasa membingungkan, tetapi sangat menyenangkan saat berhasil membuat halaman web sederhana.",
        "gambar" => "Gambar HTML.png",
        "link" => "https://developer.mozilla.org/id/docs/Web/HTML"
    ],
    "error" => [
        "judul" => "Error Pertama",
        "tanggal" => "16 Maret 2026",
        "isi" => "Mengalami error pertama membuat saya frustasi, tetapi dari situ saya belajar cara debugging dan mencari solusi.",
        "gambar" => "Gambar Error.png",
        "link" => "https://www.w3schools.com/html/default.asp"
    ],
    "mysql" => [
        "judul" => "Mulai Databse MySQL",
        "tanggal" => "12 Maret 2026",
        "isi" => "Belajar database MySQL membuka wawasan tentang bagaimana data disimpan dan dikelola.",
        "gambar" => "Gambar MySQL.png",
        "link" => "https://www.w3schools.com/mysql/"
    ]
];

// ARRAY KUTIPAN
$quotes = [
    "Jangan takut error, itu bagian dari belajar.",
    "Ngoding itu proses, bukan hasil instan.",
    "Semakin sering mencoba, semakin cepat berkembang.",
    "Kesalahan adalah guru terbaik dalam coding."
];

// ambil quote random
$randomQuote = $quotes[array_rand($quotes)];

// ambil parameter GET
$key = $_GET['artikel'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Developer</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200 p-6">

<div class="max-w-5xl mx-auto bg-pink-50 p-6 rounded-2xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-pink-900">
        Blog Reflektif Developer
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- LIST ARTIKEL (GET) -->
        <div class="md:col-span-1 border-r border-pink-200 pr-4">
            <h3 class="font-semibold mb-3">Daftar Artikel</h3>

            <?php foreach ($artikel as $k => $a): ?>
                <a href="?artikel=<?= $k ?>"
                   class="block mb-2 text-pink-500 hover:underline">
                   • <?= $a['judul']; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- KONTEN DINAMIS -->
        <div class="md:col-span-2">

            <?php if ($key && isset($artikel[$key])): 
                $a = $artikel[$key];
            ?>

                <h3 class="text-xl font-bold"><?= $a['judul']; ?></h3>
                <p class="text-sm text-gray-500 mb-2"><?= $a['tanggal']; ?></p>

                <img src="<?= $a['gambar']; ?>" 
                     class="w-full max-w-md rounded mb-4">

                <p class="text-gray-700 mb-3"><?= $a['isi']; ?></p>

                <a href="<?= $a['link']; ?>" 
                   target="_blank"
                   class="text-pink-500 underline">
                   Referensi Tambahan
                </a>

            <?php else: ?>
                <p class="text-gray-500">Silakan pilih artikel untuk dibaca.</p>
            <?php endif; ?>

            <!-- KUTIPAN RANDOM -->
            <div class="mt-6 p-4 bg-pink-100 rounded-lg">
                <p class="italic text-gray-700">"<?= $randomQuote; ?>"</p>
            </div>

        </div>

    </div>

    <!-- NAVIGASI -->
    <div class="mt-6 flex gap-3">
        <a href="timeline.php"
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            ← Timeline
        </a>

        <a href="index.php"
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Profil
        </a>
    </div>

</div>

</body>
</html>