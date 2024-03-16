<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Jadwal Film</title>
</head>

<body>
    <?php
    include "navbar.php";
    include "conn.php";

    // Jika tidak ada input dari JavaScript, jalankan query seperti biasa
    $sql = "SELECT id_film,title FROM `Film` WHERE status_film = 'Berlangsung' AND tayang <= CURDATE()";
    $film = mysqli_query($conn, $sql);
    $films = mysqli_fetch_all($film);


    $sql = "SELECT * FROM `teater`";
    $teater = mysqli_query($conn, $sql);
    $teaters = mysqli_fetch_all($teater);

    $arr_day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    ?>
    <div class="container mt-3">
        <form method="post" action="proses_schedule.php" id="form-jadwal" class="mt-4">
            <h1>Tambah Jadwal</h1>

            <label for="" class="fs-6 mt-1 mb-1">Tanggal</label>
            <input type="date" name="date" id="tanggal" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" required>

            <label for="" class="fs-6 mt-1 mb-1">Hari</label>
            <input type="hari" name="hari" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary " id="input-hari" readonly>

            <label for="" class="fs-6 mt-1 mb-1">Jam</label>
            <input type="time" name="jam" class="w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" required>

            <label for="" class="fs-6 mt-1 mb-1">Film</label>
            <select name="film" class="form-select w-50 h-50 enter mb-4 p-1" id="pilih_film" style="height: 25px; width: 610px;" required>
                <option value="" class="bg-dark"></option>
                <?php foreach ($films as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark"><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <label for="" class="fs-6 mt-1 mb-1">Teater</label>
            <select name="teater" class="form-select w-50 h-50 enter mb-5 p-1" style="height: 25px; width: 610px;" required>
                <option value="" class="bg-dark"></option>
                <?php foreach ($teaters as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark"><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit" name="simpan" class="btn btn-warning w-50 enter mt-4">Simpan</button>
        </form>

    </div>
    <script>
        // Mendapatkan elemen input
        var input = document.getElementById('tanggal');

        // Menambahkan event listener untuk input
        input.addEventListener('input', function() {
            // Mendapatkan nilai yang dimasukkan pengguna
            var tanggalvalue = input.value;
            // Buat objek Date dari nilai tanggal
            var dateObj = new Date(tanggalvalue);

            // Dapatkan indeks hari (0 untuk Minggu, 1 untuk Senin, dst)
            var dayIndex = dateObj.getDay();

            // Array nama hari
            var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            // Dapatkan nama hari dari array menggunakan indeks
            var dayName = days[dayIndex];


            // Menampilkan nilai yang dimasukkan pengguna
            document.getElementById('input-hari').value = dayName;
            var xhr = new XMLHttpRequest();

            // Ekseskusi Ajax
            xhr.open('GET', 'ajax_schedule.php?tanggal=' + tanggalvalue, true);

            xhr.send();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    pilih_film.innerHTML = xhr.responseText;
                }
            };

        });
    </script>
</body>

</html>