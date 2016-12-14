<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php include 'views/links.php'; ?>
        <title>Edit Post for Bree Carrick Blog</title>
    </head>

    <body>
        <div class="container-fluid" id="wrapper">
        <?php include 'views/navigation.php'; ?>
        <?php include 'views/header.php'; ?>
        <main class="format blogtext">
            <h1>Edit Post</h1>
            <?php
            if (isset($error)) {
                echo "<p class='error'> $error </p>";
            }
            ?>
            <p>All fields are required.</p>
            <form action="admin.php" method="post">
                <fieldset>
                    <label for="title">Title</label> <br>
                    <input type="text" name="title" id="title" size="100" required <?php echo "value='$title'";?>> <br>
                    <label for="post">Post</label> <br>
                    <textarea type="text" name="post" id="post" cols="100" rows="50" required><?php echo $post; ?></textarea> <br>
                    <!--<input type="text" name="post" id="post" <?php //echo "value='$post'"; ?>> <br>-->
                    <input type="hidden" name="blogPostID" value="<?php echo $blogPostID; ?>">
                    <label>&nbsp;</label>
                    <input class="blogbutton" type="submit" name="action" value="publish changes">
                </fieldset>
            </form>
        </main>
<?php include 'views/footer.php'; ?>
        </div>
    </body>
</html>
