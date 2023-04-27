<?php session_start(); ?>
<html>
<head>
        <title>Cancelled</title>
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
/////////////////////////////////////////    
    $file1=fopen('bookings.txt','r');
    $file2=fopen('temp.txt','w');


//  bookings file
    $check=0;
    $Username=NULL;
    $date=NULL;
    $foodpackage=NULL;
    $guest=NULL;
    $District=NULL;
    $address=NULL;
    $request=NULL;
    $blankline=NULL;
    $Event=NULL;
   
    
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
        $Event=fgets($file1);
        $date=fgets($file1);
        $foodpackage=fgets($file1);
        $guest=fgets($file1);
        $District=fgets($file1);
        $address=fgets($file1);
        $request=fgets($file1);
        // note $_SESSION["logged_in_user"] banate vact usme already ek \n aa gaya tha as it was loaded from a file
        if(strcmp( $_SESSION["logged_in_user"],$Username)==0 )
        {
            $check++;
           
        }
        
        else
        {
            
            fwrite($file2,$Username);
            fwrite($file2,$Event);
            fwrite($file2,$date);
            fwrite($file2,$foodpackage);
            fwrite($file2,$guest);
            fwrite($file2,$District);
            fwrite($file2,$address);
            fwrite($file2,$request);
           
        }
    }
    fclose($file1);
    fclose($file2);
    

   
    if($check==0)
    {
        
        echo "No bookings were made ";
        
    }
    else
    {
        $file1=fopen('bookings.txt','w');
        $file2=fopen('temp.txt','r');
        while (!feof($file2)) 
        {
           fwrite($file1,fgets($file2));
           
          
        }
        echo "Your booking has been successfully cancelled <br>";

        fclose($file1);
        fclose($file2);
    }
/////////////////////////////////////////////////////////////////////////////////////
$file1=fopen('payments.txt','r');
$file2=fopen('temp.txt','w');


//  bookings file
$check=0;
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
        $check++;
        $F_Username=$Username;
        $F_cardholder=$cardholder;
        $F_Price=$Price;
        $F_bank=$bank;
        $F_fourcard=$fourcard;

       
    }
    
    else
    {
        
        fwrite($file2,$Username);
        fwrite($file2,$cardholder);
        fwrite($file2,$Price);
        fwrite($file2,$bank);
        fwrite($file2,$fourcard);
       
       
    }
}
fclose($file1);
fclose($file2);



if($check==0)
{
    
    echo "No payments were made";
    
}
else
{
    $file1=fopen('payments.txt','w');
    $file2=fopen('temp.txt','r');
    while (!feof($file2)) 
    {
       fwrite($file1,fgets($file2));
       
      
    }
   echo "Your payment of INR  ".$F_Price ."will be refunded to cardholder ".$F_cardholder."in his/her ".$F_bank."bank account xxxx-xxxx-xxxx-".$F_fourcard."<br>";
   

    fclose($file1);
    fclose($file2);
}

    
?>
<br>
</div>
<span id="link"><br><br><a href="welcomeuser.php">Dashboard</a><br><br><br>
<a href="homepage.html">Logout</a><br></span>
</body>
</html>


     