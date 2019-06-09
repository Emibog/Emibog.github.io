<?php
		require_once('connectDB.php');
		session_start();
		$login = $_POST['login'];
		$pswrd = $_POST['pswrd'];
		if (isset($_POST['but'])) {
			$result_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND password = '$pswrd'");
			if ( mysqli_num_rows($result_login) != 0) {
				$check_activeres = mysqli_query($connect, "SELECT `active` FROM `users` WHERE `login` = '$login' AND password = '$pswrd'");
				$check_active = mysqli_fetch_assoc($check_activeres);
				if( $check_active['active'] == 1){
					$_SESSION["user_name"] = $login;
					echo $_SESSION["user_name"].", ";
					echo "Вы вошли!";
					echo '<meta http-equiv="Refresh" content=" 0.65 ; URL = http://photo/index.php">';
				}
				else{
					echo "Вы не подтвердили аккаунт! Пожалуйста проверьте почту и перейдите по ссылке в письме!";
				}
			}else{
				echo "Неверный логин или пароль! <a href='login.php'>Попробуйте снова</a> или "."<a href='registr.php'>зарегистрируйтесь!</a>";
			}
		}
		?>