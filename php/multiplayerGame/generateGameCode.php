
<?php
// session_start();
if (empty($_SESSION['gameCode'])) { // generate secret number only once

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
header("Location:game.php");
// exit();
}
?>