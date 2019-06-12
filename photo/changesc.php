<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	if ($login) {
		echo "Вы уже вошли в аккаунт!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}else{
	}
	?>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/php_text.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<title>Восстановление пароля</title>
	</head>
	<body>
	<?php
		$new_pass = $_POST['pswrd'];
		$email = $_SESSION['forgotemail'];
		mysqli_query($connect, "UPDATE `users` SET `password` = '$new_pass' WHERE `email` = '$email'");
		$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
		$checkemail = mysqli_fetch_assoc($checkemailres);
		$login = $checkemail['login'];
		echo "<p class='php_text' style='margin-left: 41%;'>Пароль успешно сменён!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		$var = scandir("users/$login"); $length = sizeof($var); for($i = 2; $i < $length; $i++){ $info = new SplFileInfo($var["$i"]); $rashir = $info->getExtension(); if ($rashir == "php"){ $vr = $var["$i"]; unlink("users/$login/$vr"); } }
	?>
</body>
</html>