<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bree Carrick | Home</title>
    <!--Import CSS and generic meta tags-->
    <?php include '../modules/links.html'; ?>
</head>

<body style="padding-top: 50px">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <div class="container-fluid" id="wrapper">
        <?php 
            include '../modules/navbar.html'; 
            include '../modules/header.html';
        ?>
        <div class="jumbotron" id="contact">
            <h1 class="text-center">Lets get in touch.</h1>
            <p class="text-center">
                <a href="https://www.pinterest.com/BreeCarrick/" target="_blank" class="socialmedia">
                    <img src="/images/pinterestw-01.png" alt="pinterest" width="50" height="50" class="socialmedia" />
                </a>
                <a href="https://www.instagram.com/breetato/" target="_blank">
                    <img src="/images/instagramw-03.png" alt="instagram" width="50" height="50" class="socialmedia" />
                </a>
                <a href="www.linkedin.com/in/breecarrick" target="_blank">
                    <img src="/images/linkedinw-02.png" alt="linkedin" width="50" height="50" class="socialmedia" />
                </a>
                <a href="/index.php#contact">
                    <img src="/images/emailw-04.png" alt="" email width="50" height="50" class="socialmedia" />
                </a>
            </p>
            <form id="contactform" name="contactform" method="post" action="index.php">
                <label for="name">Name:</label>
                <br>
                <input type="text" name="name" id="name" placeholder="First and Last Name" size="50" value="<?php echo $name;?>">
                <br>
                <label for="email">Email:</label>
                <br>
                <input type="email" name="email" id="email" placeholder="example@domain.com" size="50" value="<?php echo $email;?>">
                <br>
                <label for="subject">Subject:</label>
                <br>
                <input type="text" name="subject" id="subject" placeholder="subject" size="50" value="<?php echo $subject; ?>">
                <br>
                <label for="message">Message:</label>
                <br>
                <textarea name="message" id="message" cols="50" rows="10"><?php echo $message;?></textarea>
                <br>
                <!-- This displays the captcha image -->
                <label>&nbsp;</label><img id="captcha" src="captcha_images.php?width=100&amp;height=40&amp;characters=5" alt="captcha image"> (Type these characters into the text box below)
                <!-- This allows the user to type in what they see -->
                <label for="cap_code">Security Code:</label><input id="cap_code" name="cap_code" type="text" size="6">
                <?php
                    if(!empty($errors)) {
                        echo '<ul class="notify">';
                        foreach($errors as $error){
                            echo "<li>$error</li>";
                        }
                        echo '</ul>';
                        unset($errors);
                    }
                ?>
                <label for='action'>&nbsp;</label>
                <input name="action" id ="action" type="submit" class="button btn-lg btn" id="submitbtn action" value="Send">
            </form>
        </div>
        <?php include '../modules/footer.html'; ?>
    </div>
</body>

</html>