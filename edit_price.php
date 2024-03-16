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

    $day = $_GET['day'];
    $result = mysqli_query($conn, "SELECT * FROM `price` WHERE `day` = '$day'");

    while ($price_data = mysqli_fetch_array($result)) {
        $price = $price_data['price'];
        $name_day = $price_data['day'];
    }

    ?>
    <div class="container mt-3">

        <form method="post" action="proses_price.php">
            <h1>Edit Harga</h1>

            <input type="hidden" name="day" value="<?= $name_day ?>">

            <label class="mb-1">Harga</label>
            <input type="number" name="price" class="form-control w-50 enter mb-4" value="<?= $price ?>" required>

            <button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
        </form>

    </div>

</body>

</html>