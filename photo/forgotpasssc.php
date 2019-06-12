<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Смена пароля</title>
</head>
<body>
<?php
		$new_email = $_POST['email'];
		$_SESSION['forgotemail'] = $new_email;
		#ДЛЯ СОЗДАНИЯ ФАЙЛА АКТИВАЦИИ
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
     
    $rn = $randomString;
   	$file = "require_once('../../chang.php')";
    #--------------------------------
    $checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
		$checkemail = mysqli_fetch_assoc($checkemailres);
		$mail = $checkemail['email'];
		$login = $checkemail['login'];
		if ($mail == $_POST['email']) {
		
    $handle = fopen("users/$login/$rn.php","w+"); // Открыть файл, сделать его пустым
		fwrite($handle,"<"."?"."php $file; ?".">"); // Записать переменную в файл
		fclose($handle); // Закрыть файл
		mail($_POST["email"], 'Смена пароля на Ginvaellaest.ru!', "Ссылка для смены пароля - http://photo/users/$login/".$rn.".php>\r\n Если Вы получили это писмо случайно, то просто проигнорируйте его.");
		echo "<p class='php_text' style='margin-left: 42%;'>Письмо выслано Вам на почту.</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/login.php">';
	}else{
		echo "<p class='php_text' style='margin-left: 40%;'>Аккаунта с таким email не существует!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/forgotpass.php">';
	}

	?>
</body>
</html>