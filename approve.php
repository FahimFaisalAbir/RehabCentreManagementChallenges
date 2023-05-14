<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rehab_approve</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style></style>
</head>
<body>
<header>

</header>


<?php


// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Rehab";


$conn=new mysqli($servername,$username,$password,$dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    function addDayswithdate($date, $days)
    {

        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);

    }

    $sql_id = "select P_id from patient WHERE P_name='" . $_GET['name'] . "'";
    $resultid = mysqli_query($conn, $sql_id);
    $id_array = mysqli_fetch_array($resultid);
    $id = $id_array['P_id'];
    $sql_slip = "select p_name,P_id from patient";

$result = mysqli_query($conn, $sql_slip);
while ($row = mysqli_fetch_array($result)) {
    if ($row['p_name'] == $_GET["name"] && $row['P_id'] != $_GET["id"]) {
        echo "SLIP DETECTED";
        echo $row['p_name'] . "new id=>" . $_GET['id'] . "old id=>" . $id;
    }
}           $sql2 = "insert into serves VALUES('d12','$id','tests',TRUE ,'1');";
            $sql1 = "UPDATE serves SET serves.dope_test =TRUE,serves.slip='1' WHERE Doc_id='d12' and Pt_id='". $id ."'";
            mysqli_query($conn,$sql1);
            $sql2 = "insert into serves VALUES('d12','$id','tests',TRUE ,'1');";
            mysqli_query($conn, $sql1);
            $insert_Rid = "r"."$id";
            //echo $insert_Rid . "SLIPPED_RECORD";
            $sql_confirm_slip = "UPDATE record SET record.cleandays ='SLIPPED' WHERE R_id='". $insert_Rid ."'";
            mysqli_query($conn, $sql_confirm_slip);



            echo "inserting";
            $flag = 0;
            $released = addDayswithdate($_GET["reg_date"], 90);
            $lastDate = date("Y/m/d");
            $insert_R_id = "r" . $_GET['id'];
            $sql_r = 'INSERT INTO record (R_id, released, last_session, meeting, cleandays)
    VALUES("' . $insert_R_id . '", "' . $released . '", "' . $lastDate . '", "' . $flag . '", "' . $flag . '")';
            $conn->query($sql_r);
            $date = date('y-m-d', strtotime($_GET["reg_date"]));

            $sql = "insert into rehab.patient VALUES
    ('" . $_GET["id"] . "','" . $_GET["name"] . "','" . $date . "','" . $_GET["adress"] . "','" . $_GET["major_chemical"] . "','" . $_GET["disorder"] . "','" . $flag . "','" . $_GET["message"] . "','" . "r" . $_GET["id"] . "')";

            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }



?>

<row>

    <div class="col-md-9 mb-md-0 mb-5">
        <form id="Form" name="contact-form" action="approve.php" method="get">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="">Your name</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="id" name="id" class="form-control">
                        <label for="id" class="">ID</label>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="reg_date" name="reg_date" class="form-control">
                        <label for="reg_date" class=""></label>
                    </div>
                </div>
            </div>
            <!--Grid row-->
            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="adress" name="adress" class="form-control">
                        <label for="adress" class="">Adress Information</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="major_chemical" name="major_chemical" rows="2" class="form-control md-textarea"></textarea>
                        <label for="major_chemical">Major chemical</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="disorder" name="disorder" class="form-control">
                        <label for="disorder" class="">Disorder category</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid column-->
            <div class="col-md-12">

                <div class="md-form">
                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                    <label for="message">Message</label>
                </div>

            </div>
            <!--Grid row-->

        </form>

        <div class="text-center text-md-left">
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
        </div>
        <div class="status"></div>
    </div>
</row>



<div class="right-div">
    <div class="centerPosition">
        Admin Panel<br>
        <button class="button"><a href ="Admin.html">Logout</a></button><br><br>
        Insert data<br>
        <a href="Form.php"><button class="button">Appoinment insert</button></a><br>
        Update data<br>
        <a href="Admin_update.html"><button class="button">Admin Update</button></a><br>
        DELETE data<br>
        <a href="artist_deleteForm.php"><button class="button">Delete By ID</button></a><br>
    </div>
</div>


</div>









<div class = "bottom-div">
    <a href="AlbumTable_Form.php"><button class="button bottom-button"><span>Album</span></button></a>
    <a href="Makers.php"><button class="button bottom-button"><span>Availability</span></button></a>
    <a href="status2.php"><button class="button bottom-button"><span>Track</span></button></a>
    <a href="View.php"><button class="button bottom-button"><span>Show list</span></button></a>
    <a href="Search.php"><button class="button bottom-button"><span>Search</span></button></a>
</div>
<script src="javscript.js"></script>

</body>
</html>