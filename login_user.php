<?php
    session_start(); // started session
    $file=fopen('textfiles/clients.txt','r');



    $check=0;
    $blankline=NULL;
    $Username=NULL;
    $Name=NULL;
    $Email=NULL;
    $Gender=NULL;
    $Phone=NULL;
    $Password=NULL;
    while (!feof($file)) 
    {
        while(1)// to skip blank lines
        {
            $blankline=fgets($file);
            if($blankline!="\n") // ie not a blank line
            {
                $Username=$blankline;
                break;
            }
        }
        $Email=fgets($file);
        $Password=fgets($file);
        $Name=fgets($file);
        $Gender=fgets($file);
        $Phone=fgets($file);
        if(strcmp($_POST["username"]."\n",$Username)==0 )
        {$check++;
            if(strcmp($_POST["password"]."\n",$Password)==0 )
            {
            
            fclose($file);
            $_SESSION["logged_in_user"] = $Username; // note $_Session[loggd in user ] me already ek \n aa gaya hai
            header("Location:/welcomeuser.php");           
            break;
            }
            elseif(strcmp($_POST["password"]."\n",$Password)!=0 )
            {
                header("Location:/retrylogin.html"); 
                break;
            }
            
        }
    }
   
    if($check==0)
    {
        fclose($file);
        header("Location:/retrylogin.html"); 
    }
    
?>


     
