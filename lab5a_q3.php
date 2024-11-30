<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q3</title>
</head>
<body>
    <?php
        // Function to calculate the area of a rectangle
        function calculateArea($parameter1, $parameter2) {
            // Calculate area
            $area = $parameter1 * $parameter2;
            return $area;
        }

        // Call the function with sample values
        $parameter1 = 4; 
        $parameter2 = 2;   // example width
        $area = calculateArea($parameter1, $parameter2); // calculate area

        // Display the result
        echo "<h2>The area of the rectangle with a width of $parameter1 and $parameter2 is $area </h2>";
    ?>
</body>
</html>
