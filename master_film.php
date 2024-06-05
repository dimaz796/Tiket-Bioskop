<?php
include "navbar.php";
if ($_SESSION['id_role'] != 1) {
    echo "
         <script>
			window.location.href='login.php?pesan=kemana';
		</script>";
}
?>
<?php


$sql = "SELECT * FROM `film`
ORDER BY id_film ASC
";
$querry = mysqli_query($conn, $sql);

foreach ($querry as $isi) {
    $id_film = $isi['id_film'];
    $tayang = $isi['tayang'];
    $berakhir = $isi['berakhir'];
    if (date("Y-m-d") < $tayang) {
        $status = "Akan Datang";
    } elseif (date("Y-m-d") > $berakhir) {
        $status = "Berakhir";
    } else {
        $status = "Berlangsung";
    }
    $sql = "UPDATE `film` SET `status_film` = '$status' WHERE `film`.`id_film` = $id_film;";
    $upt_film = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Film</title>
    <?php
    include "assets/Link_bootstrap/link_bootstrap.php";
    ?>
</head>

<body>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Data Film</h1>

                <div class="mb-4 mt-4">
                    <a class="btn btn-warning fw-semibold me-auto" href="tambah_film.php"><i class="bi bi-person-add text-black me-1"></i>Tambah Data Film</a>
                </div>

                <table id="example" class="table table-bordered table-striped table-hover " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Film</th>
                            <th>Judul film</th>

                            <th>Di Buat</th>
                            <th>Di Perbaharui</th>
                            <th>Tayang</th>
                            <th>Berakhir</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($querry as $index => $row) { ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['created_at']; ?></td>
                            <td><?= $row['update_at']; ?></td>
                            <td><?= $row['tayang']; ?></td>
                            <td><?= $row['berakhir']; ?></td>
                            <td><?= $row['status_film']; ?></td>
                            <td align="center" style="width: 15%;">

                                <a href="film_detail.php?id=<?= $row['id_film'] ?>">
                                    <button class="btn btn-dark"><i class="bi bi-journal-text"></i></button>
                                </a>
                                <a href="edit_film.php?id=<?= $row['id_film'] ?>">
                                    <button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button>
                                </a>
                                <a href="proses_film.php?id=<?= $row['id_film'] ?>" onclick="return konfirmasiHapus()">
                                    <button class="btn btn-warning"><i class="bi bi-trash3"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
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
            var agree = confirm("Apakah Anda yakin ingin menghapus Film Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>