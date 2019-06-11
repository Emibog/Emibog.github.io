<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Проверка файла</title>
</head>
<body>
<?php
	if ($login) {
	}else{
		echo "<p class='php_text' style='margin-left: 43%;'>Вы не вошли в аккаунт!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}
?>
<?php	
	require_once('connectDB.php');

	session_start();
	
	

	$userdir = "users/".$_SESSION['user_name']."/";
	$lastname = $_FILES['file']['tmp_name'];
	$namefile = $_FILES["file"]["name"];
	$info = new SplFileInfo($namefile);
	$rashir = $info->getExtension();
	if ($rashir == 'jpg' or $rashir == 'png' or $rashir == 'bmp' or $rashir == 'jpeg'){
	$namee = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id` FROM `photo` ORDER BY `id` DESC"));
	if ($namee['id'] == 0) {
		mysqli_query($connect, "ALTER TABLE `photo` AUTO_INCREMENT = 1");
	}
	$namehelp = $namee['id'] + 1;
	$name = strval("$namehelp".".jpg");

	move_uploaded_file($_FILES['file']['tmp_name'], 'img/'. $name);

	$user = $_SESSION['user_name'];
	
	$cattitle = $_POST['categories'];
	$catidres = mysqli_query($connect, "SELECT `id` FROM `categories` WHERE `title` = '$cattitle'");
	$catid = mysqli_fetch_assoc($catidres)['id'];
	if ($_POST['hidden'] == 1) {
		mysqli_query($connect, "INSERT INTO `photo`(`name`, `author`, `categories`, `hidden`) VALUES ('$name', '$user', '$catid', '1')");
	}else{
		mysqli_query($connect, "INSERT INTO `photo`(`name`, `author`, `categories`, `hidden`) VALUES ('$name', '$user', '$catid', NULL)");
	}

	copy("img/".$name, $userdir."/".$name);
	
	echo "<p class='php_text' style='margin-left: 43%;'>Файл успешно загружен!</p>";

	echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/profile.php">';
	}else{
		echo "<p class='php_text' style='margin-left: 40%;'>Недопустимое расширение файла!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/profile.php">';
	}

?>
</body>
</html>