<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Выход</title>
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
		$_SESSION["user_name"] = null;
		echo "<p class='php_text' style='margin-left: 43%;'>Вы вышли из аккаунта!</p>";
		echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';

?>
</body>
</html>