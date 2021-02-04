<?php
	$dbc=mysqli_connect('localhost', 'root', '', 'module_2');
	//подключаемся к бд
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	//получаем данные из формы
	
	if(strlen($username)<3 or strlen($password)<3){
		echo "Имя пользователя либо пароль слишком короткие!";
		exit();
	}
	
	$sql="SELECT * FROM `users` WHERE `username`='$username'";
	$result=mysqli_query($dbc, $sql);
	//ищем в базе пользователей с таким-же логином
	if(mysqli_num_rows($result)>0){
		//если такие люди есть....
		echo "Такое имя пользователя уже занято!";
		exit();
	}else{
		//если ник свободен
		$pass_hash=password_hash($password, PASSWORD_DEFAULT);
		$sql="INSERT INTO `users`(`username`, `password`) VALUES ('$username','$pass_hash')";
		mysqli_query($dbc, $sql);
		header('Location: http://wsr/single.html');
	}
	
?>