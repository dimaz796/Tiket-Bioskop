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
                window.location.href='login.php';
            </script>";
    }

    $sql = "SELECT * FROM `film` WHERE status_film != 'Berakhir' AND tayang <= CURDATE()";
    $film = mysqli_query($conn, $sql);
    $films = mysqli_fetch_all($film);

    $sql = "SELECT * FROM `teater`";
    $teater = mysqli_query($conn, $sql);
    $teaters = mysqli_fetch_all($teater);

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


    ?>
    <div class="container mt-3">

        <form method="post" action="proses_schedule.php">
            <h1>Edit Jadwal</h1>

            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="" class="fs-6 mt-1 mb-1">Tanggal</label>
            <input type="date" name="date" id="tanggal" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" value="<?= $date ?>" required>

            <label for="" class="fs-6 mt-1 mb-1">Hari</label>
            <input type="hari" name="hari" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary " id="input-hari" readonly>

            <label for="" class="fs-6 mt-1 mb-1">Jam</label>
            <input type="time" name="jam" class="w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" value="<?= $clock ?>">

            <label for="" class="fs-6 mt-1 mb-1">Film</label>
            <select name="film" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;" required>
                <?php foreach ($films as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark" <?= $cek_film = ($id_film == $row[0]) ? 'selected' : '' ?>><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <label for="" class="fs-6 mt-1 mb-1">Teater</label>
            <select name="teater" class="form-select w-50 h-50 enter mb-4 p-1" style="height: 25px; width: 610px;" required>
                <?php foreach ($teaters as $row) : ?>
                    <option value="<?= $row[0] ?>" class="bg-dark" <?= $cek_teater = ($id_teater == $row[0]) ? 'selected' : '' ?>><?= $row[1] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
        </form>


    </div>
    <script>
        // Mendapatkan elemen input
        var dayValue = '<?= $day ?>';
        input = document.getElementById('tanggal');
        if (input) {
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
            });
        }
        document.getElementById('input-hari').value = dayValue;
    </script>
</body>

</html>