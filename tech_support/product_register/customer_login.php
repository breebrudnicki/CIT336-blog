<?php include '../view/header.php'; ?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>
    <!-- Build a login form similar to the one shown in the exam directions -->
    <form action="." method="post">
        <label for="email">Email:</label>
        <input type="email" name ="email" placeholder="email@domain.com"> <br>
        <label for="password">Password:</label>
        <input type="password" name="password"> <br>
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Login"/><br>
        <input type="hidden" name="action" value="product_registration">
    </form>

</main>
<?php include '../view/footer.php'; ?>