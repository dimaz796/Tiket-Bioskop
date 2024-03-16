<?php
include "conn.php";
$tanggal = $_GET['tanggal'];

$sql = $sql = "SELECT id_film,title FROM `Film` WHERE Berakhir >= '$tanggal' AND tayang <= '$tanggal'";
$query = mysqli_query($conn, $sql);
?>
<option value="" class="bg-dark"></option>

<?php foreach ($query as $key) { ?>
    <option value="<?= $key['id_film'] ?>" class="bg-dark"><?= $key['title'] ?></option>
<?php } ?>