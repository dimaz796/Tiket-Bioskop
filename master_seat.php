<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kursi</title>
    <?php
    include "assets/Link_bootstrap/link_bootstrap.php";
    ?>
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
    include "conn.php";
    ?>

    <div class="main">
        <div class="container">
            <h1>Data Kursi</h1>

            <div class="mb-3">
                <a class="btn btn-warning" href="tambah_seat.php"><i class="bi bi-person-add"></i>Tambah Data Kursi</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <table id="example" class='table table-bordered table-striped table-hover'>
                        <thead>
                            <tr>
                                <th>ID Teater</th>
                                <th>Seat</th>
                                <th style="width: 170px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT a.id_teater, a.name_teater FROM teater a JOIN seat b ON a.id_teater=b.id_teater GROUP BY a.id_teater";
                            $teaters = mysqli_query($conn, $sql);
                            foreach ($teaters as $index => $teater) {
                            ?>
                                <tr>
                                    <td><?= $teater['name_teater']; ?></td>
                                    <td>
                                        <?php
                                        $id_teater = $teater['id_teater'];
                                        $sql1 = "SELECT * FROM seat WHERE id_teater = '$id_teater'";
                                        $seat = mysqli_query($conn, $sql1);
                                        foreach ($seat as $index2 => $st) { ?>
                                            <label class="<?= ($st['status_seat'] == 'Rusak') ? 'text-danger' : 'text-dark' ?>"><?= $st['variable_seat'] . $st['number_seat'] . ($index2 == $index2 - 1 ? "" : ", ") ?></label>
                                        <?php }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <a href="edit_seat.php?id=<?= $teater['id_teater'] ?>">
                                            <button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button>
                                        </a> |
                                        <a href="proses_seat.php?id=<?= $teater['id_teater'] ?>&keterangan=hapus" onclick="return konfirmasiHapus()">
                                            <button class="btn btn-warning"><i class="bi bi-trash3"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
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
            var agree = confirm("Apakah Anda yakin ingin menghapus Semua Kursi Di Teater Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>