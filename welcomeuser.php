<?php session_start(); ?>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>

    <div id="main">S&S</div>

<ul>
    <li><a href="homepage.html">Logout</a></li>
    <li><a href="#home">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>



</ul>

 <div id="welcome">  
<?php
    
    echo "Welcome"." ". $_SESSION["logged_in_user"]."<br>";
    echo "Choose Your Action";
?>
</div>

<div id="tbox">

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
