<html>
<?php
/**
* Created by PhpStorm.
 * User: 15201001
* Date: 11/20/2018
* Time: 10:40 AM
*/
require 'Connection.php';
//echo $_GET['id'];
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

echo $_GET['days'];
//$start = new DateTimeTimeImmutable('2018-01-05');
function addDayswithdate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);

}
        function writeType($clean)
        {
            switch ($clean) {
                case ($clean > 365):
                    echo "Recovery";
                    break;
                case ($clean > 90):
                    echo "FolloUp";
                    break;
                case ($clean < 90):
                    echo "inhouse";
                    break;
                case ($clean < 30):
                    echo "Risky";
                    break;
                default:
                    echo "Inhouse!";
            }
        }
        writeType(10);

$data= addDayswithdate('2018-01-05',90);
echo $data;
$lastDate =  date("Y/m/d");
echo $lastDate;
    ?>


</html>
