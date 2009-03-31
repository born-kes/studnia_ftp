<?php
// Create image instances
$src = imagecreatefrompng('unit_axe.png');
$dest = imagecreatefrompng('6.png');
// Copy
imagecopy($dest, $src, 10, 0, 0, 0, 18,18);

// Output and free from memory
header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>


