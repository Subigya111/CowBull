<?php

if (empty($_SESSION['secret'])) { // generate secret number only once

    $digits = "123456789";
    $first = $digits[rand(0, 8)]; // selects one random digit

    $remaining = str_replace($first, "", "0123456789"); //removes the selected digit
    $shuffled = str_shuffle($remaining); // shuffles the remaining

    $_SESSION['secret'] = $first . substr($shuffled, 0, 3); // joins that random digit and 
                                                            // 3 digits from shuffled
}
?>
