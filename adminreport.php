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
    <center> <h4> Admin Report <h4> </center>
    <?php
        require_once("config.php");
        
    ?>
    <?php 
        // If no post values ---------------------------------------------------
        if (empty($_POST)) { 
            $sql = "SELECT COUNT(*) FROM applications";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalfileprocessed = $row[0];
            $sql = "SELECT COUNT(*) FROM applications WHERE servicegiven = 1";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalservicegiven = $row[0];
            $totalpending = $totalfileprocessed - $totalservicegiven;
            $counthead="State";
        }


    ?>
    <table width="100%" class="table">
        <tr class="table-primary">
            <td width="25%" align="center" valign="middle">
                <h5> Count of </h5>
                <h3> <?php echo $counthead; ?> </h3>
            </td>
            <td width="25%" align="center">
                <h5> Applications Process </h5>
                <h3> <?php echo $totalfileprocessed; ?> </h3>
            </td>
            <td width="25%" align="center">
                <h5> Service Given </h5>
                <h3> <?php echo $totalservicegiven; ?> </h3>
            </td>
            <td width="25%" align="center">
                <h5> Pending </h5>
                <h3> <?php echo $totalpending; ?> </h3>
            </td>
        </tr>
    </table>
    <?php
        if (empty($_POST)){  
            echo '<form method="post"> <table width="100" class="table table-hover"> 
                <tr>
                    <th> District </th>
                    <th> Received </th>
                    <th> Service given </th>
                    <th> Pending </th>
                    <th> View </th>
                </tr>';
                $sql = "SELECT district, COUNT(district)  as countdis, SUM(servicegiven) as countsgiven FROM applications GROUP BY district;";
                $result = mysqli_query($db,$sql) or die("Error geting data");
                while($row = mysqli_fetch_array($result)){
                    $pending=$row['countdis']-$row['countsgiven'];
                    echo "<tr><td>".$row["district"]."</td><td>".$row['countdis']."</td> <td>".$row['countsgiven']."</td> <td>".$pending."</td>";
                    echo '<td><button name="dtsel" type="submit" class="btn btn-outline-info value="'. $row["district"] .'"> &gt;&gt;&gt; </button</td>';    
                    echo "</tr>";
                }

            echo '</table> </form>';

        }

    ?>
    


</body>

</html>