<?php //cookies
//get the number of visits from the cookie and store it in variable visits
$count;
//if cookie hasnt been defined
if (!isset($_COOKIE["pageCount"])) {
    ////set the visit count to 1
    $count = 1;   
//else
} else {
    /////increment the visits count
    $count = $_COOKIE["pageCount"];
    $count++;   
}
//set the cookie with the new updated value
setcookie("pageCount", $count, time() +1000);
?>
    <!doctype html>
    <html>

    <head>
        <title>Practicing PHP</title>
    </head>

    <body>
        <?php 
        $p = "paragraph";
        echo "<h1>Hello World!</h1>";
        
        ?>
            <?php //cookies
        echo "You have visited this page $count times!";
        ?>
    </body>

    </html>