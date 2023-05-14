<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin_dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
    <style>.pt-3-half {
            padding-top: 1.4rem;
        }
    </style>

</head>
<body>
<header>

</header>


<?php
require 'Connection.php';
echo "<div class=\"card animated slideInLeft z-depth-5 shadow-lg .rgba-lime-slight\">
  <h3 class=\"card-header text-center font-weight-bold text-uppercase py-4 \">Editable table</h3>
  <div class=\"card-body\">
    <div id=\"table\" class=\"table-editable\">
      <span class=\"table-add float-right mb-3 mr-2\"><a href=\"#!\" class=\"text-success\"><i class=\"fa fa-plus fa-2x\"
            aria-hidden=\"true\"></i></a></span>";
$sql_table ="SELECT P_name,D_name,Speciality,Medication from Serves join doctor JOIN Patient on Serves.Doc_id=Doctor.D_id and Patient.P_id=Serves.Pt_id WHERE doctor.D_id='".$_GET['id']."';";
if($result = mysqli_query($conn, $sql_table)){
?><table id="dtVerticalScrollExample" style="font-size:larger;font-family: 'PT Sans Narrow', sans-serif;"class="table table-bordered table-responsive-md table-striped text-center rgba-light-green-slight " cellspacing="0" width="100%"><?php
    echo "<thread>";
    echo "<tr>";
    echo "<th class=\"text-center\">Patient</th>";
    echo "<th class=\"text-center\">Name</th>";
    echo "<th class=\"text-center\">Speciality</th>";
    echo "<th class=\"text-center\"><span style='color: orangered'>Service</span></th>";
    echo "</tr>";
    echo "</thread>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td class=\"pt-3-half\" contenteditable=\"true\" >" . $row['P_name'] . "</td>";
        echo "<td class=\"pt-3-half\" contenteditable=\"true\">". $row['D_name'] . "</td>";
        echo "<td class=\"pt-3-half\" contenteditable=\"true\">" . $row['Speciality'] . "</td>";
        echo "<td style='font-family: 'impact'' class=\"pt-3-half\" contenteditable=\"true\">" . $row['Medication'] . "</td>";
        echo "<td class=\"pt-3-half\">
            <span class=\"table-up\"><a href=\"#!\" class=\"indigo-text\"><i class=\"fa fa-long-arrow-up\" aria-hidden=\"true\"></i></a></span>
            <span class=\"table-down\"><a href=\"#!\" class=\"indigo-text\"><i class=\"fa fa-long-arrow-down\"
                  aria-hidden=\"true\"></i></a></span>
          </td>
          <td>
            <span class=\"table-remove\"><button type=\"button\" class=\"btn btn-success z-depth-3 btn-rounded btn-sm my-0\">Edit</button></span>
          </td>
        </tr>";
        echo "</tr>";
        echo "</tbody>";
        echo "</div>
  </div>
</div>";
    }

    echo "<tfoot>";
    echo "<tr>";
    echo "<th class=\"th-sm\">Patient</th>";
    echo "<th class=\"th-sm\">Name</th>";
    echo "<th class=\"th-sm\">Speciality</th>";
    echo "<th class=\"th-sm\">Service</th>";
    echo "</tr>";
    echo "</tfoot>";

    echo "</table>";

    }?>

    <?php include 'Footer.php'?>









    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        new WOW().init();
        new fadeInLeft().init();
    </script>
<script src="javscript.js"></script>

</body>
</html>