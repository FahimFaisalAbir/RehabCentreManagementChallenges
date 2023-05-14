<?php
session_start();

if (!$_SESSION['is_login']) {
    # code...
    die('you no see page!');
}
?>
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
    <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa" rel="stylesheet">
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
<div class="row rgba-blue-grey-light"><div style="text-align: left;" class=" col-md-10 alert alert-primary animated zoomIn" role="alert">Hello <?php echo $_SESSION['name']; ?></div><div class="col-md-3=4>"><a href="logout.php" class="btn btn-default btn-rounded" >LogOut</a></div></div>
<div class="alert alert-success" role="alert">
<h1>Secret Page Here</h1>
</div>
<main>

    <div id="row">
        <?php include 'Connection.php'?>
        <!--code for printing pending request-->
        <?php

        $sql_table = "select * from patient WHERE Flag='0';";
        if($result = mysqli_query($conn, $sql_table)){
            ?><form name="myForm"  action="Accept.php" method="get"></form><?php
            ?><table id="dtVerticalScrollExample" style="font-family: 'Aref Ruqaa', serif;" class="table table-striped table-bordered table-sm animated bounceInUp slower z-depth-3" cellspacing="0" width="100%"><?php
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
            echo "<th class=\"th-sm\">Update</th>";
            echo "</tr>";
            echo "</thread>";

            while ($row   = mysqli_fetch_array($result)) {
                echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $row['P_id'] . "</td>";
                echo "<td>" . $row['P_name'] . "</td>";
                echo "<td>". $row['reg_date'] . "</td>";
                echo "<td>" . $row['adress'] . "</td>";
                echo "<td>" . $row['major_chemical'] . "</td>";
                echo "<td>" . $row['disorder'] . "</td>";
                echo "<td class='font-weight-bold red-text'>" . 'Pending' . "</td>";
                echo "<td>" . $row['Message'] . "</td>";
                //echo "<td class='font-weight-bold'> <a href='Accept.php?id=" . $row['P_id'] . "'><span style='color: slateblue ;'>Approve</span></a></td>";
                echo "<td><a role='button' href='Accept.php?id=" . $row['P_id'] . "' class='btn btn-rounded btn-dark-green z-depth-5'>Approve</a></td>";

                echo "<td class='font-weight-bold'>

<form action=\"Change.php\" method=\"get\" >
            <select name=\"field\" class=\"browser-default custom-select mb-4\">
                <option value=\"\" disabled>Choose option</option>
                <option value=\"P_name\" selected>Name</option>
                <option value=\"reg_date\">Date</option>
                <option value=\"adress\">adress</option>
            </select>
             <input type=\"text\" id=\"value\" name=\"value\" class=\"form-control mb-4\" placeholder=\"Insert\">
             <input type=\"hidden\" id=\"value\" value='".$row['P_id']."' name=\"P_id\" class=\"form-control mb-4\" placeholder=\"Insert\">
            <button class=\"btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-5\" type=\"submit\">Change</button>
             </form>
             </td>";
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
            echo "<th class=\"th-sm\">Update</th>";
            echo "</tr>";
            echo "</tfoot>";

            echo "</table>";

        }
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        ?>


    </div>
    <div class="row" name="formrow">
        <!-- Default form contact -->
        <form class="text-center rgba-light-green-light border border-light p-5 z-depth-3 animated slideInLeft slower" action="doctor.php" method="post" enctype="multipart/form-data">

            <p class="h4 mb-4">Update Doctors</p>

            <!-- Name -->
            <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Name">

            <!-- Email -->
            <input type="text" id="id" name="id" class="form-control mb-4" placeholder="id">

            <!-- Subject -->
            <label>Speciality</label>
            <select name="speciality" class="browser-default custom-select mb-4">
                <option value="" disabled>Choose option</option>
                <option value="Doctor" selected>Doctor</option>
                <option value="Case Manager">Case Manager</option>
                <option value="Councilor">Councilor</option>
                <option value="In-House instructor">In-House instructor</option>
            </select>
            <!-- Message -->
        <div class="file-field big">
            <a class="btn-floating btn-lg pink lighten-1 mt-0 float-left z-depth-3">
                <i class="fa fa-paperclip" aria-hidden="true"></i>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
            </a>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
        </div>
            <div class="form-group">
                <textarea class="form-control rounded-0" name="details" id="details" rows="3" placeholder="Details"></textarea>
            </div>

            <!-- Send button -->
            <button class="btn btn-info btn-block z-depth-2" type="submit" name="submit" value="Upload Image">Send</button>

        </form>
        <!-- Default form contact -->
    </div>
    <!--Panel-->
    <div class="card col-md-5 align-content-right">
        <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-5">Slip Count per patients</h3>
        <div class="card-body">
            <?php
            $sql_drugs="select * from (select P_name,count(*) as SLIPCOUNT from Patient group by P_name) as derived_table where derived_table.SLIPCOUNT>1;;";
            if($result = mysqli_query($conn, $sql_drugs)) {
                while ($rows = mysqli_fetch_array($result)) {
                    echo " <ul style=\"font-family: 'Rancho', cursive;font-size: larger\" class=\"list-group\">";
                    echo " <li class=\"list-group-item d-flex justify-content-between align-items-center\">" . $rows['P_name'] . " <span class=\"badge badge-primary badge-pill\">" . ($rows['SLIPCOUNT']-1) . "</li>";
                    echo " </ul>";
                }
            }
            ?>

        </div>
    </div>

    <!--/.Panel-->
</main>
<!-- Footer -->
<?php include 'Footer.php'?>
<!-- Footer -->

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
    $('#dtVerticalScrollExample').addClass('animated zoomIn');
    $('#your-custom-id-material').mdbDropSearch();
    function myFunction(val) {
        var str1 = "Accept.php?id=$row['P_id']";
        var str2 = val;
        var res = str1.concat(str2);
        document.getElementById("demo").innerHTML = res;
    }
</script>

</body>

</html>

