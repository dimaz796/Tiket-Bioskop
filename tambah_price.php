<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Price</title>
</head>

<body>
    <?php
    include "navbar.php";
    $arr_day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    ?>
    <div class="container mt-3">
        <form method="post" action="proses_price.php" onsubmit="return validateForm()">
            <h1>Tambah Price</h1>
            <label class="mb-1">Hari</label>
            <select name="day" id="pilihan" class="form-select w-50 mb-4" aria-label="Default select example">
                <option class="bg-dark" value="">Silahkan Pilih Hari</option>
                <?php foreach ($arr_day as $day) : ?>
                    <option value="<?= $day ?>" class="bg-dark"><?= $day ?></option>
                <?php endforeach ?>
            </select>

            <label class="mb-1">Harga</label>
            <input type="number" name="price" class="form-control w-50 enter mb-4" placeholder=" Masukan Harga" required>
            <button type="submit" name="simpan" class="btn btn-warning w-50 ">Simpan</button>
        </form>

    </div>
    <script>
        function validateForm() {
            var selectBox = document.getElementById("pilihan");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue == "") {
                alert("Pilih Hari Terlebih Dahulu");
                return false; // Formulir tidak akan disubmit
            }
            return true; // Formulir akan disubmit
        }
    </script>
</body>

</html>