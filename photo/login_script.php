<?php require_once('connectDB.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Войти</title>
</head>
<body>
	<?php
		$login = $_POST['login'];
		$pswrd = $_POST['pswrd'];
		if (isset($_POST['but'])) {
			$result_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND password = '$pswrd'");
			if ( mysqli_num_rows($result_login) != 0) {
				$check_activeres = mysqli_query($connect, "SELECT `active` FROM `users` WHERE `login` = '$login' AND password = '$pswrd'");
				$check_active = mysqli_fetch_assoc($check_activeres);
				if( $check_active['active'] == 1){
					$_SESSION["user_name"] = $login;
					echo "<p class='php_text' style='margin-left: 42%;'>".$_SESSION["user_name"].", ";
					echo "Вы вошли в аккаунт!</p>";
					echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';
				}
				else{
					echo "<p class='php_text' style='margin-left: 27%;'>Вы не подтвердили аккаунт! Пожалуйста проверьте почту и перейдите по ссылке в письме!</p>";
				}
			}else{
				echo "<p class='php_text'>Неверный логин или пароль! <a href='login.php'>Попробуйте снова</a> или "."<a href='registr.php'>зарегистрируйтесь!</a></p>";
			}
		}
		?>
</body>
</html>
