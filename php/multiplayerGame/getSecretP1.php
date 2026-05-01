<?php

session_start();
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $secretP1 = $a1 . $a2 . $a3 . $a4;
    

    if( count(array_unique(str_split($secretP1))) != 4){   //splits the array into digits and counts 
                                                                //number of unique characters
        
        $_SESSION['errorP1'] = "No duplicate digits allowed. Set the number again.";
        header("Location:setSecretP1.php");
        exit();
    }
    $_SESSION['secretP1']=$secretP1;
    header("Location:mainGameP1.php");
    exit();


?>
