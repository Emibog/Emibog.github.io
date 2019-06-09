<?php
	require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	$chres = mysqli_query($connect, "SELECT `password` FROM `users` WHERE `login` = '$login'");
	$ch = mysqli_fetch_assoc($chres)['password'];
	if ($ch == $_POST['oldpass']) {
	
	$new_pass = $_POST['newpass'];
	mysqli_query($connect,  "UPDATE `users` SET `password` = '$new_pass' WHERE `login` = '$login'");
	echo "Пароль успешно сменён!";
	echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
	}else{
		echo "Вы ввели неправильный старый пароль!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/changepass.php">';
	}
?>