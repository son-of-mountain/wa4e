<!--------------------------------------------------------------- MODEL---------------------------------------------------------------- -->
<?php

    if( isset($_POST['cancel'])){
        header("Location:index.php");
        return ; 
    }

    // $error_mess =     ? "User name and password are required" : "" ; 

    $salt = 'XyZzy12*_';

    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

    $failure = false;  
    
    // First check if the password and username exists
    // Then check if the password is
    
    if(isset($_POST['who']) && isset($_POST['pass'])){
        
        if( strlen($_POST['who']) <1 && strlen($_POST['pass'] <1) )
        $failure = "User name and password are required" ; 
    
    
        else{
            $check = hash('md5', $salt.$_POST['pass']) ;

            if( $check == $stored_hash ){
                header("Location:game.php?name=".urlencode($_POST['who'])) ;
                return ;
            }
            
            else{
                $failure = "Incorrect password" ;
            }

        }
    }

?>


<!---------------------------------------------------------------VIEW------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouaad ELHANSALI's Login Page</title>
    <?php require_once "bootstrap.php"  ?>
</head>
<body>
    <div class="container">
        <h1>Please Log In</h1>

        <?php 
        
            if($failure!==false) {
                echo '<p style=" color:red; font-weight:bold " >'.htmlentities($failure)."</p>\n " ;     
            }
            
        ?>

        <form method="post">
            <label for="who">User Name</label>
            <input type="text" name="who"><br/>
            
            
            <label for="idpass">Password</label>
            <input type="password" name="pass" id="idpass" ><br/>
            
            <input type="submit" name="login" value="Login">
            <input type="submit" name="cancel" value="Cancel">

        </form>
    </div>
    
</body>
</html>