<?php
header(header:"Content-Type: image/png");
 
// Create an image canvas
$image = imagecreate(width:400,height: 400); 

// Define colors
$black = imagecolorallocate(image:$image,red: 0,green: 0,blue: 0);
$gray = imagecolorallocate(image:$image,red: 211,green: 211,blue:211);
 
imagefill(image:$image,x: 0,y: 0,color: $gray);

//Set username
$username="Hazwani";
$text="Hello,$username";

//True Font from Google fonts
$font="california/CaliforniaPersonalUseRegular-L37ED.ttf";
 
// Add label 
imagettftext(image:$image,size: 25,angle: 0,x: 100,y: 200,color: $black,font_filename: $font,text: $text);
 
// Output the image
imagepng(image:$image);
 
// Free up memory
imagedestroy(image:$image);

?>
