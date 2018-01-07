<?php 
    session_start();
    $validation = file_get_contents("credentials.config");
    $email_info = null;
    $password_info = null;
    $incorrect = null;
    $accounts = explode("\n", $validation);
    extract($_POST);
    if (!empty($email) && !empty($password)){
        $email_info = $email;
        $password_info = $password;
    }


    for ($i=0; $i<count($accounts); $i++){
        $login_detailed_Info = explode(", ", $accounts[$i]);
        $correct_email = trim($login_detailed_Info[0]);
        $correct_password = trim($login_detailed_Info[1]);
        
        if (strcmp($email_info, $correct_email) == 0 && strcmp($password_info, $correct_password) == 0){
            $_SESSION["authenticated"] = 'true';
            header("Location: index.php?");
            die();
        } else {
            $incorrect = 'true';
        }
        
    }
    if ($incorrect == 'true'){
        header("Location: login.php?message=Invalid email or password.");
            
    }  
    
    
    
    if (empty($email) && empty($password)) {
        header("Location: login.php?message=Email and password are required.");
        die();
    }
    if (empty($email)) {
        header("Location: login.php?message=Email is required.");
        die();
    }
    if (empty($password)) {
        header("Location: login.php?message=Password is required.");
        die();
    } 

?>