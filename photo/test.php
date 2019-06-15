<?php require_once('connectDB.php'); session_start(); $login = $_SESSION["user_name"];?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="sistem_img/logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/test.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/script.js"></script>
	<title>test</title>
</head>
<body>
	<div class='album' id='<?php echo "$folder" ?>'>
											<a href="<?php echo "users/$login/albums/$folder" ?>"><img src='users/Bodik/albums/test/58652d43220ef.jpg'.></a>
											<span class='name_album'>ts</span>
											<form action='' method='POST'>
												<input type='hidden' value='' class='for_id_album' name='foridalbum'>
												<input type='submit' value='Удалить альбом' name='delalbum' class='dellalbum' id="del_album">
											</form>

										</div>
</body>
</html>