<?php
session_start();
if (!isset($_SESSION['id_role'])) {
    echo "
         <script>
			window.location.href='login.php';
		</script>";
}
