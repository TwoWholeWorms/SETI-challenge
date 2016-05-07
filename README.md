# SETI-challenge
My attempts at deciphering SETI_message.txt.

I instantly recognised that there were images embedded in the file,
though admittedly I expected them to be a bit less obvious than the 1s
and 0s it turned out to be. :)

## Frame 0
This frame marks the container size with a string of 1s across the top
and down the right-hand side.

##  Frame 1
This frame lists the numbers 1 to 756, the height of each frame, in the
binary representations on the left-hand edge. This was decoded with
`frame_to_numbers.php`, though it's obvious that the data was binary.

## Frame 2
This frame lists the prime numbers from 2 to 5749 in the binary
representations on the left-hand edge, again decoded with
`frame_to_numbers.php`.

## Frame 3
Depicts a sinewave visually. The wave fills the entirety of the frame,
which gives it an amplitude of 378 and a frequency of 179 / 179.5. I
don't yet know if this is relevant. The top two lines of this frame
contain what looks like additional data, however I haven't got a clue
what it means.

## Frame 4
