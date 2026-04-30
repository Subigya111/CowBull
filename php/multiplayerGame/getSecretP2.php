<?php

session_start();
    $secret=$_SESSION['secret'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $guess = $d1 . $d2 . $d3 . $d4;
    

    if( count(array_unique(str_split($guess))) != 4){   //splits the array into digits and counts 
                                                                //number of unique characters
        
        $_SESSION['error'] = "No duplicate digits allowed";
        header("Location:mainGameP2.php");
        exit();
    }
    $bull=0;
    $cow=0;
    for($i=0;$i<4;$i++){
        if ($secret[$i]===$guess[$i]){
            $bull++;
        }  
        for($j=0;$j<4;$j++) {
            if($secret[$i]==$guess[$j]&&$i!=$j){
                $cow++;
                break;
            }   
        }
    }
    $_SESSION['history'][] = [
    'guess' => $guess,
    'result' => "{$bull} <strong>Bull</strong> {$cow} <strong>Cow</strong>"];
    header("Location:mainGameP2.php");
    if ($bull == 4) {
    $_SESSION['won'] = true;  // flag that game is won
    }

    header("Location: mainGameP2.php");
    exit();

  
?>
