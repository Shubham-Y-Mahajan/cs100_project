<?php session_start(); ?>
<html>
<head>
        <title>View Bookings</title>
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



    <div id="welcome">View Your Booking Status</div><br><br><br><br>
    <div id="tbox">
    <br>


<div id="box">
<div id="enlarge">

<?php 
$file1=fopen('textfiles/bookings.txt','r');



// this is repect to clients file afterwards make it compatible for bookings file
    //$check=0;
    $Username=NULL;
    $date=NULL;
    $foodpackage=NULL;
    $guest=NULL;
    $District=NULL;
    $address=NULL;
    $request=NULL;
    $blankline=NULL;
    $Event=NULL;
    $cost_pp=NULL;
    $cost_additional=NULL;
    $Total_cost=NULL;
    $check=0;
   
    
    while (!feof($file1)) 
    {
        while(1)
        {
            $blankline=fgets($file1);
            if($blankline!="\n")
            {
                $Username=$blankline;
                break;
            }
        }
        $Event=fgets($file1);
        $date=fgets($file1);
        
        $veg=fgets($file1);
        $nonveg=fgets($file1);
        $chinese=fgets($file1);
        $mexican=fgets($file1);
        $beverage=fgets($file1);
        $chaat=fgets($file1);
        $dosa=fgets($file1);
        $dessert=fgets($file1);
        
        $guest=fgets($file1);
        $District=fgets($file1);
        $address=fgets($file1);
        $request=fgets($file1);
        $livecount=0;
        
        if(strcmp( $_SESSION["logged_in_user"],$Username)==0 )
        {
            $check=1;
            echo "User : ".$Username."<br>";
            
            echo "Date : ".$date."<br>";
            
            echo "Food packages chosen :"."<br><br>";
            if($veg>0)
            {
                echo "Indian Veg<br>";
            }
            if($nonveg>0)
            {
                echo "Indian Non Veg<br>";
            }
            if($chinese>0)
            {
                echo "Chinese<br>";
            }
            if($mexican>0)
            {
                echo "Mexican<br>";
            }
            echo "<br>Live Counters chosen :"."<br><br>";
            if($beverage>0)
            {
                $livecount++;
                echo "Beverages<br>";
            }
            if($chaat>0)
            {
                $livecount++;
                echo "Chaat<br>";
            }
            if($dosa>0)
            {
                $livecount++;
                echo "Dosa<br>";
            }
            if($dessert>0)
            {
                $livecount++;
                echo "Desserts<br>";
            }
            if($livecount==0)
            {
                echo "None<br><br>";
            }
            echo"<hr>";

            echo " number of guests :".$guest."<br>";
          
            echo "Location of event :".$address."<br>";
            

           echo " Payment made of INR ".$_SESSION["Price"]."<br>";


            
            break;
           
        }
    }
    
    if($check==0)
    {
        echo "No Bookings were made<br><br>";
    }
    ?>
</div id="enlarge">
        
<span id="link"><a href="welcomeuser.php">Dashboard</a><br><br>

<a href="homepage.html">Logout</a><br><br></span>
</div>
</body>
</html>
