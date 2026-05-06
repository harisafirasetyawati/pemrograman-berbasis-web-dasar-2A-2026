<?php
function tampilkanData($data) {
    echo "<div class='overflow-x-auto'>";
    echo "<table class='min-w-full border border-gray-300'>";
    foreach ($data as $key => $value) {
        echo "<tr class='border-b'>
                <td class='p-2 font-semibold bg-gray-100'>$key</td>
                <td class='p-2'>$value</td>
              </tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profil Developer</title>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-pink-200 p-6">

<div class="max-w-4xl mx-auto space-y-6">

    <!-- PROFIL -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-xl font-bold mb-4 text-gray-700">
            Profil Interaktif Developer Pemula
        </h2>

        <table class="w-full border border-gray-300">
            <tr class="border-b"><td class="p-2 font-semibold">Nama</td><td class="p-2">Hari Safira Setyawati</td></tr>
            <tr class="border-b"><td class="p-2 font-semibold">ID Developer</td><td class="p-2">DEV001</td></tr>
            <tr class="border-b"><td class="p-2 font-semibold">Kota/Tgl Lahir</td><td class="p-2">Sidoarjo, 26 Februari 2007</td></tr>
            <tr class="border-b"><td class="p-2 font-semibold">Email</td><td class="p-2">harisafirasetyawati@email.com</td></tr>
            <tr><td class="p-2 font-semibold">No. WhatsApp</td><td class="p-2">085234024694</td></tr>
        </table>
    </div>

    <!-- FORM -->
    <div class="bg-pink-50 p-6 rounded-2xl shadow">
        <h2 class="text-xl font-bold mb-4 text-pink-900">Form Profil Developer</h2>

        <form method="POST" class="space-y-4">

            <div>
                <label class="block font-semibold">Framework/Tools</label>
                <input type="text" name="framework"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-amber-300"
                placeholder="Laravel, React, NodeJS">
            </div>

            <div>
                <label class="block font-semibold">Pengalaman</label>
                <textarea name="pengalaman"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-amber-300"></textarea>
            </div>

            <div>
                <label class="block font-semibold">Tools Penunjang</label>
                <div class="flex gap-4 mt-2">
                    <label><input type="checkbox" name="tools[]" value="VS Code"> VS Code</label>
                    <label><input type="checkbox" name="tools[]" value="GitHub"> GitHub</label>
                    <label><input type="checkbox" name="tools[]" value="Figma"> Figma</label>
                    <label><input type="checkbox" name="tools[]" value="Postman"> Postman</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">Minat Bidang</label>
                <div class="flex gap-4 mt-2">
                    <label><input type="radio" name="minat" value="Frontend"> Frontend</label>
                    <label><input type="radio" name="minat" value="Backend"> Backend</label>
                    <label><input type="radio" name="minat" value="Fullstack"> Fullstack</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">Tingkat Skill</label>
                <select name="skill"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-amber-300">
                    <option value="">--Pilih--</option>
                    <option value="Dasar">Dasar</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Profesional">Profesional</option>
                </select>
            </div>

            <button type="submit" name="submit"
            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                Kirim
            </button>

        </form>
    </div>

    <!-- OUTPUT -->
    <div class="bg-pink-50 p-6 rounded-2xl shadow">
<?php
if (isset($_POST['submit'])) {

    $framework = $_POST['framework'];
    $pengalaman = $_POST['pengalaman'];
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'] ?? '';
    $skill = $_POST['skill'];

    // VALIDASI
    if ($framework == "" || $pengalaman == "" || empty($tools) || $minat == "" || $skill == "") {
        echo "<p class='text-red-500 font-semibold'>Semua input wajib diisi!</p>";
    } else {

        // memecah framework
        $frameworkArray = explode(",", $framework);

        // gabung tools
        $toolsList = implode(", ", $tools);

        $data = [
            "Framework/Tools" => implode(", ", $frameworkArray),
            "Tools Penunjang" => $toolsList,
            "Minat Bidang" => $minat,
            "Skill Level" => $skill
        ];

        echo "<h3 class='text-lg font-bold mb-2'>Hasil Input</h3>";

        tampilkanData($data);

        // kondisi tambahan
        if (count($frameworkArray) > 2) {
            echo "<p class='text-green-600 font-semibold mt-3'>
            Skill Anda cukup luas di bidang development!
            </p>";
        }

        echo "<h3 class='text-lg font-bold mt-4'>Pengalaman</h3>";
        echo "<p class='text-gray-700'>$pengalaman</p>";
    }
}
?>
    </div>

<a href="timeline.php" class="bg-green-500 text-white px-4 py-2 rounded inline-block">
Ke Timeline →
</a>
</div>

</body>
</html>