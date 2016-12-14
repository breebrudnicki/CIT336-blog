<?php

        //pull the information from the index file
	$grand_total = filter_input(INPUT_POST, 'grand_total');
        
        //find the discount!
        if ($grand_total >= 200) {
             $modified_total = $grand_total * .7;
            $discount = "Congratulations, you get a 30% off discount today and free shipping! Your total is now $$modified_total";
        }
        elseif ($grand_total >= 100) {
            $modified_total = $grand_total * .7;
            $discount = "Congratulations, you get a 30% off discount today! Your total is now $$modified_total";
        }
        elseif ($grand_total >= 60) {
            $modified_total = $grand_total * .8;
            $discount = "Congratulations, you get a 20% off discount today! Your total is now $$modified_total";
        }
        elseif ($grand_total >= 30) {
            $modified_total = $grand_total * .9;
            $discount = "Congratulations, you get a 10% off discount today! Your total is now $$modified_total";
        }
        else {
            $discount = "Sorry, you do not recieve a discount today";
        }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../../modules/links.html'; ?>
    <title>Discount</title>

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
    
  <div id="smallcontain">
    <h1>Calculate your Discount</h1>

        <label>Grand Total:</label>
        <span><?php echo htmlspecialchars('$' . $grand_total); ?></span><br>

        <label>Discount:</label>
        <span><?php echo htmlspecialchars($discount); ?></span><br>
</div> 
    <?php include '../../modules/footer.html'; ?>
</body>
</html>

