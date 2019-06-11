<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Удаление аватара</title>
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
<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
		 $avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
		 $ava = mysqli_fetch_assoc($avach)['avatar'];
			if($ava == 'avatar.png'){
				mysqli_query($connect, "UPDATE `users` SET `avatar` = NULL WHERE `login` = '$login'");
				unlink("users/"."$login"."/avatar.png");
				echo "<p class='php_text' style='margin-left: 43%;'>Аватар успешно удален!</p>";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/settingsprofile.php">';
			}else{
				echo "<p class='php_text' style='margin-left: 43%;'>У вас не установлен аватар!</p>";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/settingsprofile.php">';
			}
?>
</body>
</html>