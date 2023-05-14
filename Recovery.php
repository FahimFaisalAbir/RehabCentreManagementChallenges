<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="x_fresh_bootstrap_table_v1.1/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Fresh Recovery List</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <link href="x_fresh_bootstrap_table_v1.1/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="x_fresh_bootstrap_table_v1.1/assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <div class="fresh-table full-color-green full-screen-table">
<?php include 'Connection.php';
function writeType($clean)
{
    switch ($clean) {
        case ($clean > 365):
            return "Recovery";
            break;
        case ($clean > 90):
            return "FollowUp";
            break;
        case ($clean < 30):
            return "Risky";
            break;
        case ($clean < 90):
            return "inhouse";
            break;
        default:
            return "Processing!";
    }
}

/*$sql_list="SELECT P_name,major_chemical,meeting,record.cleandays FROM record
JOIN patient ON Patient.record_id=record.R_id
ORDER BY R_id;";*/
$sql_list="SELECT patient.p_name,major_chemical,meeting,cleandays from record join patient on record.R_id= Patient.record_id where cleandays!= 'slipped' ORDER BY R_id ;";
if($result = mysqli_query($conn, $sql_list)){
?><div class="toolbar">
            <a role="button" href="record.php" class="btn btn-rounded btn-outline-unique btn-lg">Return <i class="fa fa fa-mail-reply pl-1"></i></a>
            <button id="alertBtn" class="btn btn-default">Alert</button>
        </div>
        <table id="dtVerticalScrollExample"  style="font-family: 'Aclonica', sans-serif;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><?php
    echo "<table id=\"fresh-table\" class=\"table\">
            <thead>
            <th data-field=\"name\" data-sortable=\"true\">Name</th>
            <th data-field=\"salary\" data-sortable=\"true\">Major Substance</th>
            <th data-field=\"country\" data-sortable=\"true\">meeting</th>
            <th data-field=\"city\" data-sortable=\"true\">clean Days</th>
            <th data-field=\"type\" data-sortable=\"true\">TYPE</th>
            </thead>";
            echo "<tbody>";

    while ($row = mysqli_fetch_array($result)) {
         echo   "<tr>";
        echo "<td>".$row['p_name']."</td>";
        echo "<td>".$row['major_chemical']."</td>";
        echo "<td>".$row['meeting']."</td>";
        echo "<td>".$row['cleandays']."</td>";
        echo "<td>".$value=writeType((int)$row['cleandays'])."</td>";

            echo "</tr>";

        }
            }
            echo "</tbody>";
            echo "</table>";
            echo  "</div>

</div>";

    ?>



</div>


</body>
<script type="text/javascript" src="x_fresh_bootstrap_table_v1.1/assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="x_fresh_bootstrap_table_v1.1/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="x_fresh_bootstrap_table_v1.1/assets/js/bootstrap-table.js"></script>

<script type="text/javascript">
    var $table = $('#fresh-table'),
        $alertBtn = $('#alertBtn'),
        full_screen = false,
        window_height;

    $().ready(function(){

        window_height = $(window).height();
        table_height = window_height - 20;


        $table.bootstrapTable({
            toolbar: ".toolbar",

            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            striped: true,
            sortable: true,
            height: table_height,
            pageSize: 25,
            pageList: [25,50,100],

            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        window.operateEvents = {
            'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .edit': function (e, value, row, index) {
                alert('You click edit icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });

            }
        };

        $alertBtn.click(function () {
            alert("You pressed on Alert");
        });


        $(window).resize(function () {
            $table.bootstrapTable('resetView');
        });
    });


    function operateFormatter(value, row, index) {
        return [
            '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
            '<i class="fa fa-heart"></i>',
            '</a>',
            '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
            '<i class="fa fa-edit"></i>',
            '</a>',
            '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
            '<i class="fa fa-remove"></i>',
            '</a>'
        ].join('');
    }

</script>

</html>