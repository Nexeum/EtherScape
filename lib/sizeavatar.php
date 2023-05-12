<?php
$y = 138;
if ($string == 'M') {
    $x = 40;
    $y = 140;
} elseif ($string == 'I') {
    $x = 75;
} elseif ($string == 'L') {
    $x = 63;
} elseif ($string == 'S' || $string == 'P' || $string == 'F') {
    $x = 60;
} elseif ($string == 'K') {
    $x = 56.5;
} elseif ($string == 'B' || $string == 'E' || $string == 'J') {
    $x = 55;
} elseif ($string == 'N') {
    $x = 48;
} elseif ($string == 'G' || $string == 'O' || $string == 'Q') {
    $x = 45;
} else {
    $x = 50;
}
?>