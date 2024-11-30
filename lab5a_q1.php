<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q1</title>
</head>
<body>
    <?php 
        $name = "Nur Fatin Hazwani Binti Yusaini";
        $matricnumber = "AI220218";
        $course = "BIS";
        $yearofstudy = "Year 3";
        $address = "No.472, Felda Redong Satu, 85000 Segamat, Johor";

    ?>

    <table>
        <tr>
            <td>Name :</td>
            <td><?php echo "$name"; ?></td> 
        </tr>
    </table>
    <table>
        <tr>
            <td>Matric number :</td>
            <td><?php echo "$matricnumber"; ?></td> 
        </tr>
    </table>
    <table>
        <tr>
            <td>Course :</td>
            <td><?php echo "$course"; ?></td> 
        </tr>
    </table>
    <table>
        <tr>
            <td>Year Of Study :</td>
            <td><?php echo "$yearofstudy"; ?></td> 
        </tr>
    </table>
    <table>
        <tr>
            <td>Address :</td>
            <td><?php echo "$address"; ?></td> 
        </tr>
    </table>
    
</body>
</html>
