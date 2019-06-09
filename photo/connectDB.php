<?php 
	
	if (($connect = mysqli_connect('localhost', 'root', '', 'photo'))) {
		
	}else{
		echo "Не удалось подключиться к базе данных!";
		exit();
	}

 ?>