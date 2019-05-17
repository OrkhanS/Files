<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php 
			if($_SESSION['yes'] == 0)
			{
				echo "Please choose different username";
				$_SESSION['yes'] = 1;
			}

	?>


	<div id="login">
			<form action="control2.php" method="post">
					Username: <input type="text" name="username" required> <br>
					Email: <input type="text" name="email" required><br>
					Name:  <input type="text" name="name" required> <br>
					Surname:  <input type="text" name="surname" required> <br>
					Password:  <input type="password" name="password" required>
						<input type="submit">
			</form>
	</div>





</body>
</html>