<?php
session_start();

include "conn.php";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * 
										FROM `user` 
                    INNER JOIN `role` ON user.id_role=role.id_role
										WHERE `username` = '$username'
										AND `password` = '$password'");

  $count = mysqli_num_rows($query);


  if ($count > 0) {
    $login = mysqli_fetch_array($query);
    $_SESSION['id_user'] = $login['id_user'];
    $_SESSION['username'] = $login['username'];
    $_SESSION['password'] = $login['password'];
    $_SESSION['id_role'] = $login['id_role'];
    $_SESSION['name_role'] = $login['name_role'];
    $_SESSION['nama_user'] = $login['nama_user'];
    $_SESSION['telepon'] = $login['telepon'];
    $_SESSION['saldo'] = $login['saldo'];
    $_SESSION['status_login'] = 'login';

    if ($login['id_role'] == 1) {
      echo "<script>
				alert('Login Berhasil,Anda Adalah Admin!');
				window.location.href='home_admin.php';
			</script>";
    } elseif ($login['id_role'] == 2) {
      echo "<script>
			alert('Login Berhasil,Anda Adalah Manager!');
			window.location.href='laporan.php';
		</script>";
    } elseif ($login['id_role'] == 3) {
      echo "<script>
				alert('Login Berhasil,Anda Adalah Kasir!');
				window.location.href='home_kasir.php';
			</script>";
    } elseif ($login['id_role'] == 4) {
      echo "<script>
				alert('Login Berhasil,Haii $_SESSION[nama_user]!');
				window.location.href='index.php';
			</script>";
    }
  } else {
    echo "<script>
  window.location.href='login.php?pesan=gagal';
</script>";
  }
}
