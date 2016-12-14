<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php include 'views/links.php'; ?>
        <title>Blog Administration Dashboard</title>
    </head>

    <body>
        <div class="container-fluid" id="wrapper">
        <?php include 'views/navigation.php'; ?>
        <?php include 'views/header.php'; ?>
        <main class="dashboard">
    <h1>Blog Posts</h1>
    <?php
                if(isset($message)) {
                   echo "<p class='error'> $message </p>";
                    }
                ?>
    <form action="admin.php" method="post">
                <fieldset>
                    <label>&nbsp;</label>
                    <input class="blogbutton" type="submit" name="action" value="add post">
                </fieldset>
            </form>
    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
            <?php foreach ($blogPosts as $posts) : ?>
            <tr>
                <td><?php echo $posts['title']; ?></td>
                <td><?php echo $posts['date']; ?></td>
                <td><form action="admin.php" method="post">
                        <input type="hidden" name="title" value="<?php echo $posts['title']; ?>">
                        <input type="hidden" name="post" value="<?php echo $posts['post']; ?>">
                        <input type="hidden" name="blogPostID" value="<?php echo $posts['blogPostID']; ?>">
                    <input class="blogbutton" type="submit" name="action" value="edit">
                </form></td>
                <td><form action="admin.php" method="post">
                    <input type="hidden" name="blogPostID" value="<?php echo $posts['blogPostID']; ?>">
                    <input class="blogbutton" type="submit" name="action" value="delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
    
    </table>
        </main>
        <?php include 'views/footer.php'; ?>
        </div>
    </body>
</html>
