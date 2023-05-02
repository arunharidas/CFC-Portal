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
    <center> <h4> Admin Dashboard <h4> </center>
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
        else if(isset($_POST['dtsel'])){
            $district=$_POST['dtsel'];
            $sql = "SELECT COUNT(*) FROM applications WHERE district='".$district."';";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalfileprocessed = $row[0];
            $sql = "SELECT COUNT(*) FROM applications WHERE servicegiven = 1 AND district='".$district."';";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalservicegiven = $row[0];
            $totalpending = $totalfileprocessed - $totalservicegiven;
            $counthead=$district;
        }
        else if(isset($_POST['gpsel'])){
            $gpoffice=$_POST['gpsel'];
            $sql = "SELECT COUNT(*) FROM applications WHERE office='".$gpoffice."';";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalfileprocessed = $row[0];
            $sql = "SELECT COUNT(*) FROM applications WHERE servicegiven = 1 AND office='".$gpoffice."';";
            $result = mysqli_query($db,$sql) or die("Error"); 
            $row = mysqli_fetch_array($result);
            $totalservicegiven = $row[0];
            $totalpending = $totalfileprocessed - $totalservicegiven;
            $counthead=$gpoffice;
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
                $sql = "SELECT district, COUNT(district)  as countdis, SUM(servicegiven) as countsgiven FROM applications GROUP BY district ORDER BY countsgiven DESC;";
                $result = mysqli_query($db,$sql) or die("Error geting data");
                while($row = mysqli_fetch_array($result)){
                    $pending=$row['countdis']-$row['countsgiven'];
                    echo "<tr><td>".$row["district"]."</td><td>".$row['countdis']."</td> <td>".$row['countsgiven']."</td> <td>".$pending."</td>";
                    echo '<td><button  type="submit" name="dtsel" value="'.$row['district'].'" class="btn btn-outline-info value="'. $row["district"] .'"> &gt;&gt;&gt; </button></td>';    
                    echo "</tr>";
                }

            echo '</table> </form>';
        }
        else if(isset($_POST['dtsel'])){
            echo '<form method="post"> <table width="100" class="table table-hover"> 
                <tr>
                    <th> Office </th>
                    <th> Received </th>
                    <th> Service given </th>
                    <th> Pending </th>
                    <th> View </th>
                </tr>';
                $sql = "SELECT office, COUNT(office)  as countgp, SUM(servicegiven) as countsgiven FROM applications WHERE district='".$counthead."' GROUP BY office ORDER BY countsgiven DESC;";
                $result = mysqli_query($db,$sql) or die("Error geting data");
                while($row = mysqli_fetch_array($result)){
                    $pending=$row['countgp']-$row['countsgiven'];
                    echo "<tr><td>".$row["office"]."</td><td>".$row['countgp']."</td> <td>".$row['countsgiven']."</td> <td>".$pending."</td>";
                    echo '<td><button  type="submit" name="gpsel" value="'.$row['office'].'" class="btn btn-outline-info value="'. $row["office"] .'"> &gt;&gt;&gt; </button></td>';    
                    echo "</tr>";
                }

            echo '</table> </form>';
        }
        else if(isset($_POST['gpsel'])){
            echo '<form method="post"> <table width="100" class="table table-hover"> 
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Service for </th>
                    <th> Service given? </th>
                    <th> View </th>
                </tr>';
                $sql = "SELECT id, visitorname, servicefor, servicegiven from applications where office='".$counthead."';";
                $result = mysqli_query($db,$sql) or die("Error geting data");
                while($row = mysqli_fetch_array($result)){
                    if ($row['servicegiven']==true){
                        $servicegiven="Yes";
                    }
                    else{
                        $servicegiven="No";
                    }
                    echo "<tr><td>".$row["id"]."</td><td>".$row['visitorname']."</td> <td>".$row['servicefor']."</td><td>".$servicegiven."</td> ";
                    echo '<td><button  type="submit" name="applicationsel" value="'.$row['id'].'" class="btn btn-outline-info value="'. $row["id"] .'"> &gt;&gt;&gt; </button></td>';    
                    echo "</tr>";
                }

            echo '</table> </form>';
        }
    ?>
    


</body>

</html>