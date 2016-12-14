<!doctype html>
<html lang="en-us">
  <head>

    <title>Teaching Presentation</title>
    <?php include '../../modules/links.html'; ?>
  </head>
<body style="padding-top: 50px">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>

<div class="container-fluid" id="wrapper">
  <?php 
    include '../../modules/navbar.html';
    include '../../modules/header.html';
    ?>
  <h1 class="text-center">PHP if/else control structures</h1>
  <p class="text-center"><iframe width="560" height="315" src="https://www.youtube.com/embed/kcwbfuI3U68" frameborder="0" allowfullscreen></iframe></p>
  <div id="smallcontain">
            <h1 class="text-center">Calculate your Discount</h1>
                <form action="display_discount.php" method="post">

                 <div id="data">
                        <label>Grand Total:</label>
                       <input type="text" name="grand_total"><br>
                  </div><br>

                  <div id="buttons">
                       <label>&nbsp;</label>
                     <input type="submit" class="btn btn-lg" id="blogbutton" value="Calculate Discount"><br><br>
                  </div>

                </form>
        </div>
<?php include '../../modules/footer.html'; ?>
</body>
</html>