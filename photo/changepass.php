<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/profile.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/changepass.js"></script>
	<title>Change password</title>
</head>
<body>
	<nav>
			<a href="index.php" class="logo"><img src="sistem_img/logo.png" alt="" class="logo"></a>
			<div class="profile">
				<a href='index.php' style="margin-right: 5%;">На главную</a>
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
						echo "<div class='loginorreg'><a href='login.php'>Войти /</a><a href='registr.php' class='profile'>Регистрация</a></div>";
					}
				?>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>
	<form action="changepasssc.php" method="POST">
		<input id="open1" type="password" name="oldpass" placeholder="Старый пароль" class="oldpass" required style="display: inline";>
		<p class="one" style="display: inline;"></p>
		<button class="open1">Показать пароль</button><br>
		<input id="open2" type="password" name="newpass" placeholder="Новый пароль" class="newpass" required style="display: inline";>
		<p class="two" style="display: inline;"></p>
		<p class="same" style="display: inline;"></p>
		<button class="open2">Показать пароль</button><br>
		<input id="open3" type="password" name="repeatpass" placeholder="Повторите новый пароль пароль" class="repeatpass" required style="display: inline";>
		<p class="three" style="display: inline;"></p>
		<p class="ch" style="display: inline;"></p>
		<button class="open3">Показать пароль</button><br>
		<button name="change" class="change">Сменить пароль</button>
	</form>
</body>
</html>