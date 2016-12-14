<?php

        //pull the information from the index file
	$product_description = filter_input(INPUT_POST, 'product_description');
	$list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
	$discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);
        
        //validation (no blank entries!!)
        if ( empty($product_description)) {
            $error_message = "Please enter a product description.";
        }
        else if ($list_price === FALSE) {
                $error_message = "Please enter a list price.";
        }
        else if ($discount_percent === FALSE) {
                $error_message = "Please enter a discount percent.";
        }
        else {
            $error_message = "";
        }
        
       // Bring to index page if there is an error message
       if ($error_message != "") {
           include ('index.php');
           exit();
       }
       
        //declare sales tax
        $sales_tax = .08;
        
        //calculations
        $discount_amount = $list_price * $discount_percent * .01;
        $discount_price = $list_price - $discount_amount;
        $sales_tax_rate = $sales_tax * 100;
        $sales_tax_amount = $discount_price * $sales_tax;
        
        //round to two decimals
        $list_price_r = round($list_price, 2);
        $discount_percent_r = round($discount_percent, 2);
        $discount_amount_r = round($discount_amount, 2);
        $discount_price_r = round($discount_price, 2);
        $sales_tax_amount_r = round($sales_tax_amount, 2);
        
        //format for better readibility
        $list_price_f = '$' . $list_price_r;
        $discount_percent_f = $discount_percent_r.'%';
        $discount_amount_f = '$' . $discount_amount_r;
        $discount_price_f = '$' . $discount_price_r;
        $sales_tax_rate_f = $sales_tax_rate . '%';
        $sales_tax_amount_f = '$'.$sales_tax_amount_r;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="ch2en.css">
</head>
<body>
    
    <main>
        
        <div class="calculator">
        <h1>Product Discount Calculator</h1>
        <p class="error"><?php echo $error_message; ?></p>
        
        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo htmlspecialchars($discount_amount_f); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo htmlspecialchars($discount_price_f); ?></span><br><br>
        
        <label>Sales Tax Rate:</label>
        <span><?php echo htmlspecialchars($sales_tax_rate_f); ?></span><br>
        
        <label>Sales Tax Amount:</label>
        <span><?php echo htmlspecialchars($sales_tax_amount_f); ?></span><br>
        </div>
        
    </main>
    
</body>
</html>

