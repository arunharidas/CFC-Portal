

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
        require_once("config.php");
        $sql = "SELECT COUNT(*) FROM applications";
        $result = mysqli_query($db,$sql) or die("Error"); 
        $row = mysqli_fetch_array($result);
        $totalfileprocessed = $row[0];
        $sql = "SELECT COUNT(*) FROM applications WHERE servicegiven = 1";
        $result = mysqli_query($db,$sql) or die("Error"); 
        $row = mysqli_fetch_array($result);
        $totalservicegiven = $row[0];
        $totalpending = $totalfileprocessed - $totalservicegiven;

    ?>
</head>

<body>
    <center>
        <table width="99%">
            <tr>
                <td valign="top" align="justify">
                    <br />
                    <?php
                        require("publicsearch.php")
                    ?>

                </td>
                <td> &nbsp;&nbsp; </td>
                <td align="right" valign="top">
                    <br />
                    <table border=0>
                        <tr>
                            <td>
                                <form action="login.php" method="post">

                                    <input class="form-control" name="username" placeholder="Username" required>
                                    <br />
                                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                                    <br />
                                    <button type="submit" class="btn btn-success">Login</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <div class="card">
                        <!---
                        <div class="card-header">
                            <center>Progress</center>
                        </div>
                        -->
                        <div class="card-body" align="center">
                            Total Applications Received
                            <h5><?php  echo $totalfileprocessed; ?></h5>
                            <hr/>
                            Service Given
                            <h5><?php echo $totalservicegiven; ?></h5>
                            <hr/>
                            Pending Applications
                            <h5><?php echo $totalpending; ?></h5>

                        </div>
                    </div>



                </td>
            </tr>
        </table>

        <br />
        <?php
            $count = intval(file_get_contents('counter.txt'));
            $count++;
            file_put_contents('counter.txt', $count);
            echo 'Page visits: ' . $count;
        ?>
    </center>
    <br />
    <table bgcolor="#3399ff" width="100%">
        <tr>
            <td align="center">
                <small><i>©</i></small>
            </td>
        </tr>
    </table>
</body>

</html>