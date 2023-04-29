<?php

    require("base.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        include("config.php");
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        if($myusername=="" or $mypassword=="")
        {
            showerror("Enter username and password ");
        }
        else
        {
            $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword' and status= 'Active'";
            $result = mysqli_query($db,$sql) or die("Error");
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                $myusertype = $row['usertype'];
                echo $myusertype;
                echo "Authentication success";
                $_SESSION['login_user'] = $myusername;
                $_SESSION['name']=$row['name'];
                $_SESSION['office']=$row['office'];
                $_SESSION['district']=$row['district'];
                $_SESSION['user_role']=$myusertype;
                /*
                if($myusertype=="Admin")
                {
                    echo "ADM";
                    $_SESSION['user_role'] = "admin";
                }
                else if($myusertype=="gp-operator")
                {
                    echo "OPR";
                    $_SESSION['user_role'] = "gp-operator";
                }
                else if($myusertype=="gp-verifier")
                {
                    echo "GPVER";
                    $_SESSION['user_role'] = "gp-verifier";
                }
                else
                {
                    showerror("Unknown error happend : \n Please contact administrator ");
                } 
                */
                header("location:home.php");
                
            }
            else 
            {
                showerror("Invalid username or password ");
            }
        } 
    }


?>