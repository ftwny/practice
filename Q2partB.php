<?php
header(header:"Content-Type: image/png");
 
// Create an image canvas
$image = imagecreate(width:400,height: 400); 
// Define colors
$green = imagecolorallocate(image:$image,red: 0,green: 128,blue: 0);
$purple = imagecolorallocate(image:$image,red: 160,green: 32,blue: 240);
$white = imagecolorallocate(image:$image,red: 255,green: 255,blue: 255);
 
// Fill the background with white color
imagefill(image:$image,x: 0,y: 0,color: $white);

//Draw a green circle
$circle_center_x = 200;
$circle_center_y = 200;
$circle_radius = 100;
 
// Add label to the circle
imageellipse(image:$image, center_x: $circle_center_x, center_y: $circle_center_y,width: $circle_radius*2,height: $circle_radius*2,color:$green);
 
//Draw a purple line
$line_start_x=50;
$line_start_y=200;
$line_end_x = 350;
$line_end_y=200;
imageline(image:$image,x1:$line_start_x,y1:$line_start_y,x2:$line_end_x,y2:$line_end_y,color:$purple);

// Output the image
imagepng(image:$image);
 
// Free up memory
imagedestroy(image:$image);
?>
