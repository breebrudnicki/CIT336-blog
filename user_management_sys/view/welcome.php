<?php session_start(); 
$loggedin = $_SESSION['loggedin'];
$name = $_SESSION['firstname'];
$usrType = $_SESSION['usertype'];
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Registration | Ch. 4 Revisited</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Welcome | Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Welcome</h1>
                <?php
                if(isset($message)) {
                   echo "<p> $message </p>";
                    }
                ?>
		
                <?php if ($usrType == 'admin') {
                    echo "<h2>Welcome $name, you are awesome. :) </h2>";
                } else {
                    echo "<p>Welcome $name.</p>";
                    if ($name == 'Lance') {
                        echo "<p>Also you're cute ;)</p>";
                    }
                }
                        
                ?>
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>

