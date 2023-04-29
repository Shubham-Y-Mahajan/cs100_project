<?php session_start(); ?>
<html>
    <head>
        <title>Booking Already Exists  !</title>
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


<div id="welcome">Booking failed<br>
Booking Already Exists for <?php echo $_SESSION["logged_in_user"]; ?> !<br><br></div> 
<span id="link"><a href="welcomeuser.php">Dashboard</a><br><br>
<a href="homepage.html">Logout</a><br></span>
</body>
</html>