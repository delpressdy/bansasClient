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
    <script>
        function showValues(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxCall2.php?fid=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <!-- Left Panel -->
    <?php $page = "result";
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
                                    <li><a href="#">Result</a></li>
                                    <li class="active">Pupil's List</li>
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
                                <strong class="card-title">
                                    <h3 align="center">Select Pupil to View Result</h3>
                                </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="<?php echo $alertStyle; ?>" role="alert"><?php echo $statusMsg; ?></div>



                                        <br><br>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong class="card-title">
                                                        <h3 align="center">All Pupils</h3>
                                                    </strong>
                                                </div>
                                                <div class="card-body">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>ID #</th>
                                                                <th>Grade lvl</th>
                                                                <th>Section</th>

                                                                <th>1st Grading</th>
                                                                <th>2nd Grading</th>
                                                                <th>3rd Grading</th>
                                                                <th>4th Grading</th>
                                                                <th>Final Result</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php


                                                            $ret = mysqli_query($con, "SELECT tblstudent.`Id`, tblstudent.`firstName`, tblstudent.`dateCreated`, tbllevel.`levelId`,  tblstudent.`lastName`, tblstudent.`matricNo`, tbldepartment.`departmentName`, tbllevel.`levelName`,tblfaculty.`facultyId`,  tblfaculty.`facultyName`, tblstudent.`sessionId`  FROM tblstudent INNER JOIN tbllevel ON tblstudent.`levelId` = tbllevel.`levelId` INNER JOIN tblfaculty ON tblfaculty.`facultyId` = tblstudent.`facultyId` INNER JOIN tbldepartment ON tbldepartment.`departmentId` = tblstudent.`departmentId` INNER JOIN tblsession ON tblstudent.`sessionId` = tblsession.`sessionId`");
                                                            $cnt = 1;
                                                            while ($row = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></td>
                                                                    <td><?php echo $row['matricNo']; ?></td>
                                                                    <td><?php echo $row['levelName']; ?></td>
                                                                    <td><?php echo $row['departmentName']; ?></td>

                                                                    <td><a href="viewSemesterResult.php?semesterId=1&matricNo=<?php echo $row['matricNo']; ?>&levelId=<?php echo $row['levelId']; ?>&sessionId=<?php echo $row['sessionId']; ?>" title="View Details"><i class="fa fa-eye fa-1x"></i> View</a></td>

                                                                    <td><a href="viewSemesterResult.php?semesterId=2&matricNo=<?php echo $row['matricNo']; ?>&levelId=<?php echo $row['levelId']; ?>&sessionId=<?php echo $row['sessionId']; ?>" title="View Details"><i class="fa fa-eye fa-1x"></i> View</a></td>

                                                                    <td><a href="viewSemesterResult.php?semesterId=3&matricNo=<?php echo $row['matricNo']; ?>&levelId=<?php echo $row['levelId']; ?>&sessionId=<?php echo $row['sessionId']; ?>" title="View Details"><i class="fa fa-eye fa-1x"></i> View</a></td>

                                                                    <td><a href="viewSemesterResult.php?semesterId=4&matricNo=<?php echo $row['matricNo']; ?>&levelId=<?php echo $row['levelId']; ?>&sessionId=<?php echo $row['sessionId']; ?>" title="View Details"><i class="fa fa-eye fa-1x"></i> View</a></td>

                                                                    <td><a href="viewFinalResult.php?matricNo=<?php echo $row['matricNo']; ?>" title="View Details"><i class="fa fa-eye fa-1x"></i> View</a></td>

                                                                </tr>
                                                            <?php
                                                                $cnt = $cnt + 1;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of datatable -->

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