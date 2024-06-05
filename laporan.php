<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php include "navbar.php";
if ($_SESSION['id_role'] != 2) {
    echo "
    <script>
    window.location.href='login.php?pesan=kemana';
   </script>";
} ?>

<body>
    <div class="container">
        <div class="row">
            <!-- Pendapatan -->
            <div class="col-6 bg-dark mt-5 rounded shadow p-4">
                <?php
                $sql = "SELECT MONTHNAME(`order`.date) AS bulan, SUM(`order`.total) AS total_pendapatan FROM `order`
                 WHERE `order`.`status_order` = 'Sudah Di Bayar' 
                GROUP BY MONTH(`order`.date) 
                ORDER BY MONTH(`order`.date);
            ";
                $pendatapatan = mysqli_query($conn, $sql);

                // Inisialisasi array untuk labels dan data
                $labels = array();
                $data = array();

                // Mengisi array dengan hasil kueri
                foreach ($pendatapatan as $row) {
                    $labels[] = $row['bulan'];
                    $data[] = $row['total_pendapatan'];
                }
                ?>
                <div class="fs-3 mt-2 mb-3 fw-semibold">Pendapatan </div>
                <canvas id="myChart1" width="100" height="100"></canvas>
                <script>
                    var ctx1 = document.getElementById('myChart1').getContext('2d');
                    var myChart1 = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Pendapatan',
                                data: <?php echo json_encode($data); ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>

            <!-- User Topup -->
            <div class="col-5 ms-3 bg-dark mt-5 rounded shadow p-4">
                <?php
                $sql = "SELECT MONTHNAME(`transaksi_topup`.date) AS bulan_topup, SUM(`transaksi_topup`.total_topup) AS total_topup FROM `transaksi_topup`
                 WHERE `transaksi_topup`.`status_topup` = 'Transaksi Berhasil' 
                GROUP BY MONTH(`transaksi_topup`.date) 
                ORDER BY MONTH(`transaksi_topup`.date);
            ";
                $topup = mysqli_query($conn, $sql);

                // Inisialisasi array untuk labels dan data
                $labels = array();
                $data = array();

                // Mengisi array dengan hasil kueri
                foreach ($topup as $row) {
                    $labels[] = $row['bulan_topup'];
                    $data[] = $row['total_topup'];
                }
                ?>
                <div class="fs-3 mt-2 mb-3 fw-semibold">Pendapatan Topup </div>
                <canvas id="myChart2" width="100" height="100"></canvas>
                <script>
                    var ctx2 = document.getElementById('myChart2').getContext('2d');
                    var myChart2 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Topup',
                                data: <?php echo json_encode($data); ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
            <!-- User Topup -->
            <div class="col-11 ms-3 bg-dark mt-5 rounded shadow p-4">
                <?php
                $sql = "SELECT MONTHNAME(`film`.tayang) AS bulan_tayang, Count(`film`.id_film) AS total_film FROM `film`
                GROUP BY MONTH(`film`.tayang) 
                ORDER BY MONTH(`film`.tayang);
            ";
                $Film = mysqli_query($conn, $sql);

                // Inisialisasi array untuk labels dan data
                $labels = array();
                $data = array();

                // Mengisi array dengan hasil kueri
                foreach ($Film as $row) {
                    $labels[] = $row['bulan_tayang'];
                    $data[] = $row['total_film'];
                }
                ?>
                <div class="fs-3 mt-2 mb-3 fw-semibold">Film </div>
                <canvas id="myChart3" width="100" height="100"></canvas>
                <script>
                    var ctx2 = document.getElementById('myChart3').getContext('2d');
                    var myChart3 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Film',
                                data: <?php echo json_encode($data); ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <?php include "assets/Footer/footer.php" ?>

</body>

</html>