<?php session_start(); ?>
<html>
<body>
   
<?php
    
    echo "Welcome"." ". $_SESSION["logged_in_user"];
    echo "Choose action";
?>
    <a href="book.html">Book your service!</a><br>
    <a href="surecancel.html">Cancel your Booking</a><br>
    <a href="homepage.html">Logout</a><br>
    <a href="view_booking.php">View your booking</a><br>
    



</body>
</html>
