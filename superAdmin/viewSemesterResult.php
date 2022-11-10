<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
include('../includes/functions.php');

if (isset($_GET['matricNo']) && isset($_GET['levelId'])  && isset($_GET['sessionId']) && isset($_GET['semesterId'])) {

    $matricNo = $_GET['matricNo'];
    $levelId = $_GET['levelId'];
    $sessionId = $_GET['sessionId'];
    $semesterId = $_GET['semesterId'];


    $stdQuery = mysqli_query($con, "select * from tblstudent where matricNo = '$matricNo'");
    $rowStd = mysqli_fetch_array($stdQuery);

    $semesterQuery = mysqli_query($con, "select * from tblsemester where Id = '$semesterId'");
    $rowSemester = mysqli_fetch_array($semesterQuery);

    $sessionQuery = mysqli_query($con, "select * from tblsession where Id = '$sessionId'");
    $rowSession = mysqli_fetch_array($sessionQuery);

    $levelQuery = mysqli_query($con, "select * from tbllevel where Id = '$levelId'");
    $rowLevel = mysqli_fetch_array($levelQuery);
} else {
    echo "<script type = \"text/javascript\">
        window.location = (\"studentList.php\");
        </script>";
}



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])) {
} //end of POST


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

    <?php include 'includes/leftMenu.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- Header-->


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h4 align="center"><?php echo  $rowStd['firstName'] . ' ' . $rowStd['lastName'] ?>&nbsp;<?php echo '<strong style="color:red;">[' . $rowSemester['semesterName'] . ']</strong>'; ?> Result</h>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="<?php if (isset($alertStyle)) {
                                                echo $alertStyle;
                                            } ?>" role="alert"><?php if (isset($statusMsg)) {
                                                                    echo $statusMsg;
                                                                } ?></div>

                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subjects</th>
                                            <th>Grades</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tblcourse WHERE semesterId=$semesterId";
                                        $result = $con->query($sql);


                                        $sql2 = "SELECT * FROM tblresult WHERE semesterId=$semesterId";
                                        $result2 = $con->query($sql2);


                                        $num = 1;
                                        if ($result->num_rows > 0 && $result2->num_rows > 0) {
                                            // E show and data each row

                                            // 1st conditions para sa subject 2nd is score
                                            while (($row = $result->fetch_assoc()) && ($row2 = $result2->fetch_assoc())) {

                                                echo '<tr><td>' . $num++;
                                                echo '<td>' . $row['courseTitle'] . '</td></td>';
                                                echo '<td>' . $row2['score'] . '</td></td>';
                                                echo '<td>' . $row2['scoreLetterGrade'] . '</td></td>';
                                            }
                                        } else {
                                            echo "No results";
                                        }



                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <th colspan="4" class="text-sm-center">Generated on: <?php echo date('d M, Y') ?></th>
                                    </tfoot>
                                </table>
                                </table>

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Average</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql3 = "SELECT SUM(score) ,count(score) FROM tblresult WHERE semesterId=$semesterId";
                                        $result3 = $con->query($sql3);

                                        while ($row3 = $result3->fetch_assoc()) {
                                            if (!$row3['SUM(score)'] == "") {
                                                $sum = $row3['SUM(score)'] /  $row3['count(score)'];
                                            }
                                            $sum = 0;
                                            echo '<td>' . $sum . '</td>';
                                        }

                                        if ($sum > 74) {
                                            echo '<td style="background:#70e000; color:white; font-family:cursive;">' . 'Passed' . '</td.>';
                                        } else {
                                            echo '<td style="background:white; color:red; font-family:cursive;">' . 'Failed' . '</td.>';
                                        }
                                        ?>

                                    </tbody>

                                </table>

                                <a href="studentList3.php" class="btn btn-primary">Go Back</a>
                                <a href="printSemesterResult.php?semesterId=<?php echo $semesterId; ?>&matricNo=<?php echo $matricNo; ?>&levelId=<?php echo $levelId; ?>&sessionId=<?php echo $sessionId; ?>" class="btn btn-info"><i class="fa fa-print"></i> Print Result</a>
                            </div>
                        </div>
                    </div>

                    <!-- end of datatable -->

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php $con->close();
        include 'includes/footer.php'; ?>


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