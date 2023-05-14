<!DOCTYPE html>
<div lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

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
</head>

<?php include 'Header.php'?>

<?php
include 'datecheck.php';
require 'Connection.php';
/*
    $interval can be:
    yyyy - Number of full years
    q    - Number of full quarters
    m    - Number of full months
    y    - Difference between day numbers
           (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d    - Number of full days
    w    - Number of full weekdays
    ww   - Number of full weeks
    h    - Number of full hours
    n    - Number of full minutes
    s    - Number of full seconds (default)
$date1=date_create("2012-03-15");
$date2=date_create("2013-12-12");
$diff=(date_diff($date1,$date2));
echo $diff->format("%R%a days");
    */
/**
 * @param $interval
 * @param $datefrom
 * @param $dateto
 * @param bool $using_timestamps
 * @return false|float|int|string
 */



//$from='2018-9-1';
//$to='2018-10-10';

//$days=datediff('d',$from,$to,false);
//$week=datediff('ww',$from,$to,false);
//$month=datediff('m',$from,$to,false);
//$year=datediff('yyyy',$from,$to,false);

$sql_record = "SELECT R_id,P_name,major_chemical,reg_date,released,last_session,meeting,record.cleandays
FROM record
  JOIN patient ON Patient.record_id=record.R_id
ORDER BY p_name,released";
/*
$sql_slipy="select * from (select p_name,R_id,count(*) as counter from record join Patient on Patient.record_id=record.R_id GROUP BY P_name) as T1 where T1.counter>1 ;";

$slip_array = array();

if($result = mysqli_query($conn, $sql_slipy)) {
    while ($slip = mysqli_fetch_array($result)) {
         $key=$slip['p_name'];
            //echo $slip['p_name']."---".$slip['counter'];
            $value= $slip['counter'];
        $slip_array = array("$key" => "$value");
    }
}

foreach($slip_array as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

foreach($slip_array as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
        echo "The number is: $x ";
      $ud="UPDATE record
  INNER JOIN Patient ON record.R_id = Patient.record_id
SET record.cleandays='slipped'
WHERE patient.P_name='" . $x . "' ;";
        mysqli_query($conn, $ud);
    echo "updated".$x.$x_value;

    }
*/

$sql_new = "select COUNT(*) from record where record.cleandays>365;";
$query_recovery = mysqli_query( $conn, "select COUNT(*) as count from record where record.cleandays>365; ");
$query_followUP = mysqli_query( $conn, "select COUNT(*) as count from record where record.cleandays>90; ");
$query_inhouse = mysqli_query( $conn, "select COUNT(*) as count from record where record.cleandays<90; ");
$query_risk = mysqli_query( $conn, "select COUNT(*) as count from record where record.cleandays<30; ");
$react1 = mysqli_fetch_assoc($query_recovery);
$recovery=$react1['count'];
$react2 = mysqli_fetch_assoc($query_followUP);
$followUP=$react2['count'];
$react3 = mysqli_fetch_assoc($query_inhouse);
$inhouse=$react3['count'];
$react4 = mysqli_fetch_assoc($query_risk);
$risky=$react4['count'];

?><script>
    // boolean outputs "" if false, "1" if true
    var recovery = "<?php echo $recovery ?>";//1
    //document.write(recovery);

    // numeric value, both with and without quotes
    var followup = <?php echo $followUP ?>; // 7
    var inhouse = "<?php echo $inhouse ?>"; // "7" (a string)
    var risky = "<?php echo $risky ?>"; // "7" (a string)
    </script> <?php

?>
    <a role="button" href="Recovery.php" class=" btn-floating btn-unique btn-lg z-depth-3 animated bounce slow"><i class="fa fa fa-hand-peace-o"></i></a>
    <div class="row"><div class="col-md-6"> <h1 class="alert-danger">NO. OF Recovery <?php echo $recovery?>
        <h1 class="sunny-morning-gradient animated zoomIn slower ">NO. OF Follow UP <?php echo $followUP?></h1>
        <h1 class="success-color font-weight-bold animated fadeInRightBig slower">NO. OF IN-HOUSE <?php echo $inhouse?></h1>
        <h1 class="alert alert-secondary font-weight-bold animated fadeInRightBig slower">NO. OF RELAPSE RISK PATIENT <?php echo $risky?></h1>
    </div>
<div <div class="col-md-6 card justify-content-center">
    <canvas id="myChart" style="max-width: 500px;"></canvas>
</div></div>
    <input id='myInput' onkeyup='searchTable()' placeholder="Search for anything.." type='text'>

    <?php

?><div class="col-md-6"></div> <?php

if($result = mysqli_query($conn, $sql_record)){
    ?>
    <table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0"
           width="100%"><?php
        echo "<th>";
        echo "<tr class=\"header\">';";
        echo "<th class=\"th-sm\">ID</th>";
        echo "<th class=\"th-sm\">Name</th>";
        echo "<th class=\"th-sm\">Major Substance</th>";
        echo "<th class=\"th-sm\">Entry date</th>";
        echo "<th class=\"th-sm\">release date</th>";
        echo "<th class=\"th-sm\">Last session date</th>";
        echo "<th class=\"th-sm\">meeting</th>";
        echo "<th class=\"th-sm\">Clean time</th>";
        echo "<th class=\"th-sm\">Action</th>";
        echo "</th>";
        //echo "</thread>";

        while ($row = mysqli_fetch_array($result)) {
            //echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row['R_id'] . "</td>";
            echo "<td>" . $row['P_name'] . "</td>";
            echo "<td>" . $row['major_chemical'] . "</td>";
            echo "<td>" . $row['reg_date'] . "</td>";
            echo "<td>" . $row['released'] . "</td>";
            echo "<td>" . $row['last_session'] . "</td>";
            echo "<td>" . $row['meeting'] . "</td>";
            echo "<td>" . $row['cleandays'] . " Days" . "</td>";
            echo "<td class='font-weight-bold'> <a href='try.php?id=" . $row['R_id'] . "'><span style='color: slateblue ;'>Change</span></a></td>";
            echo "</tr>";
            //echo "</tbody>";
            $meeting=datediff('ww',$row['released'] ,$row['last_session'],false);
            if($meeting<0){$meeting='inhouse meeting';}
            $insert=datediff('d',$row['released'] ,$row['last_session'],false);
            if($insert<0){$insert='Processing';}
            if($row['cleandays']!=$insert || $row['meeting']!=$meeting) {
                $id = $row['R_id'];
                $sql_insert_days = "UPDATE Rehab.record SET record.cleandays = '$insert' WHERE R_id='$id';";
                mysqli_query($conn, $sql_insert_days);
                $sql_insert_meeting = "UPDATE Rehab.record SET record.meeting = '$meeting' WHERE R_id='$id';";
                mysqli_query($conn, $sql_insert_meeting);
            }
        }





            echo "<th>";
            echo "<tr>";
            echo "<th class=\"th-sm\">ID</th>";
            echo "<th class=\"th-sm\">Name</th>";
            echo "<th class=\"th-sm\">Major Substance</th>";
            echo "<th class=\"th-sm\">Entry date</th>";
            echo "<th class=\"th-sm\">release date</th>";
            echo "<th class=\"th-sm\">Last session date</th>";
            echo "<th class=\"th-sm\">meeting</th>";
            echo "<th class=\"th-sm\">Clean time</th>";
            echo "<th class=\"th-sm\">Action</th>";
            echo "</tr>";
            echo "</th>";

            echo "</table>";

        }
        $sql_slipy = "select * from (select p_name,R_id,count(*) as counter from record join Patient on Patient.record_id=record.R_id GROUP BY P_name) as T1 where T1.counter>1 ;";

        $slip_array = array();

       /* if ($result = mysqli_query($conn, $sql_slipy)) {
            while ($slip = mysqli_fetch_array($result)) {
                $key = $slip['p_name'];
                //echo $slip['p_name']."---".$slip['counter'];
                $value = $slip['counter'];
                $slip_array = array("$key" => "$value");
            }
        }
       for($i = 0, $l = count($array); $i < $l; ++$i) {
 // do something with $array[$i]
}*/
        if($result = mysqli_query($conn, $sql_slipy)){
            while ($row = mysqli_fetch_array($result)) {
                //echo $row['p_name'];
                $key = $row['p_name'];
                //echo $slip['p_name']."---".$slip['counter'];
                $value = $row['counter'];
                //$slip_array = array($key => $value);
                $slip_array["$key"]= "$value";
            }

        }

        foreach ($slip_array as $x => $x_value) {
            //echo "Key=..." . $x . ", Value=" . $x_value;
            //echo "<br>";
        }


        foreach ($slip_array as $x => $x_value) {
            //echo "Key=" . $x . ", Value=" . $x_value;
            $ud = "UPDATE record
  INNER JOIN Patient ON record.R_id = Patient.record_id
SET record.cleandays='slipped'
WHERE patient.P_name='" . $x . "' ;";
            mysqli_query($conn, $ud);
            //echo "updated" . $x . $x_value;

        }
   $check="select record.last_session,record.cleandays,record.released,max(record.released) as max
from patient join record on Patient.record_id=record.R_id
group by p_name
having count(*)>=2";
        if($res = mysqli_query($conn, $check)) {
            while ($sari = mysqli_fetch_array($res)) {
                //echo $sari['max'];
                //echo $sari['cleandays'];
                //echo ">>>>>>>>>>>>>>>>>>";
                $var=datediff('d',$sari['released'] ,$sari['last_session'],false);
                $updates ="update record set record.cleandays='".$var."' where record.released='".$sari['max']."'";
                if($updates<0){
                    $updates='processing';
                }
                //echo $sari['cleandays'];
                mysqli_query($conn,$updates);
            }
        }




        ?>

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
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Recovery", "followup", "inhouse", "risky"],
                //labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of cleans',
                    data: [recovery, followup, inhouse,risky],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new WOW().init();
        new fadeInLeft().init();
            function searchTable() {
                var input, filter, found, table, tr, td, i, j;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td");
                    for (j = 0; j < td.length; j++) {
                        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                    if (found) {
                        tr[i].style.display = "";
                        found = false;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        </script>

