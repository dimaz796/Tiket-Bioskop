<?php
include "navbar.php";
if ((!isset($_SESSION['id_role'])) || ($_SESSION['id_role'] == 3) || ($_SESSION['id_role'] == 4)) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}
$id_user = $_SESSION['id_user'];

$sql = "SELECT film.title,order.id_order,order.date,user.nama_user,schedule.clock,teater.name_teater,order.status_order,order.total FROM `order`
INNER JOIN schedule 
ON schedule.id_schedule = order.id_schedule
INNER JOIN user 
ON user.id_user = order.id_user
INNER JOIN teater 
ON teater.id_teater = order.id_teater
INNER JOIN film 
ON film.id_film = schedule.id_film
WHERE order.status_order = 'Sudah Di Bayar'
ORDER BY id_order ASC 
";
$querry = mysqli_query($conn, $sql);
$count = mysqli_num_rows($querry);

$total = 0;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Riwayat Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Xf3Hc5v04gJprXDWb0sRfJotWItgAxjGDD0C5ib/2lhoAweRr+m3N5wPUZjpjwnX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container pt-4">
        <?php
        if ($count == 0) {
            echo "<h1>Tidak Ada Riwayat Transaksi</h1>
        <label>Silahkan Order Terlebih Dahulu <a href='index.php'>Klik Disini</a></label>
        ";
        } else {
        ?>

            <h1>Riwayat Transaksi</h1>

            <table id="example" class="table table-bordered table-striped table-hover mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Judul film</th>
                        <th>Order Tanggal</th>
                        <th>Jam</th>
                        <th>Teater</th>
                        <th>Atas Nama</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                foreach ($querry as $index => $row) {
                    if ($row['status_order'] == 'Belum Bayar') {
                        $status = 'danger';
                    } else {
                        $status = 'success';
                    } ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['clock']; ?></td>
                        <td><?= $row['name_teater']; ?></td>
                        <td><?= $row['nama_user']; ?></td>
                        <td>Rp. <?= number_format($row['total']);
                                $total += $row['total']; ?></td>
                        <td align="center">

                            <a href="trx.php?id_order=<?= $row['id_order'] ?>&total=<?= $row['total'] ?>">
                                <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="detail_order.php?id_order=<?= $row['id_order'] ?>">
                                <button class="btn btn-dark"><i class="bi bi-journal-text"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>