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

	mysqli_query($connect, "INSERT INTO `photo`(`name`, `author`, `categories`) VALUES ('$name', '$user', '$catid')");

	copy("img/".$name, $userdir."/".$name);
	
	echo "Файл успешно загружен!";

	echo '<meta http-equiv="Refresh" content=" 1 ; URL = http://photo/index.php">';
	}else{
		echo "Недопустимое расширение файла!";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = http://photo/profile.php">';
	}

?>
