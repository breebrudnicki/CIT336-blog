<?php
// Get the DB connection
require_once 'database.php';

// Get all registered users from the visitors.registration table
$query = 'SELECT * from registration'; //use a where statement when you want to limit your search
$statement = $db->prepare($query);
//$statement->bindValue();
$statement->execute();
//fetch all to find all of the information and not just the first line (fetch is just the first line)
$registration = $statement->fetchAll();
$statement->closeCursor();

//var_dump($registration);
//exit;
//
// If there are registered users display them in the main element below
//$list = "<ul>";
//foreach ($registration as $user) {
//    $list .= "<li>" . $user['regFirstName'] . " ". $user['regLastName']. "</li>";
//}
//$list .= "</ul>";

// If there are no registered users, display the 'Nothing to see here paragraph'
//within the HTML

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Home | Ch. 4 Revisited</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Home Page</h1>
                <?php if (empty($registration)) { ?>
                <p>Nothing to see here. Why don't you register?</p>
                <?php } else { ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($registration as $user) : ?>
                    <tr>
                        <td><?php echo $user['regFirstName']; ?></td>
                        <td><?php echo $user['regLastName']; ?></td>
                        <td><?php echo $user['regEmail']; ?></td>
                        <td><!--form to send by post-->
                            
                            <form action="reg_edit.php" method="post">
                        <input type="hidden" name="reg_id"
                           value="<?php echo $user['regId']; ?>">
                        <input type="hidden" name="first_name"
                           value="<?php echo $user['regFirstName']; ?>">
                        <input type="hidden" name="last_name" 
                           value="<?php echo $user['regLastName']; ?>">
                        <input type="hidden" name="email" 
                           value="<?php echo $user['regEmail']; ?>">
                        <input type="submit" value="Edit">
                        </form>
                            <!--Link to send by get
                        <a href="reg_edit.php?id=$user[regId]">Edit</a></td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php } ?>
                
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>
