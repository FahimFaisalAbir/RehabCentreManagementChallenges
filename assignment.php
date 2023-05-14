<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .form-dark .font-small {
            font-size: 0.8rem; }

        .form-dark [type="radio"] + label,
        .form-dark [type="checkbox"] + label {
            font-size: 0.8rem; }

        .form-dark [type="checkbox"] + label:before {
            top: 2px;
            width: 15px;
            height: 15px; }

        .form-dark .md-form label {
            color: #fff; }

        .form-dark input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #00C851;
            -webkit-box-shadow: 0 1px 0 0 #00C851;
            box-shadow: 0 1px 0 0 #00C851; }

        .form-dark input[type=text]:focus:not([readonly]) + label {
            color: #fff; }

        .form-dark input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #00C851;
            -webkit-box-shadow: 0 1px 0 0 #00C851;
            box-shadow: 0 1px 0 0 #00C851; }

        .form-dark input[type=password]:focus:not([readonly]) + label {
            color: #fff; }

        .form-dark input[type="checkbox"] + label:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 17px;
            height: 17px;
            z-index: 0;
            border: 1.5px solid #fff;
            border-radius: 1px;
            margin-top: 2px;
            -webkit-transition: 0.2s;
            transition: 0.2s; }

        .form-dark input[type="checkbox"]:checked + label:before {
            top: -4px;
            left: -3px;
            width: 12px;
            height: 22px;
            border-style: solid;
            border-width: 2px;
            border-color: transparent #00c851 #00c851 transparent;
            -webkit-transform: rotate(40deg);
            -ms-transform: rotate(40deg);
            transform: rotate(40deg);
            -webkit-backface-visibility: hidden;
            -webkit-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            transform-origin: 100% 100%; }
    </style>
</head>
<?php include 'Header.php';?>
<?php include 'Connection.php';?>

<body>
<main>
    <!--Section: Live preview-->


    <section class="form-dark">
        <form class="text-center border-light z-depth-3 animated slideInDown slower " action="assign.php" method="get">


        <!--Form without header-->
        <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table7.jpg'); width: 28rem;">
            <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

                <!--Header-->
                <div class="text-center">
                    <h3 class="white-text mb-5 mt-4 font-weight-bold"><strong>SIGN</strong> <a class="green-text font-weight-bold"><strong> UP</strong></a></h3>
                </div>

                <!--Body-->
                <select name="medication" class="mdb-select md-form colorful-select dropdown-success" searchable="Search here..">
                    <option value="" disabled selected>Choose your Service</option>
                    <option value="councilling">councilling</option>
                    <option value="Sharing">Sharing</option>
                    <option value="Class">Class</option>
                    <option value="inhouse-manage">inhouse-manage</option>
                    <option value="tests">tests</option>
                </select>
                <label>Label example</label>

                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-10 mb-md-0 mb-5">
                <?php
                $sql_doc="select D_name,D_id,image from doctor";

                if($result = mysqli_query($conn, $sql_doc)){
                ?> <select name="doctor" class="mdb-select md-form colorful-select dropdown-secondary" searchable="Search here.."><?php

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option class=\"rounded-circle\" data-icon=\"img/".$row['image']."\" value=\"".$row['D_id']."\">".$row['D_name']."</option>";

                    }
                    echo " </select>
                <label>Doctor</label>
                </div>";
                    }
                    ?>
                        </div>
                    <!--Grid column-->
                    <div class="col-md-10 mb-md-0 mb-5">
                        <label>patient</label>

                    <?php
                    $sql_patient="select p_name,P_id from patient join record on record.R_id=patient.record_id where cleandays!='slipped';";

                    if($resultp = mysqli_query($conn, $sql_patient)){
                    ?> <select name="pid" class="mdb-select md-form colorful-select dropdown-success" searchable="Search here.."><?php

                        while ($row = mysqli_fetch_array($resultp)) {
                            //echo "<option value>".$row['P_id']."</option>";
                            echo "<option value='".$row['P_id']."'>".$row['p_name']."</option>";

                        }
                        echo " </select>
               
               
                </div>";
                        }
                        ?>
                        </div>
                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Assign DOCTOR</button>
                </div>



            </div>



            </div>



        <!--/Form without header-->

        </form>
    </section>
    <div class="row ">


    </div>

</main>
<?php include 'Footer.php';?>
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
    new materailSelect();
    new WOW().init();
    new fadeInLeft().init();
    // Material Select Initialization
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    // Material Select Initialization

</script>
<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>

</body>

</html>
