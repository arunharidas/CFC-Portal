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
    <table width = "99%">
        <tr>
            <td valign="top">
            <center> <h5> Users </h5> </center>
                <form method="post">
                    <?php
                        
                        
                        // --------------- Reset password button ----------------
                        if(isset($_POST['resetpw'])) {
                            $changepwid=$_POST['resetpw'];
                            echo '<div class="alert alert-primary" role="alert">';
                                echo '<form method="post">';
                                    echo 'Are you sure to reset password? ';
                                    echo '<button type="submit" name="conformpw" value="'.$changepwid.'" class="btn btn-danger btn-sm"> Conform </button> ';
                                    echo "&nbsp;&nbsp";
                                    echo '<button type="submit" name="cancel"  class="btn btn-secondary btn-sm"> Cancel </button> ';
                                echo '</form>';
                            echo '</div>';
                        }
                        // --------------- Conform Password Reset ---------------
                        if(isset($_POST['conformpw'])){
                            $changepwid = $_POST['conformpw'];
                            $newpassword=generateRandomPassword();
                            
                            require_once("config.php");
                            $sql='UPDATE users SET password = "' . $newpassword . '" WHERE id = ' . $changepwid ;
                            $result=mysqli_query($db, $sql) or die("Error");
                            echo '<div class="alert alert-success" role="alert">';
                                echo '<form method="post">';
                                    echo '<h5>Password Changed successfully</h5>';
                                    echo 'Password : '.$newpassword;
                                    echo '<br/>';
                                    echo '<button type="submit" name="conformdelete" value="'.$changepwid.'" class="btn btn-success btn-sm"> Ok </button> ';
                                echo '</form>';
                            echo '</div>';
                            
                        }
                    ?>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th> District </th>
                            <th> Office </th>
                            <th> Name </th>
                            <th> Username </th>
                            <th> Status </th>
                            <th> Password <br/> Reset </th>
                            <th> Edit </th>
                        </tr>
                        <?php
                            require_once('config.php');
                            $district=$_SESSION['district'];
                            $office = $_SESSION['office'];
                            if($_SESSION['user_role']=="gp-verifier")                       // Check GP User
                            {
                                $sql = "SELECT * FROM users WHERE office='$office' AND usertype='gp-operator';";
                            }
                            $result = mysqli_query($db,$sql) or die("Error");
                            echo "<tr>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr><td>".$row["district"]."</td><td>". $row["office"] ."</td><td>". $row["name"] ."</td><td>". $row["username"] ."</td><td>". $row["status"] ."</td> <td><button type='submit' name='resetpw' class='btn btn-danger btn-sm' value='". $row['id'] . "' > &nbsp;&gt;&nbsp; </button> </td><td><button type='submit' class='btn btn-primary btn-sm' name='edit' value='". $row['id'] . "'> &nbsp;&gt;&nbsp; </button></td></tr>";
                            }
                            echo "</table>";
                        ?>
                    </form>
                <!-- Display users list here -->
            </td>
            <td> &nbsp; </td>
            <td valign="top" width="30%">
                <center> <h5> Create User </h5> </center>
                <?php
                    // -------------- Create New User ------------------------
                    if(isset($_POST['createuser'])){
                        require_once("config.php");
                        $username = $_POST['username'];
                        $sql='SELECT * FROM users WHERE username = "' . $username .'";' ;
                        $result=mysqli_query($db, $sql) or die("Error in checking user exist");
                        $row = mysqli_fetch_array($result);
                        $count = mysqli_num_rows($result);
                        if($count==0){
                            $newpassword=generateRandomPassword();
                            $name=$_POST['name'];
                            $status=$_POST['status'];

                            // If User is gp level
                            if($_SESSION['usertype']="gp-verifier"){
                                $newusertype="gp-operator";
                                $office=$_SESSION['office'];
                                $district=$_SESSION['district'];
                                
                            }
                            $sql="INSERT INTO users VALUES(NULL,'$username','$newpassword','$newusertype','$name','$office','$district','$status');" ;
                            $result=mysqli_query($db, $sql) or die("Error in saving user");

                            echo '<div class="alert alert-success" role="alert">';
                                echo "<h5> User Created successfully</h5> ";
                                echo "Username : ".$username;
                                echo "<br/> Password : " . $newpassword;
                                echo '<br/><form method="post"><button type="submit" class="btn btn-success">Ok</button></form>';
                            echo '</div>';
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">';
                                echo "Error : username already exist";
                            echo '</div>';
                        }
                    
                    }



                ?>
                <form method="post">
                <select class="custom-select">
                        <?php
                            if($_SESSION['user_role']=="gp-verifier")
                            {
                                echo '<option value="district" >'.$_SESSION["district"].'</option>';
                            }
                        ?>
                    </select>
                    <br/>
                    <br/>
                    <select class="custom-select">
                        <?php
                            if($_SESSION['user_role']=="gp-verifier")
                            {
                                echo '<option value="office" >'.$_SESSION["office"].'</option>';
                            }
                        ?>
                    </select>
                    <br/>
                    <input type="hidden" name="usertype" value="gp-operator">
                    <br />
                    <input class="form-control" name="username" pattern="[a-zA-Z0-9_@]+" placeholder="Username" required>
                    <br />
                    <input class="form-control" name="name" placeholder="Full Name" required>
                    <br />
                    <select name="status" class="custom-select" required>
                        <option value="" selected>---Select Status---</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive </option>
                    </select>
                    <br/>
                    <br/>
                    <?php
                        if (empty($_POST['edit'])) {
                            echo'<button name="createuser" type="submit" class="btn btn-success">Create User</button>';
                        }
                        else{
                        echo'<button name="edituser" type="submit" class="btn btn-success">Update User</button>';
                        }
                    ?>
                </form> 

            </td>
        </tr>
    </table>


<br/>
</body>

</html>