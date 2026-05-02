<?php
session_start();

$nameP2= $_POST['nameP2'];
$code = strtoupper($_POST['code']); // convert to uppercase just in case

// check if game exists
if (!file_exists("../../games/$code.json")) {
    $_SESSION['msg1'] = "Game not found!";
    header("Location: friendMode.php");
    exit();
}

$game = json_decode(file_get_contents("../../games/$code.json"), true);

// check if game already has two players
if ($game['player2'] !== null) {
    $_SESSION['msg2'] = "Game is already full!";
    header("Location: friendMode.php");
    exit();
}

// add player 2 to the game
$game['player2'] = [
    'nameP2'    => $nameP2,
    'secret'  => null,
    'guesses' => []
];

// update status
$game['status'] = 'setting_secrets';

// save back to file
file_put_contents("../../games/$code.json", json_encode($game,JSON_PRETTY_PRINT));

// store in session
$_SESSION['gameCode'] = $code;
$_SESSION['role']     = 'player2';
$_SESSION['nameP2']     = $nameP2;

header("Location: setSecretP2.php");
// echo $name;
exit();
?>