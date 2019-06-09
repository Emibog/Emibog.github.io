<?php
	require_once('connectDB.php');
	session_start();
	$new_login = $_POST['login'];
	$new_pswrd = $_POST['pswrd'];
	$new_email = $_POST['email'];
	$checklogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$new_login'");
	$check = mysqli_fetch_assoc($checklogin);
	if( $check != 0) {
		echo "Аккаунт с таким логином уже существует, пожалуйста придумайте другой!";
		echo '<a href="registr.php">Вернуться</a>';
	}else{
		#ДЛЯ СОЗДАНИЯ ФАЙЛА АКТИВАЦИИ
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $rn = $randomString;
    $act_url = "/users/$new_login/$rn.php";
		$active_query = "UPDATE `users` SET `active`='1' WHERE `active_url` = '$act_url'";
		$cov = '"';
		$covone = "'";
		$reconnect = '<meta http-equiv="Refresh" content=" 0.01 ; URL = http://photo/index.php">';
		$scan = '$var = scandir("./")';
		$ln = '$length = sizeof($var)';
		$in = '$info = new SplFileInfo($var["$i"])';
		$rash = '$rashir = $info->getExtension()';
		$if = 'if ($rashir == "php"){';
		$hp = '$vr = $var["$i"]';
		$for = 'for($i = 2; $i < $length; $i++){';
		$unlk = 'unlink("$vr")';
		$sk = '}';
		$req = "require_once('../../connectDB.php')";
		$con = '$connect';
    $my = "mysqli_query";
    #--------------------------------
		if (isset($_POST['but'])) {
		 if ($_SESSION["rand"] == 1){
			if ($_POST['captcha'] == 'qgphjd' or $_POST['captcha'] == 'qGphJD') {
				$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
				$checkemail = mysqli_fetch_assoc($checkemailres);
					if( $checkemail != 0) {
						echo "Аккаунт с таким email ($new_email) уже зарегистрирован! Пожалуйста <a href='login.php'>войдите</a> в аккаунт или введите другой email.";
						echo '<a href="registr.php">Вернуться</a>';
					}else{
						mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `active`, `active_url`) VALUES ('$new_login', '$new_pswrd', '$new_email', '0', '/users/$new_login/$rn.php')");
						#$_SESSION["user_name"] = $new_login;
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Вы зарегистрировались!</p>";
						mkdir("users/"."$new_login", 0777, true);
						$handle = fopen("users/$new_login/$rn.php","w+"); // Открыть файл, сделать его пустым
						fwrite($handle,"<"."?"."php $req; ". "$my($con, $cov$active_query$cov); echo $covone$reconnect$covone; $scan; $ln; $for $in; $rash; $if $hp; $unlk; $sk $sk" ."?".">"); // Записать переменную в файл
						fclose($handle); // Закрыть файл
						mail($_POST["email"], 'Вы зарегистрировались на Ginvaellaest.ru!', "Ваш логин - $new_login.\r\nВаш пароль - $new_pswrd.\r\nСсылка для активации аккаунта - http://photo/users/$new_login/".$rn.".php>");
						echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
					}
			}else{
				echo "Неверно введена капча!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/registr.php">';
			}
		}elseif ($_SESSION["rand"] == 2) {
			if ($_POST['captcha'] == '6138B' or $_POST['captcha'] == '6138b') {
				$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
				$checkemail = mysqli_fetch_assoc($checkemailres);
					if( $checkemail != 0) {
						echo "Аккаунт с таким email ($new_email) уже зарегистрирован! Пожалуйста <a href='login.php'>войдите</a> в аккаунт или введите другой email.";
						echo '<a href="registr.php">Вернуться</a>';
					}else{
						mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `active`, `active_url`) VALUES ('$new_login', '$new_pswrd', '$new_email', '0', '/users/$new_login/$rn.php')");
						#$_SESSION["user_name"] = $new_login;
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Вы зарегистрировались!</p>";
						mkdir("users/"."$new_login", 0777, true);
						$handle = fopen("users/$new_login/$rn.php","w+"); // Открыть файл, сделать его пустым
						fwrite($handle,"<"."?"."php $req; ". "$my($con, $cov$active_query$cov); echo $covone$reconnect$covone; $scan; $ln; $for $in; $rash; $if $hp; $unlk; $sk $sk" ."?".">"); // Записать переменную в файл
						fclose($handle); // Закрыть файл
						mail($_POST["email"], 'Вы зарегистрировались на Ginvaellaest.ru!', "Ваш логин - $new_login.\r\nВаш пароль - $new_pswrd.\r\nСсылка для активации аккаунта - http://photo/users/$new_login/".$rn.".php>");
						echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
					}
			}else{
				echo "Неверно введена капча!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/registr.php">';
			}
		}elseif ($_SESSION["rand"] == 3) {
			if ($_POST['captcha'] == '76447') {
				$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
				$checkemail = mysqli_fetch_assoc($checkemailres);
					if( $checkemail != 0) {
						echo "Аккаунт с таким email ($new_email) уже зарегистрирован! Пожалуйста <a href='login.php'>войдите</a> в аккаунт или введите другой email.";
						echo '<a href="registr.php">Вернуться</a>';
					}else{
						mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `active`, `active_url`) VALUES ('$new_login', '$new_pswrd', '$new_email', '0', '/users/$new_login/$rn.php')");
						#$_SESSION["user_name"] = $new_login;
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Вы зарегистрировались!</p>";
						mkdir("users/"."$new_login", 0777, true);
						$handle = fopen("users/$new_login/$rn.php","w+"); // Открыть файл, сделать его пустым
						fwrite($handle,"<"."?"."php $req; ". "$my($con, $cov$active_query$cov); echo $covone$reconnect$covone; $scan; $ln; $for $in; $rash; $if $hp; $unlk; $sk $sk" ."?".">"); // Записать переменную в файл
						fclose($handle); // Закрыть файл
						mail($_POST["email"], 'Вы зарегистрировались на Ginvaellaest.ru!', "Ваш логин - $new_login.\r\nВаш пароль - $new_pswrd.\r\nСсылка для активации аккаунта - http://photo/users/$new_login/".$rn.".php>");
						echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
					}
			}else{
				echo "Неверно введена капча!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/registr.php">';
			}
		}elseif ($_SESSION["rand"] == 4) {
			if ($_POST['captcha'] == 'eating') {
				$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
				$checkemail = mysqli_fetch_assoc($checkemailres);
					if( $checkemail != 0) {
						echo "Аккаунт с таким email ($new_email) уже зарегистрирован! Пожалуйста <a href='login.php'>войдите</a> в аккаунт или введите другой email.";
						echo '<a href="registr.php">Вернуться</a>';
					}else{
						mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `active`, `active_url`) VALUES ('$new_login', '$new_pswrd', '$new_email', '0', '/users/$new_login/$rn.php')");
						#$_SESSION["user_name"] = $new_login;
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Вы зарегистрировались!</p>";
						mkdir("users/"."$new_login", 0777, true);
						$handle = fopen("users/$new_login/$rn.php","w+"); // Открыть файл, сделать его пустым
						fwrite($handle,"<"."?"."php $req; ". "$my($con, $cov$active_query$cov); echo $covone$reconnect$covone; $scan; $ln; $for $in; $rash; $if $hp; $unlk; $sk $sk" ."?".">"); // Записать переменную в файл
						fclose($handle); // Закрыть файл
						mail($_POST["email"], 'Вы зарегистрировались на Ginvaellaest.ru!', "Ваш логин - $new_login.\r\nВаш пароль - $new_pswrd.\r\nСсылка для активации аккаунта - http://photo/users/$new_login/".$rn.".php>");
						echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
					}
			}else{
				echo "Неверно введена капча!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/registr.php">';
			}
		}else{
			if ($_POST['captcha'] == 'W68HP' or $_POST['captcha'] == 'w68hp' or $_POST['captcha'] == 'w6 8hp' or $_POST['captcha'] == 'W6 8HP') {
				$checkemailres = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
				$checkemail = mysqli_fetch_assoc($checkemailres);
					if( $checkemail != 0) {
						echo "Аккаунт с таким email ($new_email) уже зарегистрирован! Пожалуйста <a href='login.php'>войдите</a> в аккаунт или введите другой email.";
						echo '<a href="registr.php">Вернуться</a>';
					}else{
						mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `active`, `active_url`) VALUES ('$new_login', '$new_pswrd', '$new_email', '0', '/users/$new_login/$rn.php')");
						#$_SESSION["user_name"] = $new_login;
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Вы зарегистрировались!</p>";
						mkdir("users/"."$new_login", 0777, true);
						$handle = fopen("users/$new_login/$rn.php","w+"); // Открыть файл, сделать его пустым
						fwrite($handle,"<"."?"."php $req; ". "$my($con, $cov$active_query$cov); echo $covone$reconnect$covone; $scan; $ln; $for $in; $rash; $if $hp; $unlk; $sk $sk" ."?".">"); // Записать переменную в файл
						fclose($handle); // Закрыть файл
						mail($_POST["email"], 'Вы зарегистрировались на Ginvaellaest.ru!', "Ваш логин - $new_login.\r\nВаш пароль - $new_pswrd.\r\nСсылка для активации аккаунта - http://photo/users/$new_login/".$rn.".php>");
						echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/index.php">';
					}
			}else{
				echo "Неверно введена капча!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/registr.php">';
			}
		}
	}
}
?>