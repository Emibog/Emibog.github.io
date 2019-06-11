<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	if ($login) {
	}else{
		echo "Вы не вошли в аккаунт!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/settingsprofile.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/script.js"></script>
		<meta charset="UTF-8">
		<title>Настройки аккаунта</title>
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
			<div class="settings_div">
				<h1>Настройки аккаунта</h1>
			<form action="changepass.php" method="POST">
				<input type="submit" value="Изменить пароль" name="changepass" class="changepass">
			</form>
			<form action="outprofile.php" method="POST">
				<input type="submit" value="Выйти из аккаунта" name="outaccount" class="outaccount">
			</form>
			
			<form action="dellaccount.php" method="POST">
				<input type="submit" value="Удалить аккаунт" name="dellaccount" class="dellaccount">
			</form>
			<div class="upload_avatar">
			<h1>Загрузить аватар!</h1>
			<form method="POST" action="downloadavatar.php" enctype=multipart/form-data>
				<input type="hidden" name="action" value="true">
				<input type="file" name="file" accept=".jpg, .png, .bmp, .jpeg">
				<input type=submit value=Загрузить name="but">
			</form>
			<?php
				$avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
				$ava = mysqli_fetch_assoc($avach)['avatar'];
				if($ava == 'avatar.png'){
					echo "<form action='dellavatar.php' method='POST'>
									<input type='submit' value='Удалить аватар.' name='outaccount'>
								</form>";
				}
			?>
		</div>
		</div>
</body>
</html>