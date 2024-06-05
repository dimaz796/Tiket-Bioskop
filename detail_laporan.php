<?php
include "navbar.php";

$teater_names = $_GET['teater_names'];
$tanggal = $_GET['tanggal'];

$nomer_teater = strval($teater_names);

$array = explode(',', $nomer_teater);




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Laporan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Xf3Hc5v04gJprXDWb0sRfJotWItgAxjGDD0C5ib/2lhoAweRr+m3N5wPUZjpjwnX" crossorigin="anonymous">">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">

                <h1 class="text-light">Detail Order</h1>


                <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Teater</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <?php
                    $i = 0;
                    foreach ($array as $row => $value) {
                        $i++;
                        $sql = " SELECT 
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
                                `order`.`date` = '$tanggal' AND `teater`.`name_teater` = '$value'
                            GROUP BY 
                                `order`.`date`
                            ORDER BY 
                                `order`.`date` ASC;";
                        $result = mysqli_query($conn, $sql);
                        $data_order = mysqli_fetch_array($result);
                        $total = $data_order['total_sum'];

                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $tanggal ?></td>
                            <td><?= $value ?></td>
                            <td><?= $total ?></td>
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

    </script>
</body>

</html>