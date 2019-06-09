<?php require_once('connectDB.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/registr.js"></script>
	<title>Document</title>
</head>
<body>
	<a href="index.php">На главную</a>

<form action="checkregistr.php" method="POST">
		<input type="email" name="email" placeholder="Введите ваш email" class="email" required><br>
		<input type="text" name="login" placeholder="Логин" required><br>
		<input type="password" name="pswrd" placeholder="Пароль" class="one" required>
		<p class="two" style="display: inline;"></p>
		<p class="same" style="display: inline;"></p>
		<button class="open2">Показать пароль</button><br>
		<input type="password" name="repeatpswrd" placeholder="Повторите пароль" class="repeatpass" required>
		<p class="three" style="display: inline;"></p>
		<p class="ch" style="display: inline;"></p>
		<button class="open3">Показать пароль</button><br>
		<?php
			$rand = rand(1,5);
			$_SESSION["rand"] = $rand;
			echo "<br> <img style='width: 10%' src='captcha/".$rand.".jpg'".">";
		?>
		<input type="text" name="captcha" autocomplete="off" required>
		<input type="submit" value="Зарегистрироваться" name="but" class="but">
	</form>
</body>
</html>