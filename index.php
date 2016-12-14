<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bree Carrick | Home</title>
        <!--Import CSS and generic meta tags-->
        <?php include 'modules/links.html'; ?>
    </head>
    <body style="padding-top: 50px">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery-1.11.3.min.js"></script>

        <div class="container-fluid" id="wrapper">
            <!--Include with PHP: navigation, header, about, resume, portfolio, blog, contact, and footer-->
            <?php 
                include 'modules/navbar.html';
                include 'modules/header.html'; 
                include 'modules/about.html';
                include 'modules/resume.html';
                include 'modules/portfolio.html';
                include 'modules/blog.html';
                include 'modules/footer.html';
            ?>
        </div>
    </body>
</html>
