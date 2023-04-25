<?php session_start(); ?>
<?php
   
    $file=fopen('bookings.txt','a+');



    $check=0;
    while (!feof($file)) 
    {
       
        
        if(strcmp($_SESSION["logged_in_user"],fgets($file))==0)
        {
            header("Location:/php_programming/project/booking_already_exists.html");
           
            $check++;
            break;
            
        }
    }
    if($check==0)
    {
    fwrite($file,$_SESSION["logged_in_user"]);
    fwrite($file,$_POST["event"]."\n");
    fwrite($file,$_POST["eventdate"]."\n");
    fwrite($file,$_POST["food"]."\n");
    fwrite($file,$_POST["guests"]."\n");
    fwrite($file,$_POST["district"]."\n");
    fwrite($file,$_POST["location"]."\n");
    fwrite($file,$_POST["requests"]."\n");
    fclose($file);
    header("Location:/php_programming/project/confirm_booking.php");
    
    }
    

?>
<br>



        