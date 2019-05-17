<?php 

	
	session_start();
	
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	
	mysql_connect("localhost", "root","");
	mysql_select_db("PayPal_Task");


	$user = mysql_query("SELECT * FROM users WHERE password = '$pass' ");	
	$results = mysql_fetch_array($user);


	if($results['username'] == $username)
	{
		$_SESSION['yes'] = 0;
		header("Location: http://localhost/sign_up.php");
	}

	else
	{
		echo"add";
		$id = $results['id']+1;
		mysql_query("INSERT INTO `users`(`id`, `username`, `name`, `surname`, `email`, `password`) VALUES ('$id','$username','$name','$surname','$email','$password') ");

	}



 ?>