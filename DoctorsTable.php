<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="template/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="template/css/animate.css">

    <link rel="stylesheet" href="template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="template/css/magnific-popup.css">

    <link rel="stylesheet" href="template/css/aos.css">

    <link rel="stylesheet" href="template/css/ionicons.min.css">

    <link rel="stylesheet" href="template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="template/css/jquery.timepicker.css">


    <link rel="stylesheet" href="template/css/flaticon.css">
    <link rel="stylesheet" href="template/css/icomoon.css">
    <link rel="stylesheet" href="template/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<section class="home-slider owl-carousel">
    <div class="slider-item bread-item" style="background-image: url('http://www.rehabthatworx.co.za/images/cassidy-nery-Rehab-Slogans.008.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
            <div class="row slider-text align-items-end">
                <div class="col-md-7 col-sm-12 ftco-animate mb-5">
                    <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="New.php">Home</a></span> <span>Services</span></p>
                    <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Well Experienced Doctors</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'Connection.php'?>
<!--code for printing pending request-->
<?php
$query_recovery = mysqli_query( $conn,"select count(*) as Number from
                                (select count(*) from Patient group BY P_name) as T1;");
$result = mysqli_fetch_assoc($query_recovery);
$customer=$result['Number'];
$query_docz = mysqli_query( $conn,"SELECT count(*) as NO from Doctor;");
$result2 = mysqli_fetch_assoc($query_docz);
$docs=$result2['NO'];
?>

<?php

$sql_table = "select * from doctor;";
$result = $conn->query($sql_table);
$allRows = $result->num_rows;
$shift = 0;
if ($result->num_rows > 0) {
$i = 1;
$link = "";
echo "<div class='row'>";
while ($row = mysqli_fetch_array($result)) {
if ($i == ($shift + 1)) {
    echo "<div class='row'>";
}
?><div class="col-md-3 justify-content-center ftco-animate d-lg-flex">
        <div class="staff"><?php
            echo "<div class=\"img mb-4\" style=\"background-image: url(img/" . $row['image'] . ");\"></div>"
            ?>
            <div class="info text-center"><?php
                echo "<h3><a href=\"template/teacher-single.html\">" . $row['D_name'] . "</a></h3>";
                echo "<span class=\"position\">" . $row['Speciality'] . "</span>";
                echo "<td class='font-weight-bold'> <a href='Doctor_list.php?id=" . $row['D_id'] . "'><span style='color: slateblue ;'>Approve</span></a></td>";
                ?>
                <span class="position"></span>
                <div class="text"><?php
                    echo "<p>" . $row['details'] . "</p>";
                    ?>
                    <ul class="ftco-social">
                        <li class="ftco-animate"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="ftco-animate"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                        <li class="ftco-animate"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></li>
                        <li class="ftco-animate"><i class="fa fa-skype" aria-hidden="true"></i></li>
                        <li class="ftco-animate"><a role="button" href="doc-patient.php" class="btn-outline-secondary ftco-footer-logo btn-danger"><i class="fa fa fa-plus"></i></a></i></li
                    </ul>
                </div>
            </div>
        </div>
    </div><?php
    if ($i % 4 == 0 || $i == $allRows) {
        $shift = $i;
        echo "</div>";
    }
    $i++;
    }
    }
    $conn->close();
    ?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Meet Our Experience Dentist</h2>
                <p>We have NARCOB, BARACA certified Docotrs</p>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</section>


<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 aside-stretch py-5">
                <div class=" heading-section heading-section-white ftco-animate pr-md-4 color-3">
                    <h2 class="mb-3">Achievements</h2>
                    <p>We have many proud recovery brothers and groups who works as volunteer to support us.</p>
                </div>
            </div>
            <div class="row black"></div>
            <div class="col-md-9 py-5 pl-md-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-secondary">
                                <strong class="number text-black-50" data-number="14" >0</strong>
                                <span style="color:black;font-family:'Comic Sans MS'""><b>Years of Experience</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text ">
                                <?php echo "<strong class=\"number text-black-50\" data-number=".$docs.">0</strong>"?>
                                <!--<strong class="number text-black-50" data-number="12">0</strong>-->
                                <span style="color:black;font-family:'Comic Sans MS'"><b>Qualified Doctor</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-black-50">
                                <?php echo "<strong class=\"number text-black-50\" data-number=".$customer.">0</strong>"?>
                                <!--<strong class="number text-black-50" data-number="100">0</strong>-->
                                <span style="color:black;font-family:'Comic Sans MS'"><b>Happy Smiling Customer</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-black-50">
                               <strong class="number text-black-50" data-number="320">0</strong>
                                <span style="color:black;font-family: 'Comic Sans MS'"><b>Patients Per Year</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Our Best Pricing</h2>
                <p>We have low cost arrangement only for poor patients and handicapped patients only.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Basic</h3>
                        <p><span class="price"><sup>৳</sup>90,000</span> <span class="per">/ prgram</span></p>
                    </div>
                    <ul>
                        <li>
                            <p class="mt-2"><i class="fa fa-check green-text pr-2"></i>Case Manager Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>Balance 30% Payment advance</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>24h Councilling Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Continuous Doctor's Check</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>2 month land followup </p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Air Conditioner</p>
                        </li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Apply now</a></p>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Standard</h3>
                        <p><span class="price"><sup>৳</sup>1,10,000</span> <span class="per">/ program,follow Uo</span></p>
                    </div>
                    <ul>
                        <li>
                            <p class="mt-2"><i class="fa fa-check green-text pr-2"></i>Case Manager Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>Balance 30% Payment advance</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>24h Councilling Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Continuous Doctor's Check</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>2 month land followup </p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Air Conditioner</p>
                        </li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Apply now</a></p>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="pricing-entry active pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Premium</h3>
                        <p><span class="price"><sup>৳</sup>1,28,000</span> <span class="per">/ program,inhouse FollowUp</span></p>
                    </div>
                    <ul>
                        <li>
                            <p class="mt-2"><i class="fa fa-check green-text pr-2"></i>Case Manager Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>Balance 30% Payment advance</p>
                        </li>
                        <li>
                            <p><i class="fa fa-check green-text pr-2"></i>24h Councilling Support</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Continuous Doctor's Check</p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>2 month land followup </p>
                        </li>
                        <li>
                            <p><i class="fa fa-times red-text pr-2"></i>Air Conditioner</p>
                        </li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Apply now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="template/js/jquery.min.js"></script>
<script src="template/js/jquery-migrate-3.0.1.min.js"></script>
<script src="template/js/popper.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.easing.1.3.js"></script>
<script src="template/js/jquery.waypoints.min.js"></script>
<script src="template/js/jquery.stellar.min.js"></script>
<script src="template/js/owl.carousel.min.js"></script>
<script src="template/js/jquery.magnific-popup.min.js"></script>
<script src="template/js/aos.js"></script>
<script src="template/js/jquery.animateNumber.min.js"></script>
<script src="template/js/bootstrap-datepicker.js"></script>
<script src="template/js/jquery.timepicker.min.js"></script>
<script src="template/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="template/js/google-map.js"></script>
<script src="template/js/main.js"></script>

</body>
</html>