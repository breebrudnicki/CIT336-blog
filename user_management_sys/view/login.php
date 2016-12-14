<?php session_start(); ?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Registration | Ch. 4 Revisited</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Login | Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Login</h1>
                <?php
                if(isset($message)) {
                   echo "<p> $message </p>";
                    }
                ?>
		<p>All fields are required.</p>
                <!--needs an action attribute which takes the info and passes it over to the form which is in a different location. The method tells how to get the information POST and GET.-->
                <form action="index.php" method="post">
                    <fieldset>
				<label for="email">Email</label>
                                <input type="email" name="email" id="email" >
                                <label>Password</label>
                                <input type="password" name="password" id="password">
                               
				<label>&nbsp;</label>
				<input type="submit" name="action" value="Login">
			</fieldset>
		</form>
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>

