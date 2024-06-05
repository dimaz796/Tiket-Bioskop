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
            $tanggal = $_POST['tanggal'];

            $sql = "SELECT * FROM `order` 
                        JOIN `user` ON `order`.id_user = `user`.id_user 
                        JOIN `schedule` ON `order`.id_schedule = `schedule`.id_schedule 
                        JOIN `teater` ON `teater`.id_teater = `schedule`.id_teater 
                            WHERE `order`.date = '$tanggal';";
            $hasil_order = mysqli_query($conn, $sql); 
            $count = mysqli_num_rows($hasil_order);
            ?>
            
            <div class="card bg-dark ">
                <div class="card-body bg-dark rounded p-4">

                    <h3 class="text-light">Laporan Tanggal : <?= $tanggal ?></h3>
                    <table class="table table-hover">

                        <tr class="table-dark">
                            <td>No</td>
                            <td>Teater</td>
                            <td>Nama</td>
                            <td>Jumlah Tiket</td>
                            <td>Total Uang</td>
                        </tr>
                <?php if ($count < 1) {
                    echo "<tr>
                    <td colspan='5'><h4  class='text-center pt-2'>Tidak Ada Data Di Tanggal Tersebut</h4></td>
                    </tr>"; 
                }else{?>


                        <?php
                        foreach ($hasil_order as $row => $value) {
                            $total = $value['Total'];
                            $grand_total += $total;
                        ?>

                            <tr>
                                <td><?= $row + 1 ?></td>
                                <td><?= $value['name_teater'] ?></td>
                                <td><?= $value['nama_user'] ?></td>
                                <td><?= $value['Total'] / $value['price'] ?></td>
                                <td>Rp. <?= number_format($value['Total']) ?></td>
                            </tr>
                        <?php }
                        ?>
                        <tr class="table-dark">
                            <td colspan="4" class="fw-bold">Total Keseluhuran</td>

                            <td><label class="fw-bold ">Rp.<?= number_format($grand_total) ?></label></td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        <?php } elseif (isset($_POST['cetak'])) {
            $tanggal = $_POST['tanggal'];
            include "assets/Link_bootstrap/link_bootstrap.php";
            include "conn.php";
            session_start();


            $sql = "SELECT * FROM `order` 
            JOIN `user` ON `order`.id_user = `user`.id_user 
            JOIN `schedule` ON `order`.id_schedule = `schedule`.id_schedule 
            JOIN `teater` ON `teater`.id_teater = `schedule`.id_teater 
                WHERE `order`.date = '$tanggal';";
            $hasil_order = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($hasil_order);
            if ($count < 1) {
                echo "
                <script>
                        alert('Tidak Ada Transaksi di Tanggal $tanggal');
                        window.location.href='laporan_harian.php';
                </script>";
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
                            <h3 class="text-center">Laporan Harian Bioskop MOVI3</h3>
                        </th>

                    </tr>
                    <tr>
                        <th>
                            <h3 class="text-center">Tanggal <?= $tanggal ?></h3>
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
                                        <td>Teater</td>
                                        <td>Nama</td>
                                        <td>Jumlah Tiket</td>
                                        <td>Total Uang</td>
                                    </tr>

                                    <?php
                                    
                                    foreach ($hasil_order as $row => $value) {
                                        $total = $value['Total'];
                                        $grand_total += $total;
                                    ?>

                                        <tr>
                                            <td><?= $row + 1 ?></td>
                                            <td><?= $value['name_teater'] ?></td>
                                            <td><?= $value['nama_user'] ?></td>
                                            <td><?= $value['Total'] / $value['price'] ?></td>
                                            <td>Rp. <?= number_format($value['Total']) ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    <tr class="table-dark">
                                        <td colspan="4" class="fw-bold">Total Keseluhuran</td>

                                        <td><label class="fw-bold ">Rp. <?= number_format($grand_total) ?></label></td>
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
                                <?= $_SESSION['nama_user'] ?>
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

        <?php } 
    ?>


    </div>
</body>

</html>