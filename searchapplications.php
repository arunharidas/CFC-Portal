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
    <center><h4> Search Applications </h4></center>
    <table width="100%">
        <tr>
            <td> <input class="form-control" name="searchname" placeholder="Name" required> </td>
            <td> <input class="form-control" name="searchmobile" placeholder="Mobile Number" required> </td>
            <td> <input class="form-control" name="searchservicefor" placeholder="Service sought for" required> </td>
            <td> <input class="form-control" name="searchdepartment" placeholder="Department / Agency" required> </td>
            <td> <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> </td>
        </tr>
    </table>

</body>

</html>