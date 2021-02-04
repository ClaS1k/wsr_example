<?php
	$dbc=mysqli_connect('localhost', 'root', '', 'module_2');
	//подключаемся к бд
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if(strlen($username)<3 or strlen($password)<3){
		echo "Имя пользователя либо пароль слишком короткие!";
		exit();
	}
	
	$sql="SELECT * FROM `users` WHERE `username`='$username'";
	$result=mysqli_query($dbc, $sql);
	if(mysqli_num_rows($result)<1){
		echo "Неверное имя пользователя!";
	}else{
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
		$password_hash=$row['password'];
		if (password_verify($password, $password_hash)){
			header('Location: http://wsr/single.html');
		}else{
			echo "Неверный пароль!";
		}
	}
?>