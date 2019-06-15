<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
	if ($login) {
	}else{
		echo "Вы не вошли в аккаунт!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
		exit();
	}
?>
<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Создание альбома</title>
</head>
<body>
	<?php
		$dir_name = $_POST['title'];
		$reqalbums = "require_once('../../../../sistem_img/index.php');";
		$reqadphoto = "require_once('../../../../sistem_img/downloadfilealbum.php')";
		$session = '$_SESSION["dirfile"]';
		/*ФАЙЛ С АЛЬБОМОМ*/
		mkdir("users/"."$login/albums/$dir_name", 0777, true);
		$file_albums = fopen("users/$login/albums/$dir_name/index.php","w+"); // Открыть файл, сделать его пустым
		fwrite($file_albums,"<"."?"."php ".$reqalbums." ?".">"); // Записать переменную в файл
		fclose($file_albums); // Закрыть файл
		$file_adphoto = fopen("users/$login/albums/$dir_name/downloadfilealbum.php","w+"); // Открыть файл, сделать его пустым
		fwrite($file_adphoto,"<"."?"."php session_start(); ".$session." = __DIR__ ;".$reqadphoto." ?".">"); // Записать переменную в файл
		fclose($file_adphoto);
		echo "<p class='php_text' style='margin-left: 42%;'>Альбом успешно создан!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/profile.php">';
	?>
</body>
</html>