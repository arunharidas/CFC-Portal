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
        if(empty($_POST) || isset($_POST['savedata'])){
            $editmode=false;
            $date = date("d/m/Y");
            $visitorname="";
            $visitormobile="";
            $visitorgender="";
            $visitoragegroup="";
            $visitoreducation="";
            $visitorprofession="";
            $visitordetailsmore="";
            $servicefor="";
            $servicedepartment="";
            $serviceadvice="";
            $serviceprocedures="";
            $servicedocuments="";
            $servicefee="";
            $informationsource="";
            $informationurl="";
            $informationverified="";
            $informationinofficialweb="";
            $guidedto="";
            $servicemoredetails="";

        }
        else{                                // get post data
            $editmode=true;
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

            
        }
        // -----------------Save Data
        if(isset($_POST['savedata'])){
            require_once('config.php');
            $sql = "INSERT INTO applications VALUES(NULL,'$date','$visitorname','$visitormobile','$visiordetails','$servicefor', '$servicedepartment', '$serviceprocedures', '$listofdocuments', '$feedetails', '$source', '$websiteurl', '$servicedetails', '$chargecfc', '$servicegiven', '$district', '$office', '$filenote');";
            $result = mysqli_query($db,$sql) or die("Error");
            echo '<div class="d-print-none">';
            echo '<div class="alert alert-success" role="alert">';
            echo 'Date Saved successfully.';
            if($servicegiven==0){
                echo ' <br/> <small> Complete the application process from pending menu </small> ';
            }
            echo '</div> </div>';
        }
    ?>
</head>

<body>

    <center>
        <table width="1000px">
            <tr>
                <td align="center">
                    <form method="post" >
                        <h3> Register </h3>
                        <table class="table" width="100%">
                            <tr>
                                <td valign="top" width="30%">
                                    Date
                                </td>
                                <td>
                                    <?php
                                        echo $date;
                                    ?>
                                    <input type="hidden" name="date" value='<?php echo $date; ?>'>

                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="30%">
                                    <selection id="gotovisitor"> </selection>
                                    Visitor Name<font color="red">*</font>
                                </td>
                                <td>
                                    <input class="form-control" name="name" placeholder="name" required>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Visitor Mobile Number <font color="red">*</font>
                                </td>
                                <td>
                                    <input type="tel" class="form-control" name="mobile" placeholder="mobile"
                                        pattern="[0-9]{10}" required maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Gender <font color="red">*</font>
                                </td>
                                <td>
                                    <select name="gender" class="custom-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="male">Male </option>
                                        <option value="female">Female </option>
                                        <option value="others">Others </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Age Group <font color="red">*</font>
                                </td>
                                <td>
                                    <select name="agegroup" class="custom-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="below 18">Below 18 </option>
                                        <option value="18-30">18-30 </option>
                                        <option value="30-40">30-40 </option>
                                        <option value="40-50">40-50 </option>
                                        <option value="50-60">50-60 </option>
                                        <option value="Above 60">Above 60 </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Education  <font color="red">*</font>
                                </td>
                                <td>
                                    <select name="education" class="custom-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="Uoto 10th">Upto 10th </option>
                                        <option value="Plus two/Predegree">Plus two/Predegree </option>
                                        <option value="Diploma">Diploma </option>
                                        <option value="Graduate">Graduate </option>
                                        <option value="Professional Degree">Professional Degree </option>
                                        <option value="Post Graduate or above">Post Graduate or above </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Profession <font color="red">*</font>
                                </td>
                                <td>
                                    <select name="profession" class="custom-select" required>
                                        <option value="" selected>Choose...</option>
                                        <option value="Self Employed">Self Employed </option>
                                        <option value="Govt/Public sector">Govt/Public sector </option>
                                        <option value="Private Sector">Private Sector </option>
                                        <option value="Skilled worker">Skilled worker </option>
                                        <option value="Unskilled worker">Unskilled worker </option>
                                        <option value="Others">Others </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    More Details about Visitor
                                </td>
                                <td>
                                    <textarea class="form-control" name="visitorDetails" rows="4"
                                        placeholder="More Details about visitor like email address"
                                        maxlength="1000"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <selection id="gotoservice"> </selection>
                                    Service sought for<font color="red">*</font>
                                </td>
                                <td>
                                    <textarea class="form-control" name="service" rows="3"
                                        placeholder="Servie sought for"></textarea>
                                    <button type="submit" name="getfromwiki" class="btn btn-info btn-sm">Search / Import</button>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Department/Agency
                                </td>
                                <td>
                                    <input class="form-control" name="department"
                                        placeholder="Service related to Which Department/ Agency?">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Details of advice given
                                </td>
                                <td>
                                    <textarea class="form-control" name="serviceAdvice" rows="4"
                                        placeholder="Details of advice given"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Procedures<font color="red">*</font>
                                </td>
                                <td>
                                    <textarea class="form-control" name="procedures" rows="4"
                                        placeholder="Procedures to be followed  for availing the service"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    List of Documents needed
                                </td>
                                <td>
                                    <textarea class="form-control" name="documents" rows="4"
                                        placeholder="List of Documents to be submitted for obtaining the service"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Fee Details
                                </td>
                                <td>
                                    <textarea class="form-control" name="feedetails" rows="4"
                                        placeholder="Details any fee, if applicable"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Source of Information<font color="red">*</font>
                                </td>
                                <td>
                                    <input class="form-control" name="source" placeholder="Source of information">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Website/URL/Meterials/Others
                                </td>
                                <td>
                                    <input class="form-control" name="sourceMore"
                                        placeholder="Website/URL/Meterials/Others">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Whether the data given are verified with concerned Department/Agency
                                </td>
                                <td>
                                    <select name="conformdata" class="custom-select">
                                        <option value="" selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Whether the details of required service are available in the official website of Department/agency
                                </td>
                                <td>
                                    <select name="datainofficialwebsite" class="custom-select">
                                        <option value="" selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No </option>
                                        <option value="Incomplete">Incomplete </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Guided to which Office/Agency
                                </td>
                                <td>
                                    <select name="guidedtooffice" class="custom-select">
                                        <option value="" selected>Choose...</option>
                                        <option value="LB Level office">LB Level office</option>
                                        <option value="Taluk Level office">Taluk Level office </option>
                                        <option value="District level office">District level office </option>
                                        <option value="Akshaya/CSC">Akshaya/CSC </option>
                                        <option value="Others">Others </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    More Details about service
                                </td>
                                <td>
                                    <textarea class="form-control" name="serviceDetails" rows="4"
                                        placeholder="More Details about service"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Name of person in CFC <font color="red">*</font>
                                </td>
                                <td>
                                    <input class="form-control" name="chargeCFC" placeholder="CFC in charge" required
                                        value="<?php echo $_SESSION['name']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">

                                </td>
                                <td>
                                    <selection id="skiptosave"> </selection>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="isServiceGiven"
                                            name="isServiceGiven">
                                        <label class="custom-control-label" for="isServiceGiven">Is service
                                            given?</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <?php
                            if($editmode=true){
                                echo '<button type="submit" class="btn btn-success" name="updatedata"> Submit Details </button>';
                            }
                            else {
                                echo '<button type="submit" class="btn btn-success" name="savedata"> Submit Details </button>';
                            }
                        ?>
                    </form>
                </td>
            </tr>
        </table>
    </center>
    
    <br /><br /><br /><br /><br /><br /><br /><br />
    <!---
    <div class="fixed-bottom" align="right">
        <a href="#gotovisitor"><button class="btn btn-light btn-sm">Visitor Details</button></a>
        <a href="#gotoservice"><button class="btn btn-light btn-sm">Service Details</button></a>
        <a href="#skiptosave"><button class="btn btn-light btn-sm">Skip to bottom</button></a>
    </div>
    -->
</body>

</html>