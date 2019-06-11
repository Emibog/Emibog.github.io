<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/categories.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/login.js"></script>
		<script src="js/findcategoriesnav.js"></script>
		<title>Категоря </title>
	</head>
	<body>
		<nav>
			<a href="index.php" class="logo"><img src="sistem_img/logo.png" alt="" class="logo"></a>
			<div class="categories_select">
				<h1 class="h1_cat">Категории</h1>
				<form action="categories.php" method="POST">
				<?php
					$catres = mysqli_query($connect, "SELECT * FROM `categories`");
					while($cat = mysqli_fetch_assoc($catres)){
						echo "<input type='submit' class='".$cat['id']."' name='".$cat['id']."' value='".$cat['title']."'>";
					}
				?>
				<input type="hidden" class="id" name="id">
				</form>
			</div>
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
				<div class="conteiner">
					<div class="content">
						<?php
						$idcat = $_POST['id'];
						$idres = mysqli_query($connect, "SELECT * FROM `photo` WHERE `categories` = '$idcat' ORDER BY `id` DESC ");
						while($id = mysqli_fetch_assoc($idres)){
						$cat = $id['categories'];
						$categoriesres = mysqli_query($connect, "SELECT `title` FROM `categories` WHERE `id` = '$cat'");
						$categories = mysqli_fetch_assoc($categoriesres)['title'];
						$hlp = $id['id'];
						$dateres = mysqli_query($connect, "SELECT `date` FROM `photo` WHERE `id` = '$hlp'");
						$datetab = mysqli_fetch_assoc($dateres)['date'];
						$datepre = mysqli_query($connect, "SELECT DAY('$datetab')");
						$monthpre = mysqli_query($connect, "SELECT MONTH('$datetab')");
						$yearpre = mysqli_query($connect, "SELECT YEAR('$datetab')");
						$arrdate = "DAY('".$datetab."')";
						$arrmonth = "MONTH('".$datetab."')";
						$arryear = "YEAR('".$datetab."')";
						$date = mysqli_fetch_assoc($datepre)["$arrdate"];
						$month = mysqli_fetch_assoc($monthpre)["$arrmonth"];
						$year = mysqli_fetch_assoc($yearpre)["$arryear"];
						if (strlen($date) <= 1) {
							$date = "0".$date;
						}else{}
						if (strlen($month) <= 1) {
							$month = "0".$month;
						}else{}
							echo "<div class='item' id='".$id['id']."'>
										<img src='img/".$id['name']."'".">
										<span class='author'>Автор: ".$id['author']."</span>
										<br>
										<span class='date'>Дата публикации: ".$date."-".$month."-".$year."</span>
										<br>
										<span class='categories'>Категория: ".$categories."</span>
										<form action='' method='POST'>
												<input type='hidden' value='' class='for_id' name='forid'>
										</form>
								</div>";
								$i = 2;
								$i++;
						}
						
						?>
						
					</div>
					
				</div>
			</body>
		</html>