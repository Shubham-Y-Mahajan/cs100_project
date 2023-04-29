<?php 
session_start();?>
<html>
    <head>
        <title>Payment Successful</title>
        <link rel="stylesheet" href="homepage.css">
    </head>
    
    <body>
    <div id="main">S&S</div>

    <ul><div id="large">
            <li><a href="homepage.html">Logout</a></li>
            <li><a href="welcomeuser.php">Home</a></li>
            <li><a href="contact.html" target="_blank">Contact</a></li>
            <li><a href="menu.html" target="_blank">Explore Our Menu</a></li>
            <li><a href="about_us.html" target="_blank">About Us</a></li>
        </div>
        </ul>

<div id="welcome">
<?php
$file=fopen('textfiles/payments.txt','a+');
fwrite($file,$_SESSION["logged_in_user"]);
fwrite($file,$_POST["Cardholder"]."\n");
fwrite($file,$_SESSION["Price"]."\n");
fwrite($file,$_POST["bank"]."\n");
fwrite($file,$_POST["fourcard"]."\n");
fclose($file);
echo "Thank You ".$_POST["Cardholder"]."<br>";
echo "Your payment of INR ".$_SESSION["Price"]." has been completed successfully !<br><br>";
?>
</div>
<br>
<span id="link"><a href="homepage.html">Logout</a><br><br>
<a href="welcomeuser.php">Dashboard</a><br></span>

</body>
</html>


