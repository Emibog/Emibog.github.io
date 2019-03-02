<?php 
	require_once('connect.php');
	$href = $_POST["href"];
	$img = $_POST["img"];
	if (mysqli_query($connect, "INSERT INTO `365` (`href`, `img`) VALUES ('$href', '$img')")){
		echo "Видео успешно добавлено!";
	}else{
		echo "Произошла ошибка!";
	}
	echo '<meta http-equiv="Refresh" content=" 0.65 ; URL = http://site/video.php">';
?>