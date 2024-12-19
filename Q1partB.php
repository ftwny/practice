<?php
header(header:"Content-Type: image/png");
 
// Create an image canvas
$image = imagecreate(width:300,height: 150); 
// Define colors
$yellow = imagecolorallocate(image:$image,red: 255,green: 255,blue: 0);
$black = imagecolorallocate(image:$image,red: 0,green: 0,blue: 0);
 
// Add label to the rectangle
imagestring(image:$image,font: 5,x: 120,y: 70,string: "100 Items Sold",color: $black);
 
// Output the image
imagepng(image:$image);
 
// Free up memory
imagedestroy(image:$image);
?>
