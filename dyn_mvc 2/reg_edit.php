<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Edit Registration | Ch. 4 Revisited</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Edit Registration</h1>
		<p>All fields are required.</p>
		<form>
			<fieldset>
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" id="firstName">
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" id="lastName">
				<label for="email">Email</label>
				<input type="email" name="email" id="email">
				<label>&nbsp;</label>
				<input type="submit" name="submit" value="Register">
			</fieldset>
		</form>
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>
