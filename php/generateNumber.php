<?php

// generate secret number only once
if (empty($_SESSION['secret'])) {
    $digits = "123456789";
    $first = $digits[rand(0, 8)];

    $remaining = str_replace($first, "", "0123456789");
    $shuffled = str_shuffle($remaining);

    $_SESSION['secret'] = $first . substr($shuffled, 0, 3);
}
?>