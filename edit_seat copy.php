<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Seat</title>
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

    $id_teater = $_GET['id'];
    $arr_seat = [];
    $sql1 = "SELECT * FROM seat WHERE id_teater = '$id_teater'";
    $seat = mysqli_query($conn, $sql1);

    foreach ($seat as $index2 => $st) {
        $arr_seat = $st['number_seat'];
    }
    $last_seat = $arr_seat;

    echo $last_seat;

    ?>
    <div class="container">

        <form method="post" action="proses_seat.php">
            <h1>Edit Seat</h1>
            <table>
                <?php
                foreach ($seat as $index2 => $st) : ?>
                    <?= $spasi = ($st['number_seat'] >= $last_seat) ? '<tr>' : '<td>' ?>
                    <input type="checkbox" class="btn-check" id="<?= $st['id_seat'] ?>" name="seat[]" value="<?= $st['variable_seat'] . $st['number_seat'] ?>">
                    <label class="btn <?= $st_seat = ($st['status_seat'] == 'Rusak') ? 'btn-outline-danger' : 'btn-outline-warning' ?>" for="<?= $st['id_seat'] ?>"><?= $st['variable_seat'] . $st['number_seat'] ?></label>
                    <?= $spasi = ($st['number_seat'] >= $last_seat) ? '</tr>' : '</td>' ?>
                <?php
                endforeach;
                ?>
            </table>
            <label for="" class="enter mt-4 mb-2">Keterangan</label>
            <select name="keterangan" class="form-select w-50 h-50 enter" style="height: 25px; width: 610px;">
                <option value="" class="bg-dark"></option>
                <option value="Rusak" class="bg-dark">Rusak</option>
                <option value="Tersedia" class="bg-dark">Tersedia</option>
                <option value="Delete" class="bg-dark">Delete</option>
                <option value="Tambah" class="bg-dark">Tambah</option>
            </select>
            <input type="hidden" name="id" id="" value="<?= $_GET['id'] ?>">

            <button type="submit" name="ubah" class="btn btn-warning enter mt-4">Ubah</button>
        </form>

    </div>

</body>

</html>