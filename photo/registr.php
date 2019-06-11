<?php require_once('connectDB.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/registr.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/registr.js"></script>
	<title>Регистрация</title>
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
						echo "<div class='loginorreg'><a href='login.php' class='profile'>Войти</a></div>";
					}
				?>
			</div>
		</nav>
		<br>
<form action="" method="POST" class="text">
		<h1>Регистрация</h1>
		<input type="email" name="email" placeholder="Введите ваш email" class="email" required><br>
		<input type="text" name="login" placeholder="Логин" class="login" required><br>
		<input type="password" name="pswrd" placeholder="Пароль" class="one" required>
		<div class="open2" type="button"></div><br>
		<input type="password" name="repeatpswrd" placeholder="Повторите пароль" class="repeatpass" required>
		<div class="open3" type="button"></div><br><br>
		<?php
			$rand = rand(1,5);
			$_SESSION["rand"] = $rand;
			echo "<br> <img class= 'captcha' src='captcha/".$rand.".jpg'"."><br>";
		?>
		<input type="text" name="captcha" autocomplete="off" placeholder="Введите капчу" class="enter_capcha" required>
		<p class="same" style="display: inline;"></p><br>
		<p class="two" style="display: inline;"></p><br>
		<p class="three" style="display: inline;"></p><br>
	</form>
	<form action="checkregistr.php" method="POST" class="text_help">
			<input type="hidden" name="email" placeholder="Введите ваш email" class="email_help">
			<input type="hidden" name="login" placeholder="Логин" class="login_help">
			<input type="hidden" name="pswrd" placeholder="Пароль" class="one_help">
			<input type="hidden" name="repeatpswrd" placeholder="Повторите пароль" class="repeatpass_help">
			<input type="hidden" name="captcha" autocomplete="off" placeholder="Введите капчу" class="enter_capcha_help">
			<input type="submit" value="Зарегистрироваться" name="but" class="but">
		</form>
</body>
</html>