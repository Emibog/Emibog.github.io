<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];
		 $avach = mysqli_query($connect, "SELECT `avatar` FROM `users` WHERE `login` = '$login'");
		 $ava = mysqli_fetch_assoc($avach)['avatar'];
			if($ava == 'avatar.png'){
				mysqli_query($connect, "UPDATE `users` SET `avatar` = NULL WHERE `login` = '$login'");
				unlink("users/"."$login"."/avatar.png");
				echo "Аватар успешно удален!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/settingsprofile.php">';
			}else{
				echo "У вас не установлен аватар!";
				echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/settingsprofile.php">';
			}
?>