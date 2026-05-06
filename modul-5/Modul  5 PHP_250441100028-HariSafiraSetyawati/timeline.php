<?php
// STRUKTUR DATA
$timeline = [
    ["tahun" => "2024", "judul" => "Pendaftaran Kuliah", "deskripsi" => "Mulai memilih jurusan dan mengisi formulir pendaftaran."],
    ["tahun" => "2025", "judul" => "Masuk Kuliah", "deskripsi" => "Mulai mengenal dunia IT dan pemrograman."],
    ["tahun" => "2025", "judul" => "Belajar Python", "deskripsi" => "Membuat project akhir bertema playlist musik."],
    ["tahun" => "2026", "judul" => "Belajar HTML & CSS", "deskripsi" => "Mulai styling dan membuat tampilan lebih menarik."],
    ["tahun" => "2026", "judul" => "Proyek Website Pertama", "deskripsi" => "Menyelesaikan project website sederhana."],
    ["tahun" => "2026", "judul" => "Belajar MySQL", "deskripsi" => "Membuat database sederhana."],
];

// FUNGSI KUSTOM UNTUK PENEKANAN
function highlightTahun($tahun) {
    if ($tahun == "2026") {
        return "text-pink-600 font-bold";
    }
    return "text-gray-700";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Timeline Belajar Coding</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-200 p-6">

<div class="max-w-3xl mx-auto bg-pink-50 p-6 rounded-2xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-pink-900">
        Timeline Perjalanan Belajar Coding
    </h2>

    <!-- VISUALISASI TIMELINE VERTIKAL -->
    <div class="relative border-l-4 border-pink-900 pl-6 space-y-6">

        <!-- PERULANGAN FOREACH -->
        <?php foreach ($timeline as $item): ?>
        <div class="relative">

            <!-- Titik di timeline -->
            <div class="absolute -left-3 top-1 w-5 h-5 bg-pink-900 rounded-full"></div>

            <!-- Konten -->
            <div class="ml-4">
                <p class="<?= highlightTahun($item['tahun']); ?>">
                    <?= $item['tahun']; ?>
                </p>

                <h3 class="text-lg font-semibold">
                    <?= $item['judul']; ?>
                </h3>

                <p class="text-gray-600">
                    <?= $item['deskripsi']; ?>
                </p>
            </div>

        </div>
        <?php endforeach; ?>

    </div>

    <!-- NAVIGASI -->
    <div class="mt-8 flex gap-3">
        <a href="index.php"
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            ← Kembali ke Profil
        </a>

        <a href="blog.php"
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Menuju Blog →
        </a>
    </div>

</div>

</body>
</html>