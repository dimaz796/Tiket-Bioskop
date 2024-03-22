<?php
include "navbar.php";
function decrypt($string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '23432MLKJSDF0L2934897@00001';
    $secret_iv  = 'X0000W9876H5982@7676765';

    $key    = hash('sha256', $secret_key);
    $iv     = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;
}
$enc_order = $_GET['id_order'];
$id_order = decrypt($enc_order);

$sql = "SELECT `order`.id_order,`detail_order`.id_detail_order,`detail_order`.id_seat,`schedule`.price FROM `order`
INNER JOIN `schedule` 
ON `schedule`.id_schedule = `order`.id_schedule
INNER JOIN `detail_order`
ON `detail_order`.id_order = `order`.id_order
WHERE `order`.id_order = $id_order;
";
$querry = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Film</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Xf3Hc5v04gJprXDWb0sRfJotWItgAxjGDD0C5ib/2lhoAweRr+m3N5wPUZjpjwnX" crossorigin="anonymous">">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <h1>Detail Order</h1>


        <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Detail Order</th>
                    <th>Seat</th>
                    <th>Harga</th>
                </tr>
            </thead>

            <?php
            foreach ($querry as $index => $row) { ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?php
                        $id_seat = $row['id_seat'];
                        $sql = "SELECT seat.variable_seat,seat.number_seat FROM seat
                                      WHERE id_seat = $id_seat;";
                        $seat = mysqli_query($conn, $sql);
                        foreach ($seat as $st) {
                            $variable = $st['variable_seat'];
                            $number = $st['number_seat'];
                            echo $variable . $number;
                        }
                        ?>

                    </td>
                    <td>
                        <?= $row['price']; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>

    </script>
</body>

</html>