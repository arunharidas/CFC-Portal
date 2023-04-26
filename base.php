<!DOCTYPE html>
<html lang="en">

<head>

<?php

//====================================Remove after hosting ====================================
ini_set('display_errors', 1);
error_reporting(E_ALL);
//=============================================================================================
?>







    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
        // Show error message and logout
        function showerror($errmsg)
        {
            require("header.html");
            echo '<center> <font color="red"> <h3>'.$errmsg.'</h3></font></center>';
            echo '<center> <a href="index.php"> <button type="button" class="btn btn-danger">Ok</button> </a> </center>';  
            exit; 
        }


        // Generate Rancor Password
        function generateRandomPassword($length = 10) 
        {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_?';
            $password = '';
            for ($i = 0; $i < $length; $i++) 
            {
                $password .= $chars[rand(0, strlen($chars) - 1)];
            }
            return $password;
        }
    ?>
</body>

</html>