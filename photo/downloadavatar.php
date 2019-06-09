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
	
	echo "Аватар успешно установлен!";

	echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';
	}else{
		echo "Недопустимое расширение файла!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/profile.php">';
	}

?>