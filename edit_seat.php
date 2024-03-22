<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kursi</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }
    </style>
    <?php
    include "navbar.php";
    if ($_SESSION['id_role'] != 1) {
        echo "
             <script>
             window.location.href='login.php?pesan=kemana';
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
    <div class="container mt-3">

        <form method="post" action="proses_seat.php" id="myForm">
            <h1>Edit Seat</h1>
            <table>
                <?php
                foreach ($seat as $index2 => $st) :
                    $isi = '';
                    $id_seat = $st['id_seat'];
                    $value = $st['variable_seat'] . $st['number_seat'];
                    $isi .= "<input type='checkbox' class='btn-check' id='$id_seat' name='seat[]' value='$value' selected>";

                    $status_seat = ($st['status_seat'] == 'Rusak') ? 'btn-outline-danger' : 'btn-outline-warning';
                    $isi .= "<label class='btn $status_seat label' for='$id_seat'>$value</label>";

                    if ($st['number_seat'] == 1) {
                        echo "<tr>
                        <td>
                        $isi
                        </td>";
                    } else if ($st['number_seat'] == $last_seat) {
                        echo "<td>$isi</td></tr>";
                    } else {
                        echo "<td>$isi</td>";
                    }
                endforeach;
                ?>
            </table>
            <label for="" class="enter mt-4 mb-2">Keterangan</label>
            <select name="keterangan" class="form-select w-50 h-50 enter" style="height: 25px; width: 610px;" required>
                <option value="" class="bg-dark"></option>
                <option value="Rusak" class="bg-dark">Rusak</option>
                <option value="Tersedia" class="bg-dark">Tersedia</option>
            </select>
            <input type="hidden" name="id" id="" value="<?= $_GET['id'] ?>">

            <button type="submit" name="ubah" class="btn btn-warning enter mt-4 w-50">Ubah</button>
        </form>

    </div>
    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            var checkboxes = document.querySelectorAll("input[type='checkbox']");
            var checked = false;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checked = true;
                }
            });
            if (!checked) {
                alert("Jika Ingin Merubah Keterangan Kursi,Pilih Minimal 1 Kursi!");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>