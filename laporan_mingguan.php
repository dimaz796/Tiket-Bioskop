<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <div class="card bg-dark ">
            <div class="card-body bg-dark rounded p-4">
                <h1 class="text-light">Laporan</h1>
                <form method="post" action="lihat_laporan_mingguan.php" id="form-jadwal" class="mt-4">


                    <label for="" class="fs-6 mt-1 mb-1">Dari Tanggal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" required>

                    <label for="" class="fs-6 mt-1 mb-1">Sampai Tanggal </label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class=" w-50 h-50 enter mb-4 p-1 rounded text-body-secondary" required>
                    <div class="d-flex">
                        <button type="submit" name="cetak" class="btn btn-warning w-25 enter mt-4 me-2">Cetak</button>
                        <button type="submit" name="lihat" class="btn btn-warning w-25 enter mt-4">Lihat</button>
                    </div>

                </form>

                <script>
                    const today = new Date().toISOString().split('T')[0];
                    document.getElementById('tanggal_awal').setAttribute('max', today);
                    document.getElementById('tanggal_akhir').setAttribute('max', today);
                </script>


            </div>
        </div>
    </div>
</body>

</html>