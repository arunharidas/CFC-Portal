<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>




    <?php
  
    require("header.html");
    require("menu.php");
    if (!empty($_POST))
    {
        require_once("config.php");
        
        if($_POST['oldpassword']=="")
        {
            $msg="Enter old password";
        }
        else if($_POST['password']=="" or $_POST['repassword']=="")
        {
            $msg= "Enter new password";
        }
        else
        {
            $myusername1=$_SESSION['login_user'];
            $mypassword1=$_POST['oldpassword'];
            $sql = "SELECT * FROM users WHERE username = '$myusername1' and password = '$mypassword1' and status= 'Active'";
            $result = mysqli_query($db,$sql) or die("Error");
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                if($_POST['password']==$_POST['repassword'])
                {
                    $newpassword=$_POST['password'];
                    $sql = "UPDATE users SET password = '$newpassword' WHERE username = '$myusername1'";
                    $result = mysqli_query($db,$sql) or die("Error");
                    $msg="Password Changed";
                }
                else
                {
                    $msg="New password does not match";
                }
            }
            else 
            {
                $msg="Incorrect old password";
            }
        }
    }
    else
    {
        $msg="";
    }
?>
</head>

<body>
    <?php
       
    ?>
    <center>
        <table width="400px">
            <tr>
                <td align="center">
                    <form method="post">
                        <h3> Change Password </h3>
                        <input class="form-control" type="password" name="oldpassword" placeholder="Old Password" required>
                        <br />
                        <input class="form-control" type="password" name="password" placeholder="Password" required> <br />
                        <input class="form-control" type="password" name="repassword" placeholder="Re Password" required> <br />
                        <br />
                        <button class="btn btn-primary" type="submit" value="Change Password"> Change Password </button>
                    </form>
                    <?php
                        echo "$msg";
                    ?>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>