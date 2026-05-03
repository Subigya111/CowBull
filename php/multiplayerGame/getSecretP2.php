<?php

session_start();
    $gamecode = $_SESSION['gameCode'];

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
    $game = json_decode(file_get_contents("../../games/$gamecode.json"), true);
    $game['player2']['secret'] = $secretP2; // ← only updates secret, leaves rest intact
    if ($game['player1']['secret'] !== null && $game['player2']['secret'] !== null) {
        $game['status'] = 'playing'; // only runs when BOTH secrets are set
}

    file_put_contents("../../games/$gamecode.json", json_encode($game,JSON_PRETTY_PRINT));



   
    $_SESSION['secretP2']=$secretP2;
    header("Location: mainGameP2.php");
    exit();


  

  
?>
