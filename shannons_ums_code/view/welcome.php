<?php session_start(); 
$loggedin = $_SESSION['loggedin'];
$firstname = $_SESSION['firstname'];
$usertype = $_SESSION['usertype'];
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome User</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Welcome | Mysharm2u Pets</h1>
		<div id="tools">
                <?php
          include 'meta.php';
                ?>  
                </div>
	</header>
	<main>
		<h1>Welcome</h1>
                
                <?php
                if($usertype == 'admin') {
                   echo "<p>Oh mighty $firstname, I await your command! Make sure to check your email to see if any add pet requests have been sent.</p>";
                    }
                    else {
                        echo "<p>Hi $firstname. </p>" ;
                    }
                ?>
<!--		<p>All fields are required.</p>-->
                <!--needs an action attribute which takes the info and passes it over to the form which is in a different location. The method tells how to get the information POST and GET.-->
<!--                <form action="index.php" method="post">
                    <fieldset>
				<label for="email">Email</label>
                                <input type="email" name="email" id="email" >
                                <label>Password</label>
                                <input type="password" name="password" id="password">
                               
				<label>&nbsp;</label>
				<input type="submit" name="action" value="Login">
			</fieldset>
		</form>-->
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>

