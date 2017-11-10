<?php 
    if(!empty($_GET['message'])){
    $error = $_GET['message'];
    }

?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Math Game Login Page</title> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="css/custom.css" />
</head> 
<body> 
    
    <div class= "container">     
        <header>
        <div class="col-sm-10 col-sm-offset-1">
            <H1 class="text-center">Please login to enjoy our math game</H1>
        </div>
        </header>
    
        <div class="col-xs-4 offset-xs-4  centerForm">
        <div class= "form-group">
            <form action="authenticate.php" method="post" class="form-horizontal">
                <label for="email">Email:</label><input class="form-control" type="email" name="email">
                <label for="password">Password:</label><input class="form-control" type="password" name="password"><br/>
                <button type="submit" class="btn btn-info"name="login">Login</button>
            </form>
        </div>
        <span class="wrong-answer">
            <?php
            echo $error;
            ?>
            
            
            
        </span>            
        </div>                   
        
    </div>
</body>
</html>

  