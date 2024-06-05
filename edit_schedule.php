<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Jadwal Film</title>
</head>

<body>
    <?php
    include "navbar.php";
    if ($_SESSION['id_role'] != 1) {
        echo "
             <script>
             window.location.href='login.php?pesan=kemana';
            </script>";
    }



    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM schedule WHERE id_schedule=$id");


    while ($schedule_data = mysqli_fetch_array($result)) {
        $day = $schedule_data['day'];
        $clock = $schedule_data['clock'];
        $id_film = $schedule_data['id_film'];
        $id_teater = $schedule_data['id_teater'];
        $date = $schedule_data['date'];
        $clock = substr($clock, 0, -3);
        $clock = substr($clock, 11);
    }

    $sql = $sql = "SELECT id_film,title FROM `Film` WHERE Berakhir >= '$date' AND tayang <= '$date'";
    $film = mysqli_query($conn, $sql);
    $films = mysqli_fetch_all($film);

    $sql = "SELECT * FROM `teater`";
    $teater = mysqli_query($conn, $sql);
    $teaters = mysqli_fetch_all($teater);


    ?>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Edit Jadwal</h1>
                <form method="post" action="proses_schedule.php" id="form-jadwal" class="mt-4">


                    <label for="" class="fs-6 mt-1 mb-1">Tanggal</label>
                    <input type="date" name="date" id="tanggal" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" value="<?= $date ?>" required>

                    <label for="" class="fs-6 mt-1 mb-1">Hari</label>
                    <input type="hari" name="hari" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary " id="input-hari" value="<?= $day ?>" readonly>

                    <label for="" class="fs-6 mt-1 mb-1">Jam</label>
                    <input type="time" name="jam" class="w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" value="<?= $clock ?>" required>

                    <label for="" class="fs-6 mt-1 mb-1">Film</label>
                    <select name="film" class="form-select w-50 h-50 enter mb-4 p-1" id="pilih_film" style="height: 25px; width: 610px;" required>
                        <option value="" class="bg-dark"></option>
                        <?php foreach ($films as $row) : ?>
                            <option value="<?= $row[0] ?>" class="bg-dark" <?= $cek_film = ($id_film == $row[0]) ? 'selected' : '' ?>><?= $row[1] ?></option>
                        <?php endforeach ?>
                    </select>

                    <label for="" class="fs-6 mt-1 mb-1">Teater</label>
                    <select name="teater" class="form-select w-50 h-50 enter mb-5 p-1" style="height: 25px; width: 610px;" required>
                        <option value="" class="bg-dark"></option>
                        <?php foreach ($teaters as $row) : ?>
                            <option value="<?= $row[0] ?>" class="bg-dark" <?= $cek_teater = ($id_teater == $row[0]) ? 'selected' : '' ?>><?= $row[1] ?></option>
                        <?php endforeach ?>
                    </select>

                    <input type="hidden" name="clock_lama" value="<?= $clock ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" name="ubah" class="btn btn-warning w-50 enter mt-4">Simpan</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        // Mendapatkan elemen input
        var input = document.getElementById('tanggal');

        const today = new Date().toISOString().split('T')[0];
        // Set nilai atribut 'max' dari input tanggal ke tanggal hari ini
        document.getElementById('tanggal').setAttribute('min', today);

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