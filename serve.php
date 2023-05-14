<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>List Of Patients Disorder,Drugs</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

    <?php include 'Header.php'?>

<?php
require 'Connection.php'?>
<body>
<main>
 <div class="row">
     <!-- Grid row -->
     <div class="row">

         <!-- Grid column -->
         <div class="col-lg-4 col-md-12">

             <!--Card-->
             <div class="card">

                 <!--Card image-->
                 <div class="view" style="width: 180vh;">
                     <a href="#">
                         <div class="mask rgba-white-slight"></div>
                     </a>
                 </div>

                 <!--Card content-->
                 <!-- Rotating card -->
                 <div class="card-wrapper">
                     <div id="card-1" class="card card-rotating text-center z-depth-3">

                         <!-- Front Side -->
                         <div class="face front">

                             <!-- Image-->
                             <div class="card-up z-depth-3">
                                 <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo7.jpg" alt="Image with a photo of clouds.">
                             </div>

                             <!-- Avatar -->
                             <div class="avatar mx-auto white"><img src="img/miraz.jpg"
                                                                    class="rounded-circle" alt="Sample avatar image.">
                             </div>

                             <!-- Content -->
                             <div class="card-body">
                                 <h4 class="font-weight-bold mb-3">Miraz U Ahmed</h4>
                                 <p class="font-weight-bold blue-text">Maanging Director</p>
                                 <!-- Triggering button -->
                                 <a class="rotate-btn" data-card="card-1"><i class="fa fa-repeat"></i> Click here to rotate</a>
                             </div>
                             <!-- Card content -->
                             <div class="card-body">

                                 <!-- Social meta-->
                                 <div class="social-meta">
                                     <p>Another great adventure! </p>
                                     <p><i class="fa fa-comment"></i>13 comments</p>
                                 </div>
                                 <hr>
                                 <!-- Comment input -->
                                 <div class="md-form">
                                     <i class="fa fa-heart-o prefix"></i>
                                     <input placeholder="Add Comment..." type="text" id="form5" class="form-control">
                                 </div>

                             </div>
                             <!-- Card content -->
                         </div>
                         <!-- Front Side -->

                         <!-- Back Side -->
                         <div class="face back card">
                             <div class="card-body">

                                 <!-- Content -->
                                 <h4 class="font-weight-bold">About me</h4>
                                 <hr>
                                 <p>
                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat tenetur odio suscipit non commodi
                                     vel eius veniam maxime?
                                 </p>
                                 <hr>
                                 <!-- Social Icons -->
                                 <ul class="list-inline py-2">
                                     <li class="list-inline-item"><a class="p-2 fa-lg fb-ic"><i class="fa fa-facebook"></i></a></li>
                                     <li class="list-inline-item"><a class="p-2 fa-lg tw-ic"><i class="fa fa-twitter"></i></a></li>
                                     <li class="list-inline-item"><a class="p-2 fa-lg gplus-ic"><i class="fa fa-google-plus"></i></a></li>
                                     <li class="list-inline-item"><a class="p-2 fa-lg li-ic"><i class="fa fa-linkedin"></i></a></li>
                                 </ul>
                                 <!-- Triggering button -->
                                 <a class="rotate-btn" data-card="card-1"><i class="fa fa-undo"></i> Click here to rotate back</a>

                             </div>
                         </div>
                         <!-- Back Side -->

                     </div>

                 </div>
                 <!-- Rotating card -->

             </div>
             <!--/.Card-->

         </div>
         <!-- Grid column -->

         <!-- Grid column -->
         <div class="col-lg-4 col-md-6 z-depth-3">

             <div class="card">
                 <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-5">Disorder Types</h3>
                  "<div class="card-body">"
                 <?php
                 $sql_disorder="select disorder, count(*)from patient group by disorder;";
                 if($result = mysqli_query($conn, $sql_disorder)){
while ($row = mysqli_fetch_array($result)) {
    echo " <ul style=\"font-family: 'Rancho', cursive;font-size: larger\" class=\"list-group\">";
    echo " <li class=\"list-group-item d-flex justify-content-between align-items-center\">" . $row['disorder'] . " <span class=\"badge badge-primary badge-pill\">".$row['count(*)']."</li>";
    echo " </ul>";
}
             }
?>
                     <p class=\"text-small text-muted mb-0 pt-3\">* Major types of disorders.</p>
                 </div>
             </div>
         </div>
         <!-- Grid column -->

         <!-- Grid column -->
         <div class="col-lg-4 col-md-6 z-depth-3">

             <!--Panel-->
             <div class="card">
                 <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-5">Major Substances</h3>
                 <div class="card-body">
                     <?php
                     $sql_drugs="select major_chemical, count(*)from patient group by major_chemical;";
                     if($result = mysqli_query($conn, $sql_drugs)) {
                         while ($rows = mysqli_fetch_array($result)) {
                             echo " <ul style=\"font-family: 'Rancho', cursive;font-size: larger\" class=\"list-group\">";
                             echo " <li class=\"list-group-item d-flex justify-content-between align-items-center\">" . $rows['major_chemical'] . " <span class=\"badge badge-primary badge-pill\">" . $rows['count(*)'] . "</li>";
                             echo " </ul>";
                         }
                     }
                     ?><form class="text-center rgba-light-green-light border border-light z-depth-3 p-5 animated slideInDown" action="Serves_child.php" method="get">
                         <!-- Subject -->
                         <label>chemical</label>
                         <select name="chemical" class="browser-default custom-select mb-4">
                             <option value="" disabled>Choose option</option>"<?php
                     if($result = mysqli_query($conn, $sql_drugs)) {
                         while ($rows = mysqli_fetch_array($result)) {
                             echo " <option value=" . $rows['major_chemical'] . " >" . $rows['major_chemical'] . "</option> ";
                         }
                         echo "</select>";
                         echo "  <button class=\"btn btn-rounded btn-danger z-depth-3\" type=\"submit\">Substance Specific List</button>";
                         echo "</form>";
                     }
                     ?>
                     <p class="text-small text-muted mb-0 pt-3">* Type of Major Substances among patients.</p>
                 </div>
             </div>

             <!--/.Panel-->

         </div>
         <!-- Grid column -->

     </div>
     <!-- Grid row -->
 </div>

    <!-- Error message --
    <!--Accordion wrapper-->
        <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingUnfiled">

                    <!--Options-->
                    <div class="dropdown pull-left">
                        <button class="btn btn-info btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil"></i>
                        </button>
                        <div class="dropdown-menu dropdown-info">
                            <a class="dropdown-item" href="#">Add new condition</a>
                            <a class="dropdown-item" href="#">Rename folder</a>
                            <a class="dropdown-item" href="#">Delete folder</a>
                        </div>
                    </div>

                    <!-- Heading -->
                    <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled" aria-expanded="true"
                       aria-controls="collapseUnfiled">
                        <h5 class="mt-1 mb-0">
                            <span>Unfiled items</span>
                            <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>

                </div>

                <!-- Card body -->
                <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled" data-parent="#accordionEx78">
                    <div class="card-body">

                        <!--Top Table UI-->

                        <!-- Table responsive wrapper -->
                        <div class="table-responsive mx-3">
                            <!--Table-->
                            <table class="table table-hover mb-0 z-depth-3">
                                <?php
                                function writeType($flag)
                                {
    switch ($flag) {
        case ("1"):
            return "<p style='color: :green'>Approved</p>";
            break;
        case ("0"):
            return "<p style='color: Red'>Pending</p>";
            break;
    }
}


                                $sql_table = "select * from Patient;";
                                if($result = mysqli_query($conn, $sql_table)){

                                ?><table id="dtVerticalScrollExample" style="font-size:large;font-family: 'Copse', serif;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><?php
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

while ($rowy = mysqli_fetch_array($result)) {
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $rowy['P_id'] . "</td>";
    echo "<td>" . $rowy['P_name'] . "</td>";
    echo "<td>". $rowy['reg_date'] . "</td>";
    echo "<td>" . $rowy['adress'] . "</td>";
    echo "<td>" . $rowy['major_chemical'] . "</td>";
    echo "<td>" . $rowy['disorder'] . "</td>";
    echo "<td class='font-weight-bold green-text'>" . writeType($rowy['Flag']) . "</td>";
    echo "<td>" . $rowy['Message'] . "</td>";
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

?>

</main>

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

<script type="text/javascript">
       <?php
       $mine= "<script>document.writeln(drugs);</script>";?>

       </script>

</body>

</html>


