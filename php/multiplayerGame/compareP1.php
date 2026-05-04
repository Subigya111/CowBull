<?php

session_start();
    $secretP2=$_SESSION['secretP2'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $guessP1 = $c1 . $c2 . $c3 . $c4;
    

    
    if( count(array_unique(str_split($guessP1))) != 4){   //splits the array into digits and counts 
                                                                //number of unique characters
        
        $_SESSION['dupErrorP1'] = "No duplicate digits allowed";
        header("Location:mainGameP1.php");
        exit();
    }
    
    $bull=0;
    $cow=0;
    for($i=0;$i<4;$i++){
        if ($secretP2[$i]===$guessP1[$i]){
            $bull++;
        }  
        for($j=0;$j<4;$j++) {
            if($secretP2[$i]==$guessP1[$j]&&$i!=$j){
                $cow++;
                break;
            }   
        }
    }
    $_SESSION['historyP1'][] = [
    'guess' => $guessP1,
    'result' => "{$bull} <strong>Bull</strong> {$cow} <strong>Cow</strong>"];
    header("Location:mainGameP1.php");
    if ($bull == 4) {
    $_SESSION['wonP1'] = true;  // flag that game is won
    }

    header("Location: mainGameP1.php");
    exit();

  
?>
