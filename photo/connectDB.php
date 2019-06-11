<?php 
	
	if (($connect = mysqli_connect('localhost', 'root', '', 'photo'))) {
		
	}else{
		echo "<p class='php_text' style='margin-left: 43%;'>Не удалось подключиться к базе данных!</p>";
		exit();
	}

 ?>