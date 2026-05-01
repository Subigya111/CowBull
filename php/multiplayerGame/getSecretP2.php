<?php

session_start();
    $b1 = $_POST['b1'];
    $b2 = $_POST['b2'];
    $b3 = $_POST['b3'];
    $b4 = $_POST['b4'];
    $secretP2 = $b1 . $b2 . $b3 . $b4;
    

    if( count(array_unique(str_split($secretP2))) != 4){   //splits the array into digits and counts 
                                                                //number of unique characters
        
        $_SESSION['errorP2'] = "No duplicate digits allowed. Set the number again.";
        header("Location:setSecretP2.php");
        exit();
    }
   
    $_SESSION['secretP2']=$secretP2;
    header("Location: mainGameP2.php");
    exit();

  
?>
