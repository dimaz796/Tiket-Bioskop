<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit price</title>
</head>

<body>
    <?php
    include "navbar.php";
    // if ($_SESSION['id_price'] != 1) {
    //     echo "
    //          <script>
    //             window.location.href='login.php';
    //         </script>";
    // }

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `price` WHERE id_price=$id");

    while ($price_data = mysqli_fetch_array($result)) {
        $price = $price_data['price'];
        $id_price = $price_data['id_price'];
        $name_day = $price_data['name_day'];
    }
    $arr_day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];


    ?>
    <div class="container mt-3">

        <form method="post" action="proses_price.php">
            <h1>Edit Harga</h1>

            <label class="mb-1">Hari</label>
            <select name="day" id="" class="form-select w-50 mb-4" aria-label="Default select example">
                <option class="bg-dark">Silahkan Pilih Hari</option>
                <?php foreach ($arr_day as $day) : ?>
                    <option value="<?= $day ?>" class="bg-dark" <?= ($name_day == $day) ? 'selected' : '' ?>><?= $day ?></option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="id_price" value="<?= $id_price ?>">
            <input type="hidden" name="day_lama" value="<?= $name_day ?>">

            <label class="mb-1">Harga</label>
            <input type="number" name="price" class="form-control w-50 enter mb-4" value="<?= $price ?>" required>

            <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
        </form>

    </div>

</body>

</html>