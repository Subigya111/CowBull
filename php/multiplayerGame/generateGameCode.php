
<?php
session_start();
// if (empty($_SESSION['gameCode'])) { // generate secret number only once
$nameP1 = $_POST['nameP1'];
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";                                                           
$digits = "0123456789";
// force 1 letter and 1 digit
$code = $letters[rand(0,25)] . $digits[rand(0,9)];
// remaining 2 from combined pool
$all = $letters . $digits;
$remaining = str_replace(str_split($code), "", $all);
$shuffled = str_shuffle($remaining);
$code .= substr($shuffled, 0, 2);
$_SESSION['gameCode']= $code;
$_SESSION['nameP1']=$nameP1;
$_SESSION['role']='player1';
$game = [
    'gameCode' => $code,
    'status'   => 'waiting',
    'turn'     => null,
    'winner'   => null,
    'player1'  => [
        'nameP1'    => $nameP1,
        'secret'  => null,
        'guesses' => []
    ],
    'player2'  => null
];

file_put_contents("../../games/$code.json", json_encode($game,JSON_PRETTY_PRINT));

header("Location:setSecretP1.php");

exit();




?>