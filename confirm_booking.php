<?php session_start(); ?>
<html>
<body>

<?php 
$file1=fopen('bookings.txt','r');



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
        $foodpackage=fgets($file1);
        $guest=fgets($file1);
        $District=fgets($file1);
        $address=fgets($file1);
        $request=fgets($file1);
        
        
        if(strcmp( $_SESSION["logged_in_user"],$Username)==0 )
        {
            echo "User : ".$Username."<br>";
            
            echo "Date : ".$date."<br>";
            echo "food package :".$foodpackage."<br>";
            echo " number of guests :".$guest."<br>";
          
            echo "Location of event :".$address."<br>";
            

            $cost_pp=($foodpackage*250 +($Event*62.5));
            $cost_additional=(($District*3*$guest) + $cost_pp);

           
            echo "Cost per plate =" .$cost_pp."<br>" ;
            echo "Additional Cost (transportation ,staff etc) =". $cost_additional."<br>" ;
            echo "Cost (excluding taxes) = ".($cost_additional+($cost_pp*$guest))."<br>";
            $Total_cost=1.18*($cost_additional+($cost_pp*$guest));
            echo "Cost (including 18% GST) = ".$Total_cost."<br>";
            echo "<small>GST NUMBER= 22ABCDE1234F2Z5</small><br>";

            $_SESSION["price"]=$Total_cost;

            
            
           
        }
    }
    ?>
        
<a href="pay.html">Confirm booking & checkout</a><br>
<a href="cancel.php">Cancel Booking Process</a><br>
</body>
</html>
