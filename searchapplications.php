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
            <td> <input class="form-control" name="Name" placeholder="Username" required> </td>
        </tr>
    </table>

</body>

</html>