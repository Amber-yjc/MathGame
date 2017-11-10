<?php 
    session_start(); 

    if(!isset($_SESSION["authenticated"])){
        header('Location: login.php');
    }

    $firstNum=rand(0,50);
    $secondNum=rand(0,50);
    $sign=rand(0,1);
    $yourAnswer=0;
    $correctAnswer;

    $_SESSION["qCount"];
    $_SESSION["score"];

    if (isset($_POST["logout"])){
        session_destroy();
        header("Location: login.php");
        die();
    }
?>
<html lang="en">
    <head>
        <title>Math Game</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" href="css/custom.css" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <form action="index.php" method="post">
            <div class="container">
                <input type="submit" name="logout" class="btn btn-logout" value="Logout" />
            </div>
            <div class="container">
                <h1>Math Game</h1>
            </div>
            <div class="form-width">
                <div class="row text-center">
                    <div class="col col-xs-4">
                        <?php
                            echo $firstNum;
                        ?>
                    </div>
                    <div class="col col-xs-4">
                        <?php
                            if ($sign==0){
                                echo "-";
                            } else if ($sign==1){
                                echo "+";
                            }
                        ?>
                    </div>
                    <div class="col col-xs-4">
                        <?php
                            echo $secondNum;
                        ?>
                    </div>
                </div>
            </div>
            <input type="text" name="yourAnswer" class="form-control form-width" placeholder="Enter Answer" />
            <input type="hidden" name="correctAnswer" value="<?php 
                if ($sign==0){
                    $correctAnswer=$firstNum - $secondNum;
                } else if ($sign==1){
                    $correctAnswer=$firstNum + $secondNum;
                }
                echo $correctAnswer;
                ?>" />
            <input type="hidden" name="equation" value="<?php 
                if ($sign==0){
                    echo $firstNum." - ".$secondNum." = ".$correctAnswer;
                } else if ($sign==1){
                    echo $firstNum." + ".$secondNum." = ".$correctAnswer;
                }
                ?>" />
            <div class="form-width">
                <input type="Submit" class="btn btn-primary" value="Submit" />
            </div>
            <hr />
            <input type="hidden" name="qCount" value="<?php echo $qCount; ?>" />
            <input type="hidden" name="score" value="<?php echo $score; ?>" />
            <div class="form-width">
                <?php
                    if (!is_numeric($_SESSION["qCount"])){
                        $_SESSION["qCount"]=0;
                    }
                    if (!is_numeric($_SESSION["score"])){
                        $_SESSION["score"]=0;
                    }

                    if (isset($_POST["yourAnswer"])&&is_numeric($_POST["yourAnswer"])&&!empty($_POST["yourAnswer"])){
                        $yourAnswer=$_POST["yourAnswer"];
                    } else if (!is_numeric($_POST["yourAnswer"])&&!is_null($_POST["yourAnswer"])){
                    echo '<div class="form-width wrong-answer">
                                Please enter a valid (numeric) answer.
                            </div>'; 
                    }
                    if (isset($_POST["correctAnswer"])){
                        $correctAnswer=$_POST["correctAnswer"];
                    }
                    if ($yourAnswer==$correctAnswer){
                        $_SESSION["score"]++;
                        $_SESSION["qCount"]++;
                        echo '<div class="form-width correct-answer">
                                    Correct!
                                </div>';
                    } else if ($yourAnswer!=$correctAnswer&&is_numeric($_POST["yourAnswer"])){
                        $_SESSION["qCount"]++;
                        echo '<div class="form-width wrong-answer">
                                    Incorrect, '.$_POST["equation"].'
                                </div>';
                    }
                
                    echo "<p>Score: ".$_SESSION["score"]."/".$_SESSION["qCount"]."</p>";
                ?>
            </div>
        </form>
    </body>
</html>