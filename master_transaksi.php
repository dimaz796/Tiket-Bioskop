<?php
include "navbar.php";
$id_user = $_SESSION['id_user'];

$sql = "SELECT film.title,order.id_order,order.date,user.nama_user,user.id_user,schedule.clock,teater.name_teater,order.status_order,order.total,trx.trx FROM `order`
INNER JOIN trx 
ON trx.id_order = order.id_order
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



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "assets/Link_bootstrap/link_bootstrap.php" ?>
    <title>Data Riwayat Transaksi</title>

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
                        <th>Nomor</th>
                        <th>kode transaksi</th>
                        <th>Judul film</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Jam</th>
                        <th>Teater</th>
                        <th>Atas Nama</th>
                        <th>Total</th>
                        <th>Status</th>
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
                        <td>
                            <?php
                            // include "assets/qr_code/qr_code/qrlib.php";
                            // $tempdir = "img-qrcode/";
                            // if (!file_exists($tempdir)) {
                            //     mkdir($tempdir, 0755);
                            // $date = str_replace("-", "", $row['date']);
                            // $kode = "1933" . $date . $row['id_user'] . $row['id_order'];
                            //     $file_name = "trx" . $row['id_order'] . ".png";
                            //     $file_path = $tempdir . $file_name;

                            //     QRcode::png($kode, $file_path, "H", 6, 6);
                            //     echo "<img src='" . $file_path . "'>";
                            // }
                            // echo $kode;
                            // require_once("assets/phpqrcode/qrlib.php");
                            // QRcode::png("$kode", "trx" . ($row['id_order']) . ".png", "M", 2, 2);
                            echo $row['trx'];
                            ?>
                        </td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['clock']; ?></td>
                        <td><?= $row['name_teater']; ?></td>
                        <td><?= $row['nama_user']; ?></td>
                        <td>Rp. <?= number_format($row['total']); ?></td>
                        <td>
                            <div class="bg-<?= $status ?> text-center rounded-2"><?= $row['status_order']; ?></div>
                        </td>
                        <td align="center">
                            <a href="detail_order.php?id_order=<?= $row['id_order'] ?>">
                                <button class="btn btn-primary"><i class="bi bi-journal-text"></i></button>
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

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus Transaksi Ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>