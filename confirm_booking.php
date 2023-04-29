<?php session_start(); ?>
<html>
<head>
        <title>Home Page</title>
        <link rel="stylesheet" href="confirm.css">
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



    <div id="welcome">Welcome To Our Website</div><br><br><br><br>
    <div id="tbox">
    <br>

<div id="box"><div id="text">
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
            echo "<b>User : </b>".$Username."<br><hr size=10px color=red><hr color=black>";
            
            echo "Date : ".$date."<br><br>";

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
            echo " <br>number of guests :".$guest."<br><br>";
          
            echo "Location of event :".$address."<br><br>";
            

            $cost_pp=((($veg+$nonveg+$chinese+$mexican+$beverage+$chaat+$dosa+$dessert)*100) +($Event*50));
            $cost_additional=(($District*3*$guest) + $cost_pp);

            echo"<hr>";
            echo "Cost per plate =" .$cost_pp."<br><br>" ;
            echo "Additional Cost (transportation ,staff etc) =". $cost_additional."<br><br>" ;
            echo "Cost (excluding taxes) = ".($cost_additional+($cost_pp*$guest))."<br><br>";
            $Total_cost=1.18*($cost_additional+($cost_pp*$guest));
            echo"<hr>";
            echo "Cost (including 18% GST) = ".$Total_cost."<br><br>";
            echo"<hr>";
            echo "<small>GST NUMBER= 22ABCDE1234F2Z5</small><br><br>";

            $_SESSION["Price"]=$Total_cost;

            
            
           
        }
    }
    ?>
</div>
</div>
        
<span id="link"><br><br><a href="pay.html">Confirm booking & Proceed to checkout</a><br><br>
<a href="welcomeuser.php">Save Booking and return to Dashboard</a><br><br>
<a href="cancel.php">Cancel Booking Process</a><br></span>
</body>
</html>
