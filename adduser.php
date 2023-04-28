<<<<<<< HEAD
=======
<?php

//====================================Remove after hosting ====================================
ini_set('display_errors', 1);
error_reporting(E_ALL);
//=============================================================================================
?>





>>>>>>> a037e68 (initial)
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
                <table class="table table-bordered" width="100%">
                    <tr>
                        <th> District </th>
                        <th> Office </th>
                        <th> Name </th>
                        <th> Username </th>
                        <th> Status </th>
<<<<<<< HEAD
                        <th> PW Reset </th>
                        <th> Edit </th>
                    </tr>


                    <tr>
                        <td> Kottayam </td>
                        <td> Marangattupilly Gramapanchayat </td>
                        <td> Marangattupilly</td>
                        <td> mgp </td>
                        <td> Active </td>
                        <td align="center"> <button type="button" class="btn btn-danger btn-sm">&gt;</button> </td>
                        <td align="center"> <button type="button" class="btn btn-primary btn-sm">&gt;</button> </td>
                    </tr>
                    <tr>
                        <td> Kottayam </td>
                        <td> Marangattupilly Gramapanchayat </td>
                        <td> Test user</td>
                        <td> test  </td>
                        <td> Inactive </td>
                        <td align="center"> <button type="button" class="btn btn-danger btn-sm">&gt;</button> </td>
                        <td align="center"> <button type="button" class="btn btn-primary btn-sm">&gt;</button> </td>
                    </tr>
                </table>
=======
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
                            echo "<tr><td>".$row["district"]."</td><td>". $row["office"] ."</td><td>". $row["name"] ."</td><td>". $row["username"] ."</td><td>". $row["status"] ."</td> <td><button type='submit' class='btn btn-danger btn-sm'> &nbsp;&gt;&nbsp; </button> </td><td><button type='button' class='btn btn-primary btn-sm'> &nbsp;&gt;&nbsp; </button></td></tr>";
                        }
                        echo "</table>";
                    ?>
>>>>>>> a037e68 (initial)
                <!-- Display users list here -->
            </td>
            <td> &nbsp; </td>
            <td valign="top" width="30%">
                <center> <h5> Create User </h5> </center>
<<<<<<< HEAD
                <form action="post">
=======
                <form method="post">
>>>>>>> a037e68 (initial)
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
<<<<<<< HEAD
                    <input class="form-control" name="username" placeholder="Username" required>
                    <br />
                    <input class="form-control" name="name" placeholder="Full Name" required>
                    <br />

=======
                    <input class="form-control" name="username" pattern="[a-zA-Z0-9_]+" placeholder="Username" required>
                    <br />
                    <input class="form-control" name="name" placeholder="Full Name" required>
                    <br />
                    <button type="submit" class="btn btn-success">Create User</button>
<<<<<<< HEAD
>>>>>>> a037e68 (initial)
                </form>
=======
                </form> 
>>>>>>> 3de37f6 ( d)

            </td>
        </tr>
    </table>



</body>

</html>