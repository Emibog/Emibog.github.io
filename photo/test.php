<?php require_once('connectDB.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="POST">

				<input type="radio" name="course" value="ASP.NET" />ASP.NET <br>
<input type="radio" name="course" value="PHP" />PHP <br>
<input type="radio" name="course" value="Ruby" />RUBY <br>
<input type="submit" name="sub">

			</form>
			<?php
if (isset($_POST['sub'])) {

    $course = $_POST['course'];
    echo "$course";
}


?>
</body>
</html>

