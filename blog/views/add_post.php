<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php include 'views/links.php'; ?>
        <title>Add Post to Bree Carrick Blog</title>
    </head>

    <body>
        <div class="container-fluid" id="wrapper">
        <?php include 'views/navigation.php'; ?>
        <?php include 'views/header.php'; ?>
        <main class="format blogtext">
            <h1>Add New Post</h1>
            <?php
            if (isset($error)) {
                echo "<p class='error'> $error </p>";
            }
            ?>
            <p>All fields are required.</p>
            <form action="admin.php" method="post">
                <fieldset>
                    <label for="title">Title</label> <br>
                    <input type="text" name="title" id="title" size="100" required<?php
                    if (isset($title)) {
                        echo "value='$title'";
                    }
                    ?>> <br>
                    <label for="post">Post</label> <br>
                    <textarea type="text" name="post" id="post" cols="100" rows="50" required><?php
                    if (isset($post)) {
                        echo $post;
                    }
                    ?></textarea>
                    <!--<input type="text" name="post" id="post" <?php
                    //if (isset($post)) {
                        //echo "value='$post'";
                    //}
                    ?>>--> <br>

                    <label>&nbsp;</label>
                    <input class="blogbutton" type="submit" name="action" value="publish">
                </fieldset>
            </form>
        </main>
<?php include 'views/footer.php'; ?>
        </div>
    </body>
</html>
