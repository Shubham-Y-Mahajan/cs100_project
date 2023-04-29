<?php session_start(); ?>
<html>
<head>
        <title>View Bookings</title>
        <link rel="stylesheet" href="view_booking.css">
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


    <div id="welcome">View Your Booking Status</div>
    <div id="tbox">
    <br><br>


<div id="box">
<div id="large">

<?php 
//////////////////////// Checking for bookings
$file1=fopen('textfiles/bookings.txt','r');



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
            $check++;
            $cost_pp=((($veg+$nonveg+$chinese+$mexican+$beverage+$chaat+$dosa+$dessert)*100) +($Event*50));
            $cost_additional=(($District*3*$guest) + $cost_pp);
            $Total_cost=1.18*($cost_additional+($cost_pp*$guest));
            break;
           
        }
    }
    
    fclose($file1);
///////////////////////////////////////////////// Checking for payments
    $paycheck=0;
    $file1=fopen('textfiles/payments.txt','r');

    //  payments file
$paycheck=0;
$Username=NULL;
$cardholder=NULL;
$Price=NULL;
$bank=NULL;
$fourcard=NULL;

$F_Username=NULL;
$F_cardholder=NULL;
$F_Price=NULL;
$F_bank=NULL;
$F_fourcard=NULL;



while (!feof($file1)) 
{
    while(1)// to skip blank lines
    {
        $blankline=fgets($file1);
        if($blankline!="\n") // ie not a blank line
        {
            $Username=$blankline;
            break;
        }
    }
    $cardholder=fgets($file1);
    $Price=fgets($file1);
    $bank=fgets($file1);
    $fourcard=fgets($file1);
    
    
    if(strcmp( $_SESSION["logged_in_user"],$Username)==0 )
    {
        $paycheck++;
        $F_Username=$Username;
        $F_cardholder=$cardholder;
        $F_Price=$Price;
        $F_bank=$bank;
        $F_fourcard=$fourcard;

       break;
    }
    
   
}
fclose($file1);
////////////////////////////////////////////////////// check and paycheck variable comparison 


if($check==0)
{
    echo "No bookings were made ! <br><br>";

}
if ($check>0 && $paycheck==0)
{
    echo "<br><br> <b>Booking Process has not been completed </b><br><br>
    <a href='pay.html'>Kindly complete you payment of INR.$Total_cost</a>";
    $_SESSION["Price"]=$Total_cost;
    
   
    echo "<hr> Booking details:<br><br>";
    ////booking details
    echo "User : ".$_SESSION["logged_in_user"]."<br>";
            
    echo "Date : ".$date."<br><br>";
    
    echo "<hr>Food packages chosen "."<br><br>";
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
  
    echo "Location of event :".$address."<br><br>";
    ////////////
    
     

}
if ($check>0 && $paycheck>0)
{
    echo "<hr><b>Booking Process has been completed !<br> Thank you for choosing S&S caterers</b>";
    echo "<hr> Booking details:<br>";
    echo "User : ".$Username."<br>";
            
    echo "Date : ".$date."<br><br>";
    
    echo "<hr>Food packages chosen:"."<br><br>";
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
  
    echo "Location of event :".$address."<br><hr>";
    echo"Payment details :<br>";
    

    echo "Payment of ".$F_Price." has been made by ".$F_cardholder." from his ".$F_bank."card xxxx-xxxx-xxxx-".$F_fourcard."<br><br><hr>";

}




?>
</div id="enlarge">
        
<span id="link"><a href="welcomeuser.php">Dashboard</a><br><br>

<a href="homepage.html">Logout</a><br><br></span>
</div>
</body>
</html>
