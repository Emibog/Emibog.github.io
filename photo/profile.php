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
		<link rel="stylesheet" href="css/profile.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/script.js"></script>
		<meta charset="UTF-8">
		<title><?php echo "$login"; ?></title>
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
							echo "<a href='profile.php' class='to_profile'>".$_SESSION["user_name"]."
							<div class='avatar' style='background-image: url(".$cov."../users/".$login."/avatar.png".$cov.");'></div></a> 
							<a href='settingsprofile.php' class='settings'><img src='sistem_img/settings.png' class='outbut'></a><a href='outprofile.php' class='outbut'><img src='sistem_img/out.png' class='outbut'></a>";
						}else{
							echo "<a href='profile.php' class='to_profile'>".$_SESSION["user_name"]." 
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
			<div class="upload">
			<h1>Загрузить фото!</h1>
			<form method="POST" action="downloadfile.php" enctype=multipart/form-data class="upload_form">
				<input type="hidden" name="action" value="true">
				<input type="file" name="file" accept=".jpg, .png, .bmp, .jpeg" required>
				<select size="5" name="categories" required>
					<option disabled>Выберите категорию</option>
					<option value="Машина">Машина</option>
					<option value="Природа">Природа</option>
					<option value="Пейзаж">Пейзаж</option>
					<option value="Мотоцикл">Мотоцикл</option>
					<option value="Человек">Человек</option>
					<option value="Портрет">Портрет</option>
				</select>
				<p><input name="hidden" type="checkbox" value="1">Опубликовать фото только для себя</p>
				<input type=submit value=Загрузить name="but" class="upload_button">
			</form>
			</div>
			<img src="" alt="">
			<div class="profile_info">
			<?php
				$cov = '"';
					if ($_SESSION["user_name"]){
						$avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
						$ava = mysqli_fetch_assoc($avach)['avatar'];
						if($ava == 'avatar.png'){
							echo "<p class='username'>".$_SESSION["user_name"]."</p>
							<div class='avatar_profile' style='background-image: url(".$cov."../users/".$login."/avatar.png".$cov.");'></div>";
						}else{
							echo "<p class='username'>".$_SESSION["user_name"]." </p>
							<img class='avatar_profile' src=".$cov."sistem_img/avatar.png".$cov.">";
						}
					}else{
						echo "<div class='loginorreg'><a href='login.php'>Войти /</a><a href='registr.php' class='profile'>Регистрация</a></div>";
					}
				?>
				<p class="col_photo">Вы загрузили фото:
					<?php
						$col_photo = 0;
						$idres = mysqli_query($connect, "SELECT * FROM `photo` WHERE `author` = '$login' ORDER BY `id` DESC");
						while($id = mysqli_fetch_assoc($idres)){
							$col_photo++;
						}
						echo "$col_photo";
					?>
				</p>
			</div>
			<div class="conteiner">
				<h2 class="my_photo">Мои фото</h2><h2 class="my_albums">Мои альбомы</h2>
				<div class="content">
					<?php
							$idres = mysqli_query($connect, "SELECT * FROM `photo` WHERE `author` = '$login' ORDER BY `id` DESC");
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
								if ($id['hidden'] ==  NULL) {
									echo "<div class='item' id='".$id['id']."'>
											<img src='users/".$id['author']."/".$id['name']."'".">
											<span class='author'>Автор: ".$id['author']."</span>
											<br>
											<span class='date'>Дата публикации: ".$date."-".$month."-".$year."</span>
											<br>
											<span class='categories'>Категория: ".$categories."</span>
											<form action='' method='POST'>
												<input type='hidden' value='' class='for_id' name='forid'>
												<input type='submit' value='Удалить фото'' name='delphoto' class='dell' id='".$id['id']."'>
											</form>

										</div>";
									}else{
										echo "<div class='item' id='".$id['id']."'>
											<img src='users/".$id['author']."/".$id['name']."'".">
											<span class='author'>Автор: ".$id['author']."</span>
											<br>
											<span class='date'>Дата публикации: ".$date."-".$month."-".$year."</span>
											<br>
											<span class='categories'>Категория: ".$categories."</span>
											<p class='categories'>Это фото видите только вы.</p>
											<form action='' method='POST'>
												<input type='hidden' value='' class='for_id' name='forid'>
												<input type='submit' value='Удалить фото'' name='delphoto' class='dell' id='".$id['id']."'>
											</form>

										</div>";
									}
							}

				if (isset($_POST['delphoto'])) {
					$dellid = $_POST['forid'];
					$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `author` FROM `photo` WHERE `id` = '$dellid'"))['author'];
					$src = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `name` FROM `photo` WHERE `id` = '$dellid'"))['name'];
					mysqli_query($connect, "DELETE FROM `photo` WHERE `id` = '$dellid'");
					mysqli_query($connect, "ALTER TABLE `photo` AUTO_INCREMENT = 1");
					unlink('img/'.$src);
					unlink("users/"."$user"."/".$src);
					echo '<meta http-equiv="Refresh" content=" 0.01 ; URL = http://photo/index.php">';
					echo '<meta http-equiv="Refresh" content=" 0.01 ; URL = http://photo/profile.php">';
				}

					?>
				</div>
				<div class="albums">
					<div class="add_album"><a href="create_album.php"><img src="sistem_img/new_albums.png" alt="" class="plus"><h2 class="text_add">Создать новый альбом</h2></a></div>
					<?php
						foreach (scandir("users/".$login."/albums") as $folder) {
							 if (($folder !='.') && ($folder !='..') && ($folder !='index.php') && ($folder !='downloadfilealbum.php')){
								$photo = scandir("users/".$login."/albums"."/".$folder);
								require('style_albums.php');
							}

					}
					?>
				</div>
				</div>
			</div>
		</body>
	</html>