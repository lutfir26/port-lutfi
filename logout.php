<?php
session_start();
session_unset();
session_destroy();

setcookie('login', '', time() - 3600);

echo "<script> alert('Berhasil Logout');</script>";
	echo "
	<html>
		<meta http-equiv='refresh' content='2;URL=login.php'>
	</html>";