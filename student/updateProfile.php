<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
error_reporting(0);

if (!isset($matricNo)) {
    header("Location: index.php");
}

$querys = mysqli_query($con, "select * from tblstudent where matricNo='$matricNo'");
$rows = mysqli_fetch_array($querys);


if (isset($_POST['submit'])) {

    $alertStyle = "";
    $statusMsg = "";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $othername = $_POST['othername'];
    $password = $_POST['password'];
    $pupilID = $_POST['pupilID'];



    // $ret = mysqli_query($con, "UPDATE tblstudent SET firstName = ' $firstname ', password= '$password ', matricNo= '$pupilID' ,otherName = '$othername', lastName='$lastname',  WHERE matricNo= '$pupilID'");

    // if ($ret == TRUE) {

    //     $alertStyle = "alert alert-success";
    //     $statusMsg = "Profile Updated Successfully!";
    // } else {
    //     $alertStyle = "alert alert-danger";
    //     $statusMsg = "An error Occurred!";
    // }


    $sql = "UPDATE tblstudent SET firstName = '$firstname', lastName = '$lastname', otherName = '$othername', PASSWORD = '$password' , matricNo = '$pupilID' WHERE matricNo = '$matricNo'";

    if ($con->query($sql) === TRUE) {
        $statusMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
Profile Updated Successfully!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
        $_SESSION['matricNo'] = $pupilID;
    } else {

        $statusMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        An error Occurred!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Profile Information</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">


                                        <div class="col-md-4">
                                            <?php

                                            echo $statusMsg;



                                            ?>
                                            <form method="POST" action="updateProfile.php" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="pupilID" class="control-label">Pupil ID</label>
                                                    <input type="text" id="pupilID" name="pupilID" class="form-control" value="<?= $rows['matricNo'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label">First Name</label>
                                                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $rows['firstName'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label">Last Name</label>
                                                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $rows['lastName'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label">Other Name</label>
                                                    <input type="othername" id="othername" name="othername" class="form-control" value="<?= $rows['otherName'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" value="<?= $rows['password'] ?>">
                                                </div>
                                                <div class="form-group">

                                                    <input type="submit" name="submit" class="btn btn-success" value="submit">
                                                </div>
                                            </form>


                                        </div>
                                        <!-- <form method="Post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Firstname</label>
                                                        <input id="" name="firstname" type="text" class="form-control cc-exp" value="<?= $rrow['firstName']; ?>" Required placeholder="Firstname">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Lastname</label>
                                                    <input id="" name="lastname" type="text" class="form-control cc-cvc" value="<?= $rrow['lastName']; ?>" Required placeholder="Lastname">
                                                </div>
                                            </div>
                                            <div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Othername</label>
                                                            <input id="" name="othername" type="text" class="form-control cc-exp" value="<?= $rrow['otherName']; ?>" placeholder="Othername">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Pupil ID</label>
                                                            <input id="" name="pupilID" type="text" class="form-control cc-exp" value="<?= $rrow['matricNo']; ?>" Required placeholder="Phone Number">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Othername</label>
                                                            <input id="" name="othername" type="password" class="form-control cc-exp" value="<?= $rrow['password']; ?>" placeholder="Othername">
                                                        </div>
                                                    </div>



                                                </div>

                                                <button type="submit" name="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </form> -->
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