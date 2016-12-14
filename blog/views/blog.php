<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bree Carrick | Home</title>
        <!--Import CSS and generic meta tags-->
        <?php include 'views/links.php'; ?>
    </head>
    <body>
        <div class="container-fluid" id="wrapper">
        <?php
        include 'views/navigation.php';
        include 'views/header.php';
        ?>
        <main>
        <?php foreach ($blogPosts as $posts) : ?>
            <article>
                <h2 class="text-center"><?php echo $posts['title']; ?></h2>
                <hr>
                <div class="blogtext">
                    <p><?php echo $posts['post']; ?></p> <br><br>
                <p class="text-center">posted on: <?php echo $posts['date']; ?></p>
                </div>
            </article>
    <?php endforeach; ?>
        </main>

    <?php include 'views/footer.php'; ?>
        </div>
</body>


