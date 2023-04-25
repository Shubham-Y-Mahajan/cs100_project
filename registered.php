<html>
<body>
<?php
    $file=fopen('clients.txt','a+');



    $check=0;
    while (!feof($file)) 
    {
       
        
        if(strcmp($_POST["Username"]."\n",fgets($file))==0)
        {
            echo "Registration is not successfull user already exists!";
            $check++;
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
    echo "Registration is successfull";
    }
    fclose($file);
?>
<br>
<a href="register.html">register here</a><br>
<a href="Login.html">Login here</a><br>
</body>
</html>

        