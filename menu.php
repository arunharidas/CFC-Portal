<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("config.php");
        require("base.php");
        if (!isset($_SESSION['login_user']))
        {  
            showerror("location: index.php");
            exit;
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #0066ff;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }
    </style>

</head>

<body>
    <?php
    if($_SESSION['user_role']=='Admin')
    {
        echo '<ul>
            <li><a class="active" href="officesettings.php">Office Settings</a></li>
            <li><a href="#">User Settings</a></li>
            <li><a href="#">Add/Edit Data</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>';
    }
    else if($_SESSION['user_role']=='gp-verifier')
    {
        echo '<ul>
            <li><a class="active" href="adduser.php">User Creation</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>';
    }
    else if($_SESSION['user_role']=='gp-operator')
    {
    echo '<ul>
      <li><a class="active" href="operatoradddata.php">New Application</a></li>
      <li><a href="operatorpending.php">Pending</a></li>
      <li><a href="searchapplications.php">Search Applications</a></li>
      <li><a href="#">Profiles</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>';
    }
    else if($_SESSION['user_role']=='st-approver')
    {
        echo '<ul>
            <li><a href="admindashboard.php">Admin Dashboard</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>';
    }
    ?>
</body>

</html>




</head>