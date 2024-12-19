<?php

        // Set the content type to an image (PNG)
        header(header:"Content-Type: image/png");
 
        // Create an image canvas with a width of 400px and a height of 100px
        $image = imagecreate(width:400,height: 100);
 
        // Define colors for the background and text
        $blue = imagecolorallocate(image: $image,red: 0,green: 0,blue: 255);  // Blue color (for background if needed)
        $white = imagecolorallocate(image:$image,red: 255,green: 255,blue: 255);  // White color (for text)

        //Fill the bg with blue color
        imagefill(image:$image,x:0,y:0,color:$blue);
 
        // Add the welcome text to the image
        imagestring (image:$image,font: 5,x: 50,y: 40, string:"Welcome to Our Shop!",color: $white);
 
        // Output the image
        imagepng(image: $image);

        //Free up memory
        imagedestroy(image: $image);

        error_reporting(error_level: E_ALL);
        ini_set(option: 'display_errors',value: 1);

?>

