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
    <style>
        @media (max-width:767px) {
            .fb_iframe_widget {
                width: 100%;
            }
            .fb_iframe_widget span {
                width: 100% !important;
            }
            .fb_iframe_widget iframe {
                width: 100% !important;
            }
            ._8r {
                margin-right: 5px;
                margin-top: -4px !important;
            }
        }
    </style>

</head>
<body>

<header>
    <div class="container-fluid blue animated shadow-sm">
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                    <strong>Rehab Centre</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">Treatment</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">12 Step NA</a>
                                <a class="dropdown-item" href="#">Group Counseling</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">Disorders</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Drug Addiction </a>
                                <a class="dropdown-item" href="#">Substance abuse induced psychosis</a>
                                <a class="dropdown-item" href="#">Schizophrenia</a>
                                <a class="dropdown-item" href="#">Bipolar depression </a>
                                <a class="dropdown-item" href="#">Depression</a>
                                <a class="dropdown-item" href="#">Personality disorder </a>
                                <a class="dropdown-item" href="#">Anxiety disorder </a>
                                <a class="dropdown-item" href="#">Obsessive compulsive disorder </a>
                                <a class="dropdown-item" href="#">ADHD</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#formy">Emergency</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Location">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="utj.html" target="_blank">Experts</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="#FB" class="nav-link">
                                <i href="#FB" class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com" class="nav-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border border-light rounded">
                                <i class="fa fa-phone green" aria-hidden="true"></i>+880 0191-XX
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->
        <br><br>
        <br><br>
    </div>

</header>
<main>
    <? include 'Connection.php';
    ?>
    <div id="row">

    </div>
    <!---modal signup-->
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content form-elegant">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body mx-4">
                        <!--Body-->
                        <!-- Default form register -->
                        <form class="text-center border border-light p-5">

                            <p class="h4 mb-4">Sign up</p>

                            <div id="FORM!"class="form-row mb-4">

                                <!-- E-mail -->
                                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

                                <!-- Password -->
                                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                    At least 8 characters and 1 digit
                                </small>

                                <!-- Newsletter -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                                    <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
                                </div>

                                <!-- Sign up button -->
                                <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

                                <hr>

                                <!-- Terms of service -->
                                <p>By clicking
                                    <em>Sign up</em> you agree to our
                                    <a href="" target="_blank">terms of service</a> and
                                    <a href="" target="_blank">terms of service</a>. </p>

                            </div>
                        </form>
                        <!-- Default form register -->

                        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
                            with:</p>

                        <div class="row my-3 d-flex justify-content-center">
                            <!--Facebook-->
                            <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-facebook text-center"></i></button>
                            <!--Twitter-->
                            <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-twitter"></i></button>
                            <!--Google +-->
                            <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fa fa-google-plus"></i></button>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer mx-5 pt-3 mb-1">
                        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1">
                                Sign Up</a></p>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Modal -->

        <div class="text-center">
            <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#elegantModalForm">Launch
                modal Login Form</a>
        </div>
    </div>
    <!--modal signup-->
    <!--modal signup-->

    </div>

    <div id="row"></div>
</main>
<!-- Footer -->
<footer class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Very long link 1</a>
                    </li>
                    <li>
                        <a href="#!">Very long link 2</a>
                    </li>
                    <li>
                        <a href="#!">Very long link 3</a>
                    </li>
                    <li>
                        <a href="#!">Very long link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

</footer>
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
    new WOW().init();
    new fadeInLeft().init();
</script>

</body>

</html>

