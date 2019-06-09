<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/login.js"></script>
		<title>LOGIN</title>
	</head>
	<body>
		<a href="index.php">На главную</a>
		<a href="registr.php">Зарегистрироваться</a>
		<form action="login_script.php" method="POST">
			<input type="text" name="login" placeholder="Логин"><br>
			<input id="open1" type="password" name="pswrd" placeholder="Пароль" class="oldpass" required style="display: inline";>
			<p class="one" style="display: inline;"></p>
			<button class="open1" type="button">Показать пароль</button><br>
			<input type="submit" value="Войти" name="but" class="but">
		</form>
	</body>
	</html>