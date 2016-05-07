<?php

// Yes, it's in PHP. Bite me. :)

$frameWidth = 359;
$fileSize = 1902341;
$imageLength = $fileSize / $frameWidth;

$fd = fopen('SETI_message.txt', 'r');
$img = imagecreatetruecolor($frameWidth, $imageLength);

$fgColour = imagecolorallocate($img, 255, 255, 255);
$bgColour = imagecolorallocate($img, 0, 0, 0);

imagefill($img, 0, 0, $bgColour);

// Read in each line of data and write out each bit to the target image if it's a 1
$y = 0;
while ($data = fread($fd, $frameWidth)) {
    $bits = str_split($data);
    foreach ($bits as $x => $bit) {
        if ((int)$bit) {
            imagesetpixel($img, $x, $y, $fgColour);
        }
    }
    $y++;
}

imagepng($img, 'image.png');
