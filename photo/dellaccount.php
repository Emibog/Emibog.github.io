<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Удаление аккаунта</title>
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
				require_once('connectDB.php');
				session_start();
				$login = $_SESSION["user_name"];
				if (isset($_POST['dellaccount'])) {
			
					$log = $_SESSION["user_name"];
					if ($log) {
						$user_emailres = mysqli_query($connect, "SELECT `email` FROM `users` WHERE `login` = '$login'");
						$user_email = mysqli_fetch_assoc($user_emailres)['email'];
						mail("$user_email", 'Ваш аккаунт был полность удален с Ginvaellaest.ru!', "$login, Ваш аккаунт упешно удален!\r\nСпасибо, что были с нами!");
						mysqli_query($connect, "DELETE FROM `users` WHERE `login` = '$log'");
						
						$var = scandir("users/$login/");
						$length = sizeof($var);					
						for($i = 2; $i < $length; $i++){
							$name_file = $var[$i];
							mysqli_query($connect, "DELETE FROM `photo` WHERE `name` = '$name_file'");
							unlink("users/$login/$name_file");
						}
						if (file_exists("users/"."$login"."/")) {
						rmdir("users/"."$login"."/");
						}
						echo "<p class='php_text' style='margin-left: 42%;'>Аккаунт успешно удален!</p>";
						echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';
					}else{
						echo "<p class='php_text' style='margin-left: 43%;'>Вы не вошли в аккаунт!</p> <br>";
						echo '<a href="profile.php" style="color: #070707;">Войти в аккаунт.</a>';
					}
						$_SESSION["user_name"] = null;
				}
?>
</body>
</html>