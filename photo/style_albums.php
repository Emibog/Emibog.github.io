<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style_albums.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/dell_albums.js"></script>
	<title>test</title>
</head>
<body>
	<div class='album' id='<?php echo "$folder" ?>'>
		<?php
			$name_fileres = scandir("users/".$login."/albums/$folder");
			$ln = sizeof($name_fileres) - 3;
			$name_file = $name_fileres[$ln];
		?>
		<a href="<?php echo "users/$login/albums/$folder" ?>"><img src="<?php if($ln <= 1){ echo "sistem_img/new_album.jpg"; }else{ echo "users/$login/albums/$folder/$name_file"; }?>">
		<span class='name_album'><?php echo "$folder"; ?></span></a>
		<form action='' method='POST'>
			<input type='hidden' value='' class='for_id' name='forid'>
			<input type='submit' value='Удалить альбом' name='delalbum' class='dell' id="<?php echo "$folder" ?>">
		</form>
		<?php
			if (isset($_POST['delalbum'])) {
						$path = "users/$login/albums/".$_POST['forid'];
						function rmRec($path) {
					  if (is_file($path)) return unlink($path);
					  if (is_dir($path)) {
					    foreach(scandir($path) as $p) if (($p!='.') && ($p!='..'))
					      rmRec($path.DIRECTORY_SEPARATOR.$p);
					    return rmdir($path); 
					    }
					  return false;
					  }
					  rmRec($path);
						echo '<meta http-equiv="Refresh" content=" 0.01 ; URL = http://photo/index.php">';
						echo '<meta http-equiv="Refresh" content=" 0.01 ; URL = http://photo/profile.php">';
			}
		?>
	</div>
</body>
</html>