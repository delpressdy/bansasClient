<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
error_reporting(0);


?>

<!doctype html>
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php'; ?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->
    <?php $page = "profile";
    include 'includes/leftMenu.php'; ?>

    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li class="active">Update Information</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <?php
                    if ($_SESSION['adminTypeId'] == 1) {
                        $querys = mysqli_query($con, "select * from tbladmin where staffId='$staffId'");
                        $rrow = mysqli_fetch_array($querys);


                        if (isset($_POST['submit'])) {

                            $alertStyle = "";
                            $statusMsg = "";

                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];

                            $emailAddress = $_POST['emailAddress'];
                            $phoneNo = $_POST['phoneNo'];
                            $password = $_POST['password'];


                            $ret = mysqli_query($con, "update tblstaff set firstName='$firstname', lastName='$lastname',  
  emailAddress='$emailAddress', phoneNo='$phoneNo', password = '$password' where staffId='$staffId'");

                            if ($ret == TRUE) {
                                $_SESSION['departmentId'] =  $department;
                                $alertStyle = "alert alert-success";
                                $statusMsg = "Profile Updated Successfully!";
                                header("Location: updateProfile.php");
                            } else {
                                $alertStyle = "alert alert-danger";
                                $statusMsg = "An error Occurred!";
                                header("Location: updateProfile.php");
                            }
                        }
                    } else {
                        $querys = mysqli_query($con, "select * from tblstaff where staffId='$staffId'");
                        $rrow = mysqli_fetch_array($querys);


                        if (isset($_POST['submit'])) {

                            $alertStyle = "";
                            $statusMsg = "";

                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];

                            $emailAddress = $_POST['emailAddress'];
                            $phoneNo = $_POST['phoneNo'];
                            $password = $_POST['password'];
                            $department = $_POST['department'];

                            $ret = mysqli_query($con, "update tblstaff set firstName='$firstname', departmentId='$department',  lastName='$lastname',  
  emailAddress='$emailAddress', phoneNo='$phoneNo', password = '$password' where staffId='$staffId'");

                            if ($ret == TRUE) {
                                $_SESSION['departmentId'] =  $department;
                                $alertStyle = "alert alert-success";
                                $statusMsg = "Profile Updated Successfully!";
                                header("Location: updateProfile.php");
                            } else {
                                $alertStyle = "alert alert-danger";
                                $statusMsg = "An error Occurred!";
                                header("Location: updateProfile.php");
                            }
                        }
                    }

                    ?>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Profile Information</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="<?php echo $alertStyle; ?> alert-dismissible fade show" role="alert">
                                            <?php echo $statusMsg; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Firstname</label>
                                                        <input id="" name="firstname" type="text" class="form-control cc-exp" value="<?php echo $rrow['firstName']; ?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Firstname">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Lastname</label>
                                                    <input id="" name="lastname" type="text" class="form-control cc-cvc" value="<?php echo $rrow['lastName']; ?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Lastname">
                                                </div>
                                            </div>
                                            <div>

                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                                            <input id="" name="emailAddress" type="email" class="form-control cc-cvc" value="<?php echo $rrow['emailAddress']; ?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Phone Number</label>
                                                            <input id="" name="phoneNo" type="text" class="form-control cc-exp" value="<?php echo $rrow['phoneNo']; ?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password" class="control-label mb-1">Password</label>
                                                            <input id="password" name="password" type="password" class="form-control cc-cvc" value="<?php echo $rrow['password']; ?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                        </div>
                                                    </div>


                                                </div>
                                                <?php
                                                if ($_SESSION['adminTypeId'] == 1) { ?>

                                                <?php    } else { ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="password" class="control-label mb-1">Department ID</label>
                                                                <input id="text" name="department" type="text" class="form-control cc-cvc" value="<?php echo $rrow['departmentId']; ?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                            </div>
                                                        </div>


                                                    </div>
                                                <?php    }

                                                ?>


                                                <button type="submit" name="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include 'includes/footer.php'; ?>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });

        // Menu Trigger
        $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();
            if (windowWidth < 1010) {
                $('body').removeClass('open');
                if (windowWidth < 760) {
                    $('#left-panel').slideToggle();
                } else {
                    $('#left-panel').toggleClass('open-menu');
                }
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');
            }

        });
    </script>

</body>

</html>