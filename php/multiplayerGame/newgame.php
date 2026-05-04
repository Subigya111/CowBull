<?php
session_start();
session_destroy(); // wipes everything
session_start();   // fresh session
header("Location: friendMode.php");
exit();
?>