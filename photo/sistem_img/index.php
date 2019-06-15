<?php require_once "../../../../connectDB.php"; session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="stylesheet" href="../../../../sistem_img/style.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="../../../../sistem_img/logo.ico" type="image/x-icon">
		<script src="../../../../js/jquery-3.3.1.min.js"></script>
		<script src="../../../../js/dell_photo_from_album.js"></script>
		<meta charset="UTF-8">
		<title>Ginvaellaest - пространство для твоих фото!</title>
	</head>
	<body>

		<nav>
			<a href="../../../../index.php" class="logo"><img src="../../../../sistem_img/logo.png" alt="" class="logo"></a>
			<div class="profile">
				<?php
				$cov = '"';
					if ($_SESSION["user_name"]){
						$avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
						$ava = mysqli_fetch_assoc($avach)['avatar'];
						if($ava == 'avatar.png'){
							echo "<a href='../../../../profile.php'>".$_SESSION["user_name"]."
							<div class='avatar' style='background-image: url(".$cov."../../../../users/".$login."/avatar.png".$cov.");'></div></a> 
							<a href='../../../../settingsprofile.php' class='settings'><img src='../../../../sistem_img/settings.png' class='outbut'></a><a href='../../../../outprofile.php' class='outbut'><img src='../../../../sistem_img/out.png' class='outbut'></a>";
						}else{
							echo "<a href='../../../../profile.php'>".$_SESSION["user_name"]." 
							<div class='avatar' style='background-image: url(".$cov."../../../../sistem_img/avatar.png".$cov.");'></div></a>
							<a href='../../../../settingsprofile.php' class='settings'><img src='../../../../sistem_img/settings.png' class='outbut'></a><a href='../../../../outprofile.php' class='outbut'><img src='../../../../sistem_img/out.png' class='outbut'></a>";
						}
					}else{
						echo "<div class='loginorreg'><a href='../../../../login.php'>Войти /</a><a href='../../../../registr.php' class='profile'>Регистрация</a></div>";
					}
				?>
			</div>
		</nav>
		<div class="upload">
			<h1>Загрузить фото в альбом.</h1>
			<form method="POST" action="downloadfilealbum.php" enctype=multipart/form-data class="upload_form">
				<input type="hidden" name="action" value="true">
				<input type="file" name="file" accept=".jpg, .png, .bmp, .jpeg" required>
				<input type=submit value=Загрузить name="but" class="upload_button">
			</form>
			</div>
		<div class="conteiner">
			<div class="content">
				<?php

						foreach (scandir("./", SCANDIR_SORT_DESCENDING) as $file_name) {
							
							 if (($file_name !='.') && ($file_name !='..') && ($file_name !='index.php') && ($file_name !='downloadfilealbum.php')){

								echo "<div class='item' id='".$file_name."'>
												<img src='./".$file_name."'".">
												<form action='' method='POST'>
												<input type='hidden' value='' class='for_id' name='forid'>
												<input type='submit' value='Удалить фото из альбома'' name='delphoto' class='dell' id='".$file_name."'>
											</form>

											</div>";

							}
						}

						if (isset($_POST['delphoto'])) {
							$dellid = $_POST['forid'];
							unlink("./$dellid");
							$dirfile = $_SESSION["dirfile"];
							$replace = "F:\OpenServer\OSPanel\domains\photo\users\ ";
							$replace = str_replace(" ", "", $replace);
							$dirfile = str_replace($replace.$login,"", $dirfile);
							$dirfile = str_replace('\\', '/', $dirfile);
							$url = "http://photo/users/$login$dirfile/";
							echo '<meta http-equiv="Refresh" content=" 1 ; URL = '.$url.'">';
						}
				?>
				
			</div>	
		</div>
	</body>
</html>