<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Home | Ch. 4 Revisited</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Home Page</h1>
		<?php
                if(!isset($list)){
		echo '<p>Nothing to see here. Why don\'t you register?</p>';
                } else {
                    echo $list;
                }?>
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>
