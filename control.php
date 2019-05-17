<?php
session_start();
	if($_SESSION['login_true'] != 'yes' || $_SESSION['login_true'] == 'no')
	{

		?>
		<script>
			window.location.href = "http://localhost/login.php";
		</script>
		<?php
	}

	if($_SESSION['login_true'] == 'yes')
	{
			?>
		<script>
			window.location.href = "http://localhost/index.php";
		</script>
		<?php
	}


	$username = $_POST['username'];
	$pass = $_POST['password'];

	
	mysql_connect("localhost", "root","");
	mysql_select_db("PayPal_Task");


	
	

	$user = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$pass' ");


	
	$results = mysql_fetch_array($user);
	

	if($results['username'] == $username && $results['password'] == $pass)
	{	
		$_SESSION['name'] = $results['name'];
		$_SESSION['surname'] = $results['surname'];
		$_SESSION['email'] = $results['email'];
		$_SESSION['login_true'] = 'yes';

		echo "Success!!";

		?>

			<script type="text/JavaScript">
			      setTimeout("location.href = 'http://localhost/index.php';",500);
         	</script>

		<?php
		
		
	}

	else
	{
		echo "wrong username or password";
		?>

			<script type="text/JavaScript">
			      setTimeout("location.href = 'http://localhost/login.php';",500);
         	</script>

		<?php
	}
?>