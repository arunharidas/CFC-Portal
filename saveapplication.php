<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFC Portal</title>
    <div class="d-print-none">
        <?php
            require("header.html");
            require("menu.php");
            if (!empty($_POST))
            {
                require_once('config.php');
                $date = $_POST['date'];
                $visitorname = $_POST['name'];
                $visitormobile = $_POST['mobile'];
                $visiordetails = $_POST['visitorDetails'];
                $servicefor = $_POST['service'];
                $servicedepartment = $_POST['department'];
                $serviceprocedures = $_POST['procedures'];
                $listofdocuments = $_POST['documents'];
                $feedetails = $_POST['feedetails'];
                $source = $_POST['source'];
                $websiteurl = $_POST['sourceMore'];
                $servicedetails = $_POST['serviceDetails'];
                $chargecfc = $_POST['chargeCFC'];
                $servicegiven = isset($_POST['isServiceGiven'])? 1 : 0;
                $district = $_SESSION['district'];
                $office = $_SESSION['office'];
                $filenote = "";

                $sql = "INSERT INTO applications VALUES(NULL,'$date','$visitorname','$visitormobile','$visiordetails','$servicefor', '$servicedepartment', '$serviceprocedures', '$listofdocuments', '$feedetails', '$source', '$websiteurl', '$servicedetails', '$chargecfc', '$servicegiven', '$district', '$office', '$filenote');";
                $result = mysqli_query($db,$sql) or die("Error");
            }
        ?>
    </div>
</head>

<body>
    <div class="d-print-none">
        <div class="alert alert-success" role="alert">
            Date Saved successfully! Press Ctrl+P to print the data only if necessary.
        </div>
    </div>



    <center>
    <table width="90%" border=1>
        <tr>
            <td align="center">
                <h2> <?php echo $_SESSION['office']; ?> </h2>
                <h3> Citizen Facilitation Centre </h3>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table class="table" width="100%">
                    <tr>
                        <td width="50%">
                            Service for
                        </td>
                        <td>
                            <?php echo $servicefor; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            Department/Agency
                        </td>
                        <td>
                            <?php echo $servicedepartment; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            Procedures
                        </td>
                        <td>
                            <?php echo $serviceprocedures; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            List of documents
                        </td>
                        <td>
                            <?php echo $listofdocuments; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            Fee Details
                        </td>
                        <td>
                            <?php echo $feedetails; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            More Details
                        </td>
                        <td>
                            <?php echo $servicedetails; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <div class="d-print-none" align="center">
        <a href="operatoradddata.php"><button type="button" class="btn btn-primary btn-lg "
                autofocus>New Application</button></a>
    </div>
    </center>
</body>

</html>