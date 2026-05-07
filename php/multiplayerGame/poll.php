<?php
session_start();
$code = $_SESSION['gameCode'];
$game = json_decode(file_get_contents("../../games/$code.json"), true);
echo json_encode($game);
?>