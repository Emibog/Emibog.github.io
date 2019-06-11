<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/changepass.css">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/changepass.js"></script>
	<title>Изменение пароля</title>
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
						echo "<div class='loginorreg'><a href='login.php'>Войти /</a><a href='registr.php' class='profile'>Регистрация</a></div>";
					}
				?>
			</div>
		</nav>
		<br>
		<br>
		<br>
		<br>
	<form action="" method="POST" class="settings_div">
		<input id="open1" type="password" name="oldpass" placeholder="Старый пароль" class="oldpass" required style="display: inline">
		
		<div class="open1" type="button"></div><br>
		<input id="open2" type="password" name="newpass" placeholder="Новый пароль" class="newpass" required style="display: inline">
		
		<div class="open2" type="button"></div><br>
		<input id="open3" type="password" name="repeatpass" placeholder="Повторите новый пароль пароль" class="repeatpass" required style="display: inline">
		
		<div class="open3" type="button"></div><br>
		<p class="one" style="display: inline;"></p><br>
		<p class="same" style="display: inline;"></p><br>
		<p class="three" style="display: inline;"></p><br>
		<p class="ch" style="display: inline;"></p><br>
	</form>
	<form action="changepasssc.php" method="POST">
		<input id="open1" type="hidden" name="oldpass" placeholder="Старый пароль" class="oldpass_help" required style="display: inline">
		<input id="open2" type="hidden" name="newpass" placeholder="Новый пароль" class="newpass_help" required style="display: inline">
		<input id="open3" type="hidden" name="repeatpass" placeholder="Повторите новый пароль пароль" class="repeatpass_help" required style="display: inline">
		<input type="submit" value="Сменить пароль" name="but" class="but">
	</form>
</body>
</html>