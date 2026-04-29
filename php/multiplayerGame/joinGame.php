<?php
session_start();

$name = $_POST['name'];
$code = strtoupper($_POST['code']); // convert to uppercase just in case

// check if game exists
if (!file_exists("../../games/$code.json")) {
    $_SESSION['error'] = "Game not found!";
    header("Location: ../multiplayerGame/mainGame.php");
    exit();
}

$game = json_decode(file_get_contents("../../games/$code.json"), true);

// check if game already has two players
if ($game['player2'] !== null) {
    $_SESSION['error'] = "Game is already full!";
    header("Location: ../multiplayerGame/mainGame.php");
    exit();
}

// add player 2 to the game
$game['player2'] = [
    'name'    => $name,
    'secret'  => null,
    'guesses' => []
];

// update status
$game['status'] = 'setting_secrets';

// save back to file
file_put_contents("../../games/$code.json", json_encode($game));

// store in session
$_SESSION['gameCode'] = $code;
$_SESSION['role']     = 'player2';
$_SESSION['name']     = $name;

header("Location: ../multiplayerGame/mainGame.php");
exit();
?>