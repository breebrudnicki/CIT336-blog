<!doctype html>
<html lang="en-us">
  <head>

    <title>Teaching Presentation</title>
    <?php include '../modules/links.html'; ?>
  </head>
<body style="padding-top: 50px">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>

<div class="container-fluid" id="wrapper">
  <?php 
    include '../modules/navbar.html';
    include '../modules/header.html';
    ?>
  <h1 class="text-center">Project Walk through</h1>
  <p class="text-center"><iframe width="420" height="315" src="https://www.youtube.com/embed/YFJBU38z-BQ" allowfullscreen></iframe></p>
  <h3 class="text-center">Get to the other parts of my project</h3>
  <ul class="text-center">
      <li><a href="/blog/admin.php">Administrative Login</a></li>
      <li><a href="/blog/index.php">Blog</a></li>
  </ul>
<?php include '../modules/footer.html'; ?>
</div>
</body>
</html>