<?php
include 'conn.php';
session_start();

if (isset($_POST['simpan'])) {

    $role = $_POST['role'];
    $nama_user = $_POST['nama_user'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($conn, "SELECT * 
                                    FROM `user` 
                                    WHERE username='$username'");

    $count = mysqli_num_rows($query);
    if ($count > 0) {
        echo "
        <script>
            alert('Username Sudah Di Gunakan!');
            window.location.href='tambah_user.php';
        </script>";
        die;
    }

    $sql = "INSERT INTO `user` VALUES (NULL, '$role', '$username', 
			  '$password','$nama_user','$telepon','0');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data User Berhasil di simpan');
				window.location.href='master_user.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data User Gagal di Simpan');
			window.location.href='tambah_user.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $nama_user = $_POST['nama_user'];
    $telepon = $_POST['telepon'];
    $id_user = $_POST['id_user'];
    $id_role = $_POST['id_role'];
    $username = $_POST['username'];
    $username_lama = $_POST['username_lama'];
    $password = $_POST['password'];
    if ($username != $username_lama) {
        $query = mysqli_query($conn, "SELECT * 
                                        FROM `user` 
                                        WHERE username='$username'");

        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "
            <script>
                alert('Username Sudah Di Gunakan!');
                window.location.href='edit_user.php?id=$id_user';
            </script>";
            die;
        }
    }
    if ($password == "") {
        $result = mysqli_query($conn, "UPDATE `user` SET `nama_user` = '$nama_user', `username` = '$username'
										 , `id_role` = '$id_role',`telepon` = '$telepon'  
										 WHERE `user`.`id_user` = '$id_user'");
    } else {
        $password = md5($password1);
        $result = mysqli_query($conn, "UPDATE `user` SET `nama_user` = '$nama_user', `username` = '$username' ,
									 `password` = '$password' , `id_role` = '$id_role',`telepon` = '$telepon' 
									 WHERE `user`.`id_user` = '$id_user'");
    }

    if ($result) {
        echo "
    	<script>
    			alert('Data User Berhasil diubah');
    			window.location.href='master_user.php';
    	</script>";
    } else {
        echo "
    	<script>
    		alert('Data User Gagal diubah');
    		window.location.href='master_user.php';
    	</script>";
    }
} elseif (isset($_POST['registrasi'])) {
    if ($_POST['nilaiCaptcha'] != $_SESSION['code']) {
        echo "
    	<script>
    		alert('Konfirmasi Kode Salah!');
    		window.location.href='registrasi.php';
            </script>";
        die;
    }
    $role = $_POST['role'];
    $nama_user = $_POST['nama_user'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $query = mysqli_query($conn, "SELECT * 
                                    FROM `user` 
                                    WHERE username='$username'");

    $count = mysqli_num_rows($query);
    if ($count > 0) {
        echo "
        <script>
            alert('Username Sudah Di Gunakan!');
            window.location.href='registrasi.php';
        </script>";
        die;
    }
    if ($password1 == $password2) {
        $password = md5($password1);
    } else {
        echo "
        <script>
            alert('Password Tidak Sama!');
            window.location.href='registrasi.php';
        </script>";
        die;
    }

    $sql = "INSERT INTO `user` VALUES (NULL, '$role', '$username', 
			  '$password','$nama_user','$telepon','0');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Registrasi Berhasil!');
				window.location.href='login.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Registrasi Gagal,Coba Lagi!');
			window.location.href='registrasi.php';
		</script>";
    }
} elseif (isset($_POST['ganti'])) {

    $id_user = $_POST['id_user'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $password_sebelumnya = $_POST['password_sebelumnya'];
    $password_sebelumnya = md5($password_sebelumnya);
    $query = mysqli_query($conn, "SELECT * 
                                    FROM `user` 
                                    WHERE `id_user` = $id_user");
    $data_user = mysqli_fetch_assoc($query);
    $password_benar = $data_user['password'];

    if ($password_sebelumnya != $password_benar) {
        echo "
        <script>
            alert('Password Salah!');
            window.location.href='ganti_password.php';
        </script>";
        die;
    }

    if ($password1 == $password2) {
        $password_baru = md5($password1);
    } else {
        echo "
        <script>
            alert('Password Baru Tidak Sama!');
            window.location.href='ganti_password.php';
        </script>";
        die;
    }

    $sql = "UPDATE `user` SET `password` = '$password_baru' WHERE `user`.`id_user` = $id_user;";
    $update_password = mysqli_query($conn, $sql);

    if ($update_password) {
        echo "
		<script>
				alert('Password Berhasil Di Ubah Berhasil!');
				window.location.href='index.php';
		</script>";
    } else {
        echo "
		<script>
			alert(Password Gagal Di Ubah Berhasil!');
			window.location.href='ganti_password.php';
		</script>";
    }
} else {


    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id_user=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data User Berhasil di Hapus');
				window.location.href='master_user.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data User Berhasil di Hapus');
			window.location.href='master_user.php';
		</script>";
    }
}
