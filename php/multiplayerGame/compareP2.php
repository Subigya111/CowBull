<?php

session_start();
    $secretP1=$_SESSION['secretP1'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $guessP2 = $d1 . $d2 . $d3 . $d4;
    

    
    if( count(array_unique(str_split($guessP2))) != 4){   //splits the array into digits and counts 
                                                                //number of unique characters
        
        $_SESSION['dupErrorP2'] = "No duplicate digits allowed";
        header("Location:mainGameP2.php");
        exit();
    }
    
    $bull=0;
    $cow=0;
    for($i=0;$i<4;$i++){
        if ($secretP1[$i]===$guessP2[$i]){
            $bull++;
        }  
        for($j=0;$j<4;$j++) {
            if($secretP1[$i]==$guessP2[$j]&&$i!=$j){
                $cow++;
                break;
            }   
        }
    }
    $_SESSION['historyP2'][] = [
    'guess' => $guessP2,
    'result' => "{$bull} <strong>Bull</strong> {$cow} <strong>Cow</strong>"];
    header("Location:mainGameP1.php");
    if ($bull == 4) {
    $_SESSION['wonP2'] = true;  // flag that game is won
    }

    header("Location: mainGameP2.php");
    exit();

  
?>
