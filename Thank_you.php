<?php 
session_start();

$file=fopen('payments.txt','a+');
fwrite($file,$_SESSION["logged_in_user"]);
fwrite($file,$_POST["Cardholder"]."\n");
fwrite($file,$_SESSION["price"]."\n");
fwrite($file,$_POST["bank"]."\n");
fwrite($file,$_POST["fourcard"]."\n");
fclose($file);
echo "Thank You ".$_POST["Cardholder"]."<br>";
echo "Your payment of INR ".$_SESSION["price"]." has been completed successfully !";
?>
<html>
    <body>
    <a href="homepage.html">Logout</a><br>
    <a href="welcomeuser.php">Dashboard</a><br>
</body>
</html>


