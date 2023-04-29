<?php
$distinctcheck=0;
if(strcmp($_POST["Username"],$_POST["Name"])==0||
    strcmp($_POST["Username"],$_POST["Email"])==0||
    strcmp($_POST["Username"],$_POST["Password"])==0||
    strcmp($_POST["Username"],$_POST["Gender"])==0||
    strcmp($_POST["Username"],$_POST["phone"])==0)
    {
        $distinctcheck++;
        header("Location:/not_distinct.html");

    }



if($distinctcheck==0)
{
    $file=fopen('textfiles/clients.txt','a+');



    $check=0;
    while (!feof($file)) 
    {
       
        
        if(strcmp($_POST["Username"]."\n",fgets($file))==0)
        {
           
            $check++;
            header("Location:/user_exists.html");
            break;
            
        }
    }
    if($check==0)
    {
    fwrite($file,$_POST["Username"]."\n");
    fwrite($file,$_POST["Email"]."\n");
    fwrite($file,$_POST["Password"]."\n");
    fwrite($file,$_POST["Name"]."\n");
    fwrite($file,$_POST["Gender"]."\n");
    fwrite($file,$_POST["phone"]."\n");
    
    header("Location:/registration_succesfull.html");
    }
    fclose($file);
}
?>


        