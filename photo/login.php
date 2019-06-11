<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	if ($login) {
		echo "Вы уже вошли в аккаунт!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}else{
	}
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/login.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/login.js"></script>
		<title>Войти</title>
	</head>
	<body>
		<nav>
			<a href="index.php" class="logo"><img src="sistem_img/logo.png" alt="" class="logo"></a>
			<div class="profile">
				<?php
				$cov = '"';
					if ($_SESSION["user_name"]){
						$avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
						$ava = mysqli_fetch_assoc($avach)['avatar'];
						if($ava == 'avatar.png'){
							echo "<a href='profile.php'>".$_SESSION["user_name"]."
							<div class='avatar' style='background-image: url(".$cov."../users/".$login."/avatar.png".$cov.");'></div></a> 
							<a href='settingsprofile.php' class='settings'><img src='sistem_img/settings.png' class='outbut'></a><a href='outprofile.php' class='outbut'><img src='sistem_img/out.png' class='outbut'></a>";
						}else{
							echo "<a href='profile.php'>".$_SESSION["user_name"]." 
							<div class='avatar' style='background-image: url(".$cov."sistem_img/avatar.png".$cov.");'></div></a>
							<a href='settingsprofile.php' class='settings'><img src='sistem_img/settings.png' class='outbut'></a><a href='outprofile.php' class='outbut'><img src='sistem_img/out.png' class='outbut'></a>";
						}
					}else{
						echo "<div class='loginorreg'><a href='registr.php' class='profile'>Регистрация</a></div>";
					}
				?>
			</div>
		</nav>
		<br>
		<form action="login_script.php" method="POST" class="text">
			<h1 class="text_login">Войти</h1>
			<input type="text" name="login" placeholder="Логин" class="login" required><br>
			<input id="open1" type="password" name="pswrd" placeholder="Пароль" class="password" required style="display: inline">
			<div class="open1" type="button"></div><br>
			<p class="two"></p>
			<p class="one"></p>
		</form>
		<form action="login_script.php" method="POST">
			<input type="hidden" name="login" placeholder="Логин" class="login_help">
			<input id="open1" type="hidden" name="pswrd" placeholder="Пароль" class="password_help" required style="display: inline">
			<input type="submit" value="Войти" name="but" class="but">
		</form>
	</body>
	</html>