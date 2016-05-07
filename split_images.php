<?php

// Yes, it's in PHP. Bite me. :)

$fileSize = 1902341;
$totalImages = 7;
$frameWidth = 359;
$frameLength = ($fileSize / $totalImages) / $frameWidth;
$frameSize = $frameLength * $frameWidth;

$fd = fopen('SETI_message.txt', 'r');

// Read in each line of data and write out each bit to the target image if it's a 1
$y = 0;
$frameNum = 0;
$currentFrame = '';

$img = imagecreatetruecolor($frameWidth, $frameLength);

$fgColour = imagecolorallocate($img, 255, 255, 255);
$bgColour = imagecolorallocate($img, 0, 0, 0);

imagefill($img, 0, 0, $bgColour);

while ($data = fread($fd, $frameWidth)) {
    $bits = str_split($data);
    foreach ($bits as $x => $bit) {
        if ((int)$bit) {
            imagesetpixel($img, $x, $y, $fgColour);
        }
    }
    $y++;
    $currentFrame .= $data;
    if (strlen($currentFrame) === $frameSize) {
        imagepng($img, 'output/image' . $frameNum . '.png');
        file_put_contents('output/frame' . $frameNum . '.txt', $currentFrame);
        file_put_contents('output/frame' . $frameNum . '-lines.txt', implode("\n", str_split($currentFrame, $frameWidth)));
        $frameNum++;
        if ($frameNum < 7) {
            $img = imagecreatetruecolor($frameWidth, $frameLength);
            $fgColour = imagecolorallocate($img, 255, 255, 255);
            $bgColour = imagecolorallocate($img, 0, 0, 0);

            imagefill($img, 0, 0, $bgColour);
        }
        $currentFrame = '';
        $y = 0;
    }
}

fclose($fd);