<?php

//====================================Remove after hosting ====================================
ini_set('display_errors', 1);
error_reporting(E_ALL);
//=============================================================================================
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFC Portal</title>
    <?php
        require("header.html");
        require("menu.php");
    ?>
</head>

<body>
    <center> <h3> Pending Applcations </h3> </center>
    <table class="table table-hover">
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Mobile </th>
            <th> Service </th>
            <th> Proceed </th>
        </tr>
            <?php
                require_once('config.php');
                $district=$_SESSION['district'];
                $office = $_SESSION['office'];
                $sql = "SELECT * FROM applications WHERE servicegiven=0 AND office='$office' AND district='$district';";
                $result = mysqli_query($db,$sql) or die("Error");
                echo "<tr>";
                while($row = mysqli_fetch_array($result)){
                    print "<tr><td>".$row["id"]."</td><td>". $row["visitorname"] ."</td><td>". $row["visitormobile"] ."</td><td>". $row["servicefor"] ."</td><td>". "<a href=''><button type='button' class='btn btn-outline-info'>Select</button></a>" ."</td></tr>";
                }
                print "</table>";
            ?>
    </table>
</body>

</html>