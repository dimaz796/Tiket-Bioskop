<?php
include "navbar.php";

if ($_SESSION['id_role'] != 1) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}

function encrypt($string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '23432MLKJSDF0L2934897@00001';
    $secret_iv = 'X0000W9876H5982@7676765';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

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
                        <td>
                            <?php
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
                            <div class="bg-<?= $status ?> text-center rounded-2 d-flex"><small class="p-1"><?= $row['status_order']; ?></small></div>
                        </td>
                        <td align="center">
                            <a href="detail_order.php?id_order=<?= encrypt($row['id_order'])  ?>">
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