<?php
include "navbar.php";
if ($_SESSION['id_role'] != 1) {
    echo "
         <script>
			window.location.href='login.php?pesan=kemana';
		</script>";
}

$sql = "SELECT * FROM `schedule`
INNER JOIN film 
ON film.id_film = schedule.id_film
INNER JOIN teater 
ON teater.id_teater = schedule.id_teater 
order by id_schedule ASC";

$querry = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Jadwal</title>
    <?php
    include "assets/Link_bootstrap/link_bootstrap.php";
    ?>
</head>

<body>
    <div class="container">

        <h1>Data Jadwal</h1>

        <div class="mb-3">
            <a class="btn btn-warning" href="tambah_schedule.php"><i class="bi bi-person-add"></i>Tambah Data Jadwal</a>
        </div>

        <table id="example" class="table table-bordered table-striped table-hover mb-5" style="width:100%">
            <thead>
                <tr>
                    <th>ID Jadwal</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhri</th>
                    <th>Harga</th>
                    <th>Film</th>
                    <th>Teater</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            foreach ($querry as $index => $row) { ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['day']; ?></td>
                    <td><?= $row['clock']; ?></td>
                    <td><?= $row['clock_end']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['name_teater']; ?></td>
                    <td align="center">
                        <div class="d-flex gap-2">
                            <a href="edit_schedule.php?id=<?= $row['id_schedule'] ?>">
                                <button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="proses_schedule.php?id=<?= $row['id_schedule'] ?>" onclick="return konfirmasiHapus()">
                                <button class=" btn btn-warning"><i class="bi bi-trash3"></i></button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus Jadwal Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>