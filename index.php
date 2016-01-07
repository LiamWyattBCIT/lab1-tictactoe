<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "Hello World";

$name = 'Jim';
$what = 'geek';
$level = 10;

echo 'Hi, my name is ' . $name . ', and I am a level ' . $level . ' ' . $what;

echo '<br/>';

$hoursworked = $_GET['hours'];
$rate = 12;
$total = $hoursworked * $rate;

if ($hoursworked > 40) {
    $total = $hoursworked * $rate * 1.5;
} else {
    $total = $hoursworked * $rate;
}
echo ($total > 0) ? 'You owe me $' . $total : "You're welcome";

