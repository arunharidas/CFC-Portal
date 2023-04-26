<!DOCTYPE html>
<html lang="en">

<head>
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
    <h2> Welcome to CFC Portal... </h2>
    <?php
    echo "Logined as ".$_SESSION['name']." (".$_SESSION['user_role'].")";
?>
</body>

</html>