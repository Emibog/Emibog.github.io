<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>BestPorn Video</title>
		<link rel="stylesheet" href="css/video.css">
		<link rel="shortcut icon" href="img/IconVideo.ico" type="image/x-icon">
	</head>
	<body>
		<div class="up_way" style="height: 0; width: 0;">
			<a href="#for_up"><img src="img/up.png" alt="" class="to_up"></a>
		</div>
		<nav id="for_up" class="menu" >
			<div class="menu_div">
				<h1 class="menu_title">Меню</h1>
				<a href="index.html" class="to_top">Главная</a>
				<a href="photo.html" class="to_photo">Фото</a>
			</div>
		</nav>
		<nav class="nav_site">
			<div class="nav_div">
				<h1 class="spisok_title">Список сайтов</h1>
				<a href="#porno365_for_nav" class="Porno365_nav">1. Porno365</a>
				<a href="#vtrahevip_for_nav" class="Vtrahevip_nav">2. Vtrahevip</a>
				<a href="#pornhub_for_nav" class="Pornhub_nav">3. Pornhub</a>
			</div>
		</nav>
		<div class="content">
			<div class="porn365" id="porno365_for_nav">
				<h1 class="pornTitle365">PORNO365</h1>
				<a href="add_porn365.html" style="font-family: Impact; text-decoration: none; font-size: 25px; color: #ffa302; margin-left: 60%;">Добавить видео Porno365</a>
				<hr class="hr_for_365">
				<ul>
					<?php //добавление видео.
						$result = mysqli_query($connect, "SELECT * FROM `365` ORDER BY id DESC");
						while ( ($r1 = mysqli_fetch_assoc($result))) {
							echo "<li>"."<a href=".$r1["href"]." "."target="."blank".">"."<img src="."'".$r1["img"]."'".">"."</a>"."</li>";
						}
					?>
				</ul>
			</div>
			<div class="vtrahevip" id="vtrahevip_for_nav">
				<h1 class="vtrahevip_h1">vtrahevip</h1>
				<a href="add_vtrahevip.html" style="font-family: Impact; text-decoration: none; font-size: 25px; color: #7f7f7f; margin-left: 55%;">Добавить видео Vtrahevip</a>
				<hr class="hr_for_vtrahevip">
				<ul>
					<?php //добавление видео.
						$result = mysqli_query($connect, "SELECT * FROM `vtrahe` ORDER BY id DESC");
						while ( ($r1 = mysqli_fetch_assoc($result))) {
							echo "<li>"."<a href=".$r1["href"]." "."target="."blank".">"."<img src="."'".$r1["img"]."'".">"."</a>"."</li>";
						}
					?>
				</ul>
			</div>
			<div class="pornhub" id="pornhub_for_nav">
				<h1 class="pornhub_h1" style="display: inline-block;"><span class="white_porn">Porn</span><span class="orange_hub">hub</span></h1>
				<a href="add_pornhub.html" style="font-family: Impact; text-decoration: none; font-size: 25px; color: white; margin-left: 55%;">Добавить видео Pornhub</a>
				<hr class="hr_for_pornhub">
				<ul id="forjs">
					<?php //добавление видео.
						$result = mysqli_query($connect, "SELECT * FROM `pornhub` ORDER BY id DESC");
						while ( ($r1 = mysqli_fetch_assoc($result))) {
								echo "<li>"."<a href=".$r1["href"]." "."target="."blank".">"."<img src="."'".$r1["img"]."'".">"."</a>"."</li>";
						}
					?>
				</ul>
			</div>
		</div>
		<script src="js/video.js"></script>
	</body>
</html>