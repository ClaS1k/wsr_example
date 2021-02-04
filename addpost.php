<?php
	$dbc=mysqli_connect('localhost', 'root', '', 'module_2');
	//подключаемся к бд
	
	$title=$_POST['title'];
	$subtitle=$_POST['subtitle'];
	$anons=$_POST['anons'];
	$content=$_POST['content'];
	//получаем данные из формы
	
	if(strlen($title)<3 or strlen($subtitle)<3 or strlen($anons)<3 or strlen($content)<3){
		echo "Некоторые поля слишком короткие!";
		exit();
	}
	
	$today=date("F j, Y, g:i a");
	
	$sql="INSERT INTO `posts`(`title`, `subtitle`, `anons`, `content`, `date`) VALUES ('$title', '$subtitle', '$anons', '$content', '$today')";
	mysqli_query($dbc, $sql);
	echo "Статья успешно создана!";
?>