<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php
include "navbar.php";
$id_user = $_SESSION['id_user'];
$nama_user = $_SESSION['nama_user'];
?>

<body>
    <div class="container mt-4">
        <h2 class="mt-4">Riwayat Transaksi Kasir Atas Nama <?= $nama_user ?></h2>
        <div class="row">
            <!-- Pendapatan -->
            <div class="col-6 bg-dark mt-5 rounded shadow p-4">
                <?php
                $sql = "SELECT DATE(`order`.date) AS tanggal, SUM(`order`.total) AS total_pendapatan 
                FROM `order`
                WHERE `order`.`status_order` = 'Sudah Di Bayar' AND `order`.`id_user` = $id_user
                GROUP BY DATE(`order`.date) 
                ORDER BY DATE(`order`.date);                
            ";
                $pendatapatan = mysqli_query($conn, $sql);

                // Inisialisasi array untuk labels dan data
                $labels = array();
                $data = array();

                // Mengisi array dengan hasil kueri
                foreach ($pendatapatan as $row) {
                    $labels[] = $row['tanggal'];
                    $data[] = $row['total_pendapatan'];
                }
                ?>
                <div class="fs-3 mt-2 mb-3 fw-semibold">Total Pembelian</div>
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
            <!-- User Topup -->
            <div class="col-11 ms-3 bg-dark mt-5 rounded shadow p-4"> <?php
                                                                        $sql = "SELECT DATE(`order`.date) AS tanggal, COUNT(`detail_order`.id_detail_order) AS jumlah
                FROM `order`
                JOIN `detail_order` ON detail_order.id_order = order.id_order
                GROUP BY DATE(`order`.date) 
                ORDER BY DATE(`order`.date);
                
            ";
                                                                        $seat = mysqli_query($conn, $sql);

                                                                        // Inisialisasi array untuk labels dan data
                                                                        $labels = array();
                                                                        $data = array();

                                                                        // Mengisi array dengan hasil kueri
                                                                        foreach ($seat as $row) {
                                                                            $labels[] = $row['tanggal'];
                                                                            $data[] = $row['jumlah'];
                                                                        }
                                                                        ?>
                <div class="fs-3 mt-2 mb-3 fw-semibold">Total Pembelian (Kursi)</div>
                <canvas id="myChart2" width="100" height="100"></canvas>
                <script>
                    var ctx2 = document.getElementById('myChart2').getContext('2d');
                    var myChart2 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: [{
                                label: 'Kursi',
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
</body>

</html>