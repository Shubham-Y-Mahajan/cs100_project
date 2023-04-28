<?php 
session_start();?>
<html>
    <head>
        <title>Payment Successful</title>
        <link rel="stylesheet" href="homepage.css">
    </head>
    
    <body>
    <div id="main">S&S</div>

    <ul>
        <li><a href="register.html">register</a></li>
        <li><a href="Login.html">login</a></li>
        <li><a href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
    </ul>
    <br>

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


