<?php
include "navbar.php";
if ($_SESSION['id_role'] != 4) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
}
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM transaksi_topup 
        INNER JOIN user ON transaksi_topup.id_user=user.id_user
        WHERE user.id_user = '$id_user' ORDER BY transaksi_topup.`date` ASC;
";
$querry = mysqli_query($conn, $sql);
$count = mysqli_num_rows($querry);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Xf3Hc5v04gJprXDWb0sRfJotWItgAxjGDD0C5ib/2lhoAweRr+m3N5wPUZjpjwnX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php
        if ($count == 0) {
            echo "<h1 class='mt-4'>Tidak Ada Transaksi Topup</h1>
        <label>Anda Belum Melakukan Topup <a href='isi_saldo.php'>Klik Untuk Topup</a></label>
        ";
        } else {
        ?>
            <div class="container mt-3">
                <div class="card bg-dark ">
                    <div class="card-body bg-dark rounded p-4">
                        <h1 class="text-light">Riwayat Transaksi Topup</h1>

                        <div class="mb-3 mt-4">


                            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Transaksi</th>
                                        <th>Nama User</th>
                                        <th>Waktu Pembayaran</th>
                                        <th>Total Topup</th>
                                        <th>Status Topup</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <?php
                                foreach ($querry as $index => $row) {
                                    if ($row['status_topup'] == 'Menunggu Pembayaran') {
                                        $status = 'danger';
                                    } elseif ($row['status_topup'] == 'Menunggu Persetujuan Admin') {
                                        $status = 'primary';
                                    } elseif ($row['status_topup'] == 'Transaksi Berhasil') {
                                        $status = 'success';
                                    } elseif ($row['status_topup'] == 'Kirim Bukti Pembayaran') {
                                        $status = 'warning text-dark';
                                    } elseif ($row['status_topup'] == 'Transaksi Gagal') {
                                        $status = 'danger';
                                    }
                                    $id_topup = $row['id_topup'];
                                ?>
                                    <tr>
                                        <td><?= $row['id_topup']; ?></td>
                                        <td><?= $row['nama_user']; ?></td>
                                        <td><?= $row['date']; ?></td>
                                        <td>Rp. <?= number_format($row['total_topup']); ?></td>
                                        <td>
                                            <div class="bg-<?= $status ?> text-center rounded-2"><?= $row['status_topup']; ?></div>
                                        </td>
                                        <td align="center">
                                            <?php if ($row['status_topup'] == "Menunggu Pembayaran") { ?>
                                                <a href="bayar_topup.php?id_topup=<?= $row['id_topup'] ?>&total=<?= $row['total_topup'] ?>">
                                                    <button class="btn btn-success"><i class="bi bi-credit-card"></i></button>
                                                </a>
                                                <a href="proses_topup.php?id_topup=<?= $row['id_topup'] ?>&status=hapus">
                                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </a>
                                            <?php } elseif ($row['status_topup'] == "Menunggu Persetujuan Admin") { ?>
                                                <a href="detail_bukti_pembayaran.php?id_topup=<?= $row['id_topup'] ?>&total=<?= $row['total_topup'] ?>">
                                                    <button class="btn btn-primary"><i class="bi bi-credit-card"></i></button>
                                                </a>
                                            <?php } elseif ($row['status_topup'] == "Transaksi Berhasil") { ?>
                                                <a href="detail_bukti_pembayaran.php?id_topup=<?= $row['id_topup'] ?>">
                                                    <button class="btn btn-dark"><i class="bi bi-journal-text"></i></button>
                                                </a>
                                            <?php } elseif ($row['status_topup'] == "Kirim Bukti Pembayaran") { ?>
                                                <a href="bukti_pembayaran.php?id_topup=<?= $row['id_topup'] ?>&total=<?= $row['total_topup'] ?>">
                                                    <button class="btn btn-warning"><i class="bi bi-file-earmark-image"></i></button>
                                                </a>
                                                <a href="struk_topup.php?id_topup=<?= $row['id_topup'] ?>&total=<?= $row['total_topup'] ?>">
                                                    <button class="btn btn-primary"><i class="bi bi-archive"></i></button>
                                                </a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
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
            </script>

</body>

</html>