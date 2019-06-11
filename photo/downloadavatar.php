<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Загрузка аватара</title>
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
	
	$login = $_SESSION['user_name'];

	$userdir = "users/".$_SESSION['user_name']."/";
	$lastname = $_FILES['file']['tmp_name'];
	$namefile = $_FILES["file"]["name"];
	$info = new SplFileInfo($namefile);
	$rashir = $info->getExtension();
	if ($rashir == 'jpg' or $rashir == 'png' or $rashir == 'bmp' or $rashir == 'jpeg'){
	
	$name = 'avatar.png';

	move_uploaded_file($_FILES['file']['tmp_name'], 'users/'.$_SESSION['user_name'].'/'.$name);
	mysqli_query($connect, "UPDATE `users` SET `avatar` = '$name' WHERE `login`  = '$login'");
	
	echo "<p class='php_text' style='margin-left: 41%;'>Аватар успешно установлен!</p>";

	echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/settingsprofile.php">';
	}else{
		echo "<p class='php_text' style='margin-left: 41%;'>Недопустимое расширение файла!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/settingsprofile.php">';
	}

?>
</body>
</html>