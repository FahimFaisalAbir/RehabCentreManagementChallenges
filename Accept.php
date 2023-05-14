<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
    <style>able.dataTable thead>tr>td.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc {
            padding-right: 30px
        }

        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_desc_disabled {
            cursor: pointer;
            position: relative
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            position: absolute;
            bottom: .5em;
            display: block;
            opacity: .3
        }

        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:before {
            right: 1em;
            content: "\f0de";
            font-family: FontAwesome;
            font-size: 1rem
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc_disabled:after {
            content: "\f0dd";
            font-family: FontAwesome;
            right: 16px;
            font-size: 1rem
        }

        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_desc:after {
            opacity: 1
        }

        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc_disabled:after {
            opacity: 0
        }
    </style>

</head>
<body>
<?php include 'Header.php'?>
<?php include 'Connection.php'?>
    <!--code for printing pending request-->
<?php
echo $_GET['id'];

$sql_table = "select * from patient WHERE Flag='1';";
if($result = mysqli_query($conn, $sql_table)){

    ?><table id="dtVerticalScrollExample" style="font-family: 'Comic Sans MS';font-weight:bolderapp;font-size: larger" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><?php
    echo "<thread>";
    echo "<tr>";
    echo "<th class=\"th-sm\">ID</th>";
    echo "<th class=\"th-sm\">Name</th>";
    echo "<th class=\"th-sm\">entry date</th>";
    echo "<th class=\"th-sm\">adress</th>";
    echo "<th class=\"th-sm\">major Substance</th>";
    echo "<th class=\"th-sm\">disorder</th>";
    echo "<th class=\"th-sm\">Flag</th>";
    echo "<th class=\"th-sm\">Messaage</th>";
    echo "<th class=\"th-sm\">Action</th>";
    echo "</tr>";
    echo "</thread>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row['P_id'] . "</td>";
        echo "<td>" . $row['P_name'] . "</td>";
        echo "<td>". $row['reg_date'] . "</td>";
        echo "<td>" . $row['adress'] . "</td>";
        echo "<td>" . $row['major_chemical'] . "</td>";
        echo "<td>" . $row['disorder'] . "</td>";
        echo "<td class='font-weight-bold green-text'>" . 'APPROVED' . "</td>";
        echo "<td>" . $row['Message'] . "</td>";
        echo "</tr>";
        echo "</tbody>";
    }

    echo "<tfoot>";
    echo "<tr>";
    echo "<th class=\"th-sm\">ID</th>";
    echo "<th class=\"th-sm\">Name</th>";
    echo "<th class=\"th-sm\">entry date</th>";
    echo "<th class=\"th-sm\">adress</th>";
    echo "<th class=\"th-sm\">major Substance</th>";
    echo "<th class=\"th-sm\">disorder</th>";
    echo "<th class=\"th-sm\">Flag</th>";
    echo "<th class=\"th-sm\">Messaage</th>";
    echo "<th class=\"th-sm\">Action</th>";
    echo "</tr>";
    echo "</tfoot>";

    echo "</table>";

}
// echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
   $insert_id= $_GET['id'];
$sql_insert = "UPDATE Rehab.patient SET patient.Flag = '1' WHERE P_id='$insert_id';";
    //$released = addDayswithdate($_GET["reg_date"], 90);
    //$sql_record = "UPDATE record SET last_session =,serves.slip='1' WHERE P_id='$insert_id';";

    mysqli_query($conn, $sql_insert);

    function addDayswithdate($date,$days){

        $date = strtotime("+".$days." days", strtotime($date));
        return  date("Y-m-d", $date);

    }

?>
    <?php include 'Footer.php'?>
    <!-- Footer
     $insert_R_id= "r".$_GET['id'];
    $datetime = new DateTime( $_row['reg_date']);
    $datetime->modify('+90 day');
    $released= $datetime->modify('+90 day');
    echo $released;
    $sql_insert_day = "UPDATE Rehab.record SET record.released = '$released' WHERE R_id='$insert_R_id';";
    mysqli_query($conn, $sql_insert_day);-->

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
        $().DataTables()
        $(document).ready(function () {
            $('#dtVerticalScrollExample').DataTable({
                "scrollY": "200px",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function () {
            $('#dtHorizontalExample').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
        new WOW().init();
        new fadeInLeft().init();
        $('#myAlert').on('closed.bs.alert', function () {
            document.alert("You want to log out ??");
        })
    </script>

</body>

</html>


