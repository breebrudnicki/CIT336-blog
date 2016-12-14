<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<?php include 'views/links.php'; ?>
        <title>Blog Administration Login</title>
</head>

<body>
    <div class="container-fluid" id="wrapper">
    <?php include 'views/navigation.php'; ?>
    <?php include 'views/header.php'; ?>
    <main class="login">
        <h1>Login to Manage Blog</h1>
                <?php
                if(isset($message)) {
                   echo "<p class='error'> $message </p>";
                    }
                ?>
        <form action="admin.php" method="post">
            <fieldset>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required placeholder="email@domain.com"> <br>
                <label>Password</label><br>
                <input type="password" name="password" id="password" required> <br><br>

                <label>&nbsp;</label>
                <input class="button" type="submit" name="login" value="login">
            </fieldset>
        </form>
    </main>
    <?php include 'views/footer.php'; ?>
    </div>
</body>
</html>
