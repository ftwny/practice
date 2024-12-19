<?php
header(header:"Content-Type: image/png");
 
// Create an image canvas
$image = imagecreate(width:300,height: 150); 
// Define colors
$white = imagecolorallocate(image:$image,red: 255,green: 255,blue: 255);
$red = imagecolorallocate(image:$image,red: 255,green: 0,blue: 0);
$black = imagecolorallocate(image:$image,red: 0,green: 0,blue: 0);
 
// Draw a rectangle
imagefilledrectangle(image:$image,x1: 50,y1: 50,x2: 250,y2: 100,color: $red);
 
// Add label to the rectangle
imagestring(image:$image,font: 5,x: 120,y: 70,string: "Sale!",color: $black);
 
// Output the image
imagepng(image:$image);
 
// Free up memory
imagedestroy(image:$image);
?>
