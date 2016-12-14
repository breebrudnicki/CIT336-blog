<?php include '../view/header.php'; 
 //require_once '../model/database.php';
?>
<main>

    <h2>Register Product</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: 
        // Build the product registration form
        ?>
    
    <?php endif; ?>
        <form action="." method="post">
            <label>Customer: </label>
            <?php foreach ($customers as $customer) :?>
            <label>
                <?php echo $customer['firstName']. " ";?>
                <?php echo $customer['lastName'];?>
            </label>
            <input type="hidden" name="customer_id" value="<?php echo $customer['customerID'];?>">
            <br><br>
            <?php endforeach;?>
            <label>Product: </label>
            <select name="product">
                <?php foreach ($products as $product) : ?>
                <option value='<?php echo $product['name']; ?>'><?php echo $product['name']; ?></option>
                <?php endforeach; ?>
            </select> <br><br>
            <input type="submit" name="submit" value="Register"/><br>
            <input type="hidden" name="action" value="confirm">
        </form>

</main>
<?php include '../view/footer.php'; ?>