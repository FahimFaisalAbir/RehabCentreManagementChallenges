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


require 'Connection.php';

function addDayswithdate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);

}
if($_GET['field']=='reg_date') {
    $date = date('y-m-d', strtotime($_GET["value"]));
    $sql_update = "UPDATE Patient SET Patient." . $_GET['field'] . " = '" .$date . "' WHERE P_id='" . $_GET['P_id'] . "';";
    $released = addDayswithdate($date,90);
    echo $released;
    $rid="r".$_GET['P_id'];
    echo $rid;
    $sql_release = "UPDATE record SET released ='".$released."' WHERE R_id='" .$rid . "';";
    mysqli_query($conn, $sql_update);
    mysqli_query($conn, $sql_release);
}else {
    echo $_GET['field'];
    echo "ggggggggggggggggggggg";
    $sql_update = "UPDATE Patient SET patient." . $_GET['field'] . " = '" . $_GET['value'] . "' WHERE P_id='" . $_GET['P_id'] . "';";
}

if ($conn->query($sql_update) === TRUE ) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>




<a class="btn-floating btn-lg purple-gradient" href="Admin_dashboard.php"><i class="fa fa-bolt"></i>Go Back to see table</a>

</body>










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