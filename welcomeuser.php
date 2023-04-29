<?php session_start(); ?>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>

    <div id="main">S&S</div>

<ul><div id="large">
    <li><a href="homepage.html">Logout</a></li>
    <li><a href="contact.html" target="_blank">Contact</a></li>
    <li><a href="menu.html" target="_blank">Explore Our Menu</a></li>
</div>
</ul>

 <div id="welcome">  
<?php
    
    echo "Welcome"." ". $_SESSION["logged_in_user"]."<br>";
    echo "Choose Your Action";
?>
</div>

<div id="tbox">
<br><br><br>
<div id="box">
    <span id="link"><a href="book.html">Book your service!</a><br><br>
    <a href="surecancel.html">Cancel your Booking</a><br><br>
    <a href="view_booking.php">View your booking status</a><br><br>
    <a href="menu.html" target="_blank">Explore Our Menu</a><br><br>
</span>
</div>
</div>
    



</body>
</html>
