<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rehab_Index</title>
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
$dbname = "Rehab_2";


$conn=new mysqli($servername,$username,$password,$dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date=date('y-m-d',strtotime($_GET["reg_date"]));
$flag=0;

$sql = "insert into rehab_2.patient VALUES
    ('" . $_GET["id"] . "','" . $_GET["name"] . "','" . $date ."','". $_GET["adress"] . "','" . $_GET["major_chemical"] . "','". $_GET["disorder"] .  "','" . $flag ."','". $_GET["message"] ."')";
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
<row>
    <!--code for printing pending request-->
    <?php

    $sql_table = "select * from patient WHERE Flag='0';";
    if($result = mysqli_query($conn, $sql_table)){
        ?><form name="myForm"  action="Try.php" method="get"></form><?php
        echo "<<table class=\"table table-striped rgba-light-green-slight\">>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>entry date</th>";
        echo "<th>adress</th>";
        echo "<th>major Substance</th>";
        echo "<th>disorder</th>";
        echo "<th>Flag</th>";
        echo "<th>Messaage</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) {
            ?> <td><input type="submit" value="Change" name="submit_btn"></td><?php
            echo "<tr>";
            echo "<td name='P_id'>" . $row['P_id'] . "</td>";
            echo "<td name=''P_name''>" . $row['P_name'] . "</td>";
            echo "<td name='reg_date'>". $row['reg_date'] . "</td>";
            echo "<td name='address'>" . $row['adress'] . "</td>";
            echo "<td name='major_chemiacal'>" . $row['major_chemical'] . "</td>";
            echo "<td name='disorder'>" . $row['disorder'] . "</td>";
            echo "<td>" . 'Pending' . "</td>";
            echo "<<td name='Message'>" . $row['Message'] . "</td>";
            echo "<td> <a href='try.php?id=" . $row['P_id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";

    }
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    ?>


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