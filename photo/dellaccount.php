<?php
				require_once('connectDB.php');
				session_start();
				$login = $_SESSION["user_name"];
				if (isset($_POST['dellaccount'])) {
			
					$log = $_SESSION["user_name"];
					if ($log) {
						$user_emailres = mysqli_query($connect, "SELECT `email` FROM `users` WHERE `login` = '$login'");
						$user_email = mysqli_fetch_assoc($user_emailres)['email'];
						mail("$user_email", 'Ваш аккаунт был полность удален с Ginvaellaest.ru!', "$login, Ваш аккаунт упешно удален!\r\nСпасибо, что были с нами!");
						mysqli_query($connect, "DELETE FROM `users` WHERE `login` = '$log'");
						
						$var = scandir("users/$login/");
						$length = sizeof($var);					
						for($i = 2; $i < $length; $i++){
							$name_file = $var[$i];
							mysqli_query($connect, "DELETE FROM `photo` WHERE `name` = '$name_file'");
							unlink("users/$login/$name_file");
						}
						if (file_exists("users/"."$login"."/")) {
						rmdir("users/"."$login"."/");
						}
						echo "<p style='dispay: block; margin-left: 40%; font-size: 50px;'>Аккаунт успешно удален!</p>";
						echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';
					}else{
						echo "Вы не вошли в аккаунт! <br>";
						echo '<a href="profile.php" style="color: #070707;">Войти в аккаунт.</a>';
					}
						$_SESSION["user_name"] = null;
				}
?>