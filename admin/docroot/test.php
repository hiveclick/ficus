<?php
// Create a 55x30 image
$im = imagecreatetruecolor(55, 30);
$red = imagecolorallocate($im, 255, 0, 0);
$black = imagecolorallocate($im, 0, 0, 0);

// Make the background transparent
imagecolortransparent($im, $black);

// Draw a red rectangle
imagefilledrectangle($im, 4, 4, 50, 25, $red);

// Save the image
ob_start();
imagepng($im);
$image_data = ob_get_contents();
ob_end_clean();
imagedestroy($im);
?>
<div style="padding:50px;background-color:#000000;">
<img src="data:image/png;base64,<?php echo base64_encode($image_data) ?>" border="0" />
</div>