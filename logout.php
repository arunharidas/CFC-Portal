<?php
    require("header.html");
    session_start();
    unset($_SESSION['login_user']);
    unset($_SESSION['user']);
    unset($_SESSION['user_role']);
?>
<center>
    <h3> <font color="red"> Logout successfully </font> </h3>
    <a href="index.php"> Click here to login </a>
</center>