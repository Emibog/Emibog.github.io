<?php
		require_once('connectDB.php');

		session_start();
		$_SESSION["user_name"] = null;
		echo "Вы вышли из аккаунта!";
		echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';

?>