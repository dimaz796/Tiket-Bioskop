<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit User</title>
</head>

<body>
	<?php
	include "navbar.php";
	if ($_SESSION['id_role'] != 1) {
		echo "
             <script>
             window.location.href='login.php?pesan=kemana';
            </script>";
	}

	$sql = "SELECT * FROM `role`";
	$role = mysqli_query($conn, $sql);
	$DimasA = mysqli_fetch_all($role);

	$id = $_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");


	while ($user_data = mysqli_fetch_array($result)) {
		$nama_user = $user_data['nama_user'];
		$telepon = $user_data['telepon'];
		$id_user = $user_data['id_user'];
		$username_user = $user_data['username'];
		$password_user = $user_data['password'];
		$role = $user_data['id_role'];
		$saldo = $user_data['saldo'];
	}


	?>
	<div class="container mt-3">
		<div class="card bg-dark ">
			<div class="card-body bg-dark rounded p-4">
				<h1 class="text-light">Edit User</h1>
				<form method="post" action="proses_user.php">

					<input type="hidden" name="id_role" value="<?= $id_role ?>">
					<input type="hidden" name="id_user" value="<?= $id ?>">
					<input type="hidden" name="saldo" value="<?= $saldo ?>">
					<input type="hidden" name="username_lama" value="<?= $username_user ?>">

					Nama User
					<input type="text" name="nama_user" class="form-control w-50 mb-3" value="<?= $nama_user ?>" required>

					No Telepon
					<input type="number" name="telepon" class="form-control w-50 enter mb-4" value="<?= $telepon ?>" required>

					Username
					<input type="text" name="username" class="form-control w-50 mb-3" value="<?= $username_user ?>" required>

					Password
					<input type="text" name="password" class="form-control w-50 mb-3" placeholder="Jida Tidak Ganti Password Diamkan Saja">

					Role
					<select name="id_role" class="form-select w-50 h-50 mb-3" style="height: 25px; width: 610px;" required>
						<?php foreach ($DimasA as $row) : ?>
							<option value="<?= $row[0] ?>" class="bg-dark" <?= $select = ($row[0] == $role) ? 'selected' : ''  ?>><?= $row[1] ?></option>
						<?php endforeach ?>
					</select>

					<button type="submit" name="ubah" class="btn btn-warning w-50">Ubah</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>