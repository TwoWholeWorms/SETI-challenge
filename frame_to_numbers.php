<?php

// This converts a frame*.txt file into a file of numbers, where each line is a number.

$frameNum = 2;

$fdin = fopen('output/frame' . $frameNum . '.txt', 'r');
$fdout = fopen('output/frame' . $frameNum . '-data.txt', 'w');

$frameWidth = 359;
while ($line = fread($fdin, $frameWidth)) {
    $interestingBit = strrev(substr($line, 0, 16));
    $number = bindec($interestingBit);
    fwrite($fdout, $interestingBit . ' ' . $number . "\n");
}

fclose($fdin);
fclose($fdout);
