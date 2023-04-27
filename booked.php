<?php session_start(); ?>
<?php
   
   $file=fopen('textfiles/bookings.txt','r');

   $datecheck=0;
   while (!feof($file)) 
    {
       
        
        if(strcmp($_POST["eventdate"]."\n",fgets($file))==0)
        {
           
           
            $datecheck++;
            header("Location:/date_already_booked.html");
            break;
            
        }
    }
   
   
   
   
   
   
 ////////////////////// wrinting in file
 if($datecheck==0)
 {
    $file=fopen('textfiles/bookings.txt','a+');



    $check=0;
    while (!feof($file)) 
    {
       
        
        if(strcmp($_SESSION["logged_in_user"],fgets($file))==0)
        {
            $check++;
            header("Location:/booking_already_exists.html");
           
            
            break;
            
        }
    }
    if($check==0)
    {
    fwrite($file,$_SESSION["logged_in_user"]);
    fwrite($file,$_POST["event"]."\n");
    fwrite($file,$_POST["eventdate"]."\n");
    
    fwrite($file,$_POST["veg"]."\n");
    fwrite($file,$_POST["nonveg"]."\n");
    fwrite($file,$_POST["chinese"]."\n");
    fwrite($file,$_POST["mexican"]."\n");
    fwrite($file,$_POST["beverage"]."\n");
    fwrite($file,$_POST["chaat"]."\n");
    fwrite($file,$_POST["dosa"]."\n");
    fwrite($file,$_POST["dessert"]."\n");

    fwrite($file,$_POST["guests"]."\n");
    fwrite($file,$_POST["district"]."\n");
    fwrite($file,$_POST["location"]."\n");
    fwrite($file,$_POST["requests"]."\n");
    fclose($file);
    header("Location:/confirm_booking.php");
    
    }
    
 }
?>
<br>



        