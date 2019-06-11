<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Изменение пароля</title>
</head>
<body>
<?php 
	if ($login) {
	}else{
		echo "<p class='php_text' style='margin-left: 43%;'>Вы не вошли в аккаунт!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}
?>
<?php
	require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	$chres = mysqli_query($connect, "SELECT `password` FROM `users` WHERE `login` = '$login'");
	$ch = mysqli_fetch_assoc($chres)['password'];
	if ($ch == $_POST['oldpass']) {
	
	$new_pass = $_POST['newpass'];
	mysqli_query($connect,  "UPDATE `users` SET `password` = '$new_pass' WHERE `login` = '$login'");
	echo "<p class='php_text' style='margin-left: 43%;'>Пароль успешно сменён!</p>";
	echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
	}else{
		echo "<p class='php_text' style='margin-left: 41%;'>Вы ввели неправильный старый пароль!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/changepass.php">';
	}
?>
</body>
</html>