<?php 
	
	if (($connect = mysqli_connect('localhost', 'root', '', 'site'))) {
		
	}else{
		echo "Не удалось подключиться к базе данных!";
		exit();
	}

 ?>