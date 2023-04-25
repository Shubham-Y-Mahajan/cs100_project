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
        $foodpackage=fgets($file1);
        $guest=fgets($file1);
        $District=fgets($file1);
        $address=fgets($file1);
        $request=fgets($file1);
        
        
        if(strcmp( $_SESSION["logged_in_user"],$Username)==0 )
        {
            $check=1;
            echo "User : ".$Username."<br>";
            
            echo "Date : ".$date."<br>";
            echo "food package :".$foodpackage."<br>";
            echo " number of guests :".$guest."<br>";
          
            echo "Location of event :".$address."<br>";
            

           echo " Payment made of INR ".$_SESSION["price"]."<br>";


            
            break;
           
        }
    }
    
    if($check==0)
    {
        echo "No Bookings were made";
    }
    ?>
        
<a href="welcomeuser.php">Dashboard</a><br>

<a href="homepage.html">Logout</a><br>
</body>
</html>
