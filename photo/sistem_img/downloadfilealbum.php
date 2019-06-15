<?php require_once('../../../../connectDB.php'); session_start(); $login = $_SESSION["user_name"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../../../../sistem_img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../../../css/php_text.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
	<title>Проверка файла</title>
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

	$lastname = $_FILES['file']['tmp_name'];
	$dir = opendir('./');
	$count = 0;
	while($file = readdir($dir)){
    if($file == '.' || $file == '..' || is_dir('./' . $file)){
        continue;
    }
    $count++;
	}
	$count = $count - 1;
	
  $dirfile = $_SESSION["dirfile"];
  $replace = "F:\OpenServer\OSPanel\domains\photo\users\ ";
  $replace = str_replace(" ", "", $replace);
  $dirfile = str_replace($replace.$login,"", $dirfile);
  $dirfile = str_replace('\\', '/', $dirfile);
	$url = "http://photo/users/$login$dirfile/";

	$namefile = $_FILES["file"]["name"];
	$ceck = 0;
	foreach (scandir("./") as $setname) {
		$col =  sizeof(scandir("./"));
		if ($col == 4) {
			$name = "1.jpg";
		}else{
		 if (($setname !='.') && ($setname !='..') && ($setname !='index.php') && ($setname !='downloadfilealbum.php')){
		 	if ($setname > $ceck) {
		 		$ceck = $setname;
		 	 
			$numbname = str_replace([".jpg", ".png", ".bmp", ".jpeg"], "", $ceck) + 1;
			$name = strval("$numbname".".jpg");
		}else{
			$name = "1.jpg";
		}
		}
		}
	}
	$info = new SplFileInfo($namefile);
	$rashir = $info->getExtension();
	if ($rashir == 'jpg' or $rashir == 'png' or $rashir == 'bmp' or $rashir == 'jpeg'){
	
	move_uploaded_file($_FILES['file']['tmp_name'], "./".$name);
	
	echo "<p class='php_text' style='margin-left: 43%;'>Файл успешно загружен!</p>";

	echo '<meta http-equiv="Refresh" content=" 1 ; URL = '.$url.'">';
	}else{
		echo "<p class='php_text' style='margin-left: 40%;'>Недопустимое расширение файла!</p>";
		echo '<meta http-equiv="Refresh" content=" 2 ; URL = '.$url.'">';
	}

?>
</body>
</html>