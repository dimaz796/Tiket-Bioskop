<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Laporan</title>
</head>

<body>
    <div class="container mt-3">

        <?php
        $grand_total = 0;
        if (isset($_POST['lihat'])) {
            include "navbar.php";
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];

            if ($tanggal_awal > $tanggal_akhir) {
                echo "
                <script>
                        alert('Tanggal Tidak Sah');
                        window.location.href='laporan_mingguan.php';
                </script>";
                die;
            }
            $sql = "
                SELECT 
                    `order`.`date`, 
                    GROUP_CONCAT(DISTINCT `teater`.`name_teater` ORDER BY `teater`.`name_teater` SEPARATOR ',') AS teater_names, 
                    SUM(`order`.`Total`) AS total_sum
                FROM 
                    `order`
                JOIN 
                    `schedule` ON `order`.`id_schedule` = `schedule`.`id_schedule`
                JOIN 
                    `teater` ON `schedule`.`id_teater` = `teater`.`id_teater`
                WHERE 
                    `order`.`date` BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY 
                    `order`.`date`
                ORDER BY 
                    `order`.`date` ASC;
            ";
            $data_hasil_order = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($data_hasil_order);

        ?>
            <div class="card bg-dark ">
                <div class="card-body bg-dark rounded p-4">
                    <h3 class="text-light">Laporan Tanggal : <?= htmlspecialchars($tanggal_awal) ?> - <?= htmlspecialchars($tanggal_akhir) ?></h3>
                    <table class="table table-hover">
                        <tr class="table-dark">
                            <td>No</td>
                            <td>Tanggal Order</td>
                            <td>Teater</td>
                            <td>Total </td>
                            <td>Detail </td>
                        </tr>

                        <?php
                        if ($count < 1) {
                            echo "<tr>
                            <td colspan='4'><h4 class='text-center pt-2'>Tidak Ada Data Di Tanggal Tersebut</h4></td>
                            </tr>";
                        } else {
                            $i = 0;
                            while ($isi = mysqli_fetch_assoc($data_hasil_order)) {
                                $i++;
                                $grand_total += $isi['total_sum'];
                        ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= htmlspecialchars($isi['date']) ?></td>
                                    <td><?= htmlspecialchars($isi['teater_names']) ?></td>
                                    <td>Rp. <?= number_format($isi['total_sum'])  ?></td>
                                    <td><a href="detail_laporan.php?teater_names=<?= $isi['teater_names'] ?>&tanggal=<?= $isi['date'] ?>"><button class="btn btn-dark"><i class="bi bi-pencil-square"></i></button></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr class="table-dark">
                                <td colspan="3" class="fw-bold">Total Keseluruhan</td>
                                <td><label class="fw-bold">Rp. <?= number_format($grand_total) ?></label></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        <?php } ?>

        <?php
        // Cetak
        if (isset($_POST['cetak'])) {
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            include "assets/Link_bootstrap/link_bootstrap.php";
            include "conn.php";
            session_start();

            if ($tanggal_awal > $tanggal_akhir) {
                echo "
                <script>
                        alert('Tanggal Tidak Sah');
                        window.location.href='laporan_mingguan.php';
                </script>";
                die;
            }

            $sql = "
                SELECT 
                    `order`.`date`, 
                    GROUP_CONCAT(DISTINCT `teater`.`name_teater` ORDER BY `teater`.`name_teater` SEPARATOR ', ') AS teater_names, 
                    SUM(`order`.`Total`) AS total_sum
                FROM 
                    `order`
                JOIN 
                    `schedule` ON `order`.`id_schedule` = `schedule`.`id_schedule`
                JOIN 
                    `teater` ON `schedule`.`id_teater` = `teater`.`id_teater`
                WHERE 
                    `order`.`date` BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY 
                    `order`.`date`
                ORDER BY 
                    `order`.`date` ASC;
            ";
            $data_hasil_order = mysqli_query($conn, $sql);
            $count_hasil = mysqli_num_rows($data_hasil_order);

            if ($count_hasil < 1) {
                echo "
                <script>
                        alert('Tidak Ada Transaksi di Tanggal $tanggal_awal - $tanggal_akhir');
                        window.location.href='laporan_mingguan.php';
                </script>";
                die;
            }
        ?>

            <center>
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3 class="text-center">Laporan Bioskop MOVI3</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3 class="text-center">Dari Tanggal : <?= htmlspecialchars($tanggal_awal) ?> - <?= htmlspecialchars($tanggal_akhir) ?></h3>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <table class="table w-75 table-striped">
                                    <tr class="table-dark">
                                        <td>No</td>
                                        <td>Tanggal Order</td>
                                        <td>Teater</td>
                                        <td>Total </td>
                                    </tr>

                                    <?php
                                    $i = 0;
                                    while ($isi = mysqli_fetch_assoc($data_hasil_order)) {
                                        $i++;
                                        $grand_total += $isi['total_sum'];
                                    ?>

                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= htmlspecialchars($isi['date']) ?></td>
                                            <td><?= htmlspecialchars($isi['teater_names']) ?></td>
                                            <td>Rp. <?= number_format($isi['total_sum'])  ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="table-dark">
                                        <td colspan="3" class="fw-bold">Total Keseluruhan</td>
                                        <td><label class="fw-bold">Rp. <?= number_format($grand_total) ?></label></td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="container">
                                <div class="text-center">Manager</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <br>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <hr class="w-25">
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <?= htmlspecialchars($_SESSION['nama_user']) ?>
                            </center>
                        </td>
                    </tr>
                </table>
            </center>
            <script>
                // window.onload = function() {
                window.print();
                // }
            </script>

        <?php } ?>

    </div>
</body>

</html>