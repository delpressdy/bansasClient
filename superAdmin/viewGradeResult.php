<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
include('../includes/functions.php');

if (isset($_GET['matricNo']) && isset($_GET['departmentId']) && isset($_GET['semesterId'])) {

    $matricNo = $_GET['matricNo'];

    $departmentId = $_GET['departmentId'];


    $semesterId = $_GET['semesterId'];


    $stdQuery = mysqli_query($con, "select * from tblstudent where matricNo = '$matricNo'");
    $rowStd = mysqli_fetch_array($stdQuery);

    $semesterQuery = mysqli_query($con, "select * from tblsemester where grading_Id = '$semesterId'");
    $rowSemester = mysqli_fetch_array($semesterQuery);



    $levelQuery = mysqli_query($con, "SELECT * FROM tbldepartment INNER JOIN tbllevel ON tbllevel.levelId = tbldepartment.levelId WHERE tbldepartment.departmentId = '$departmentId'");
    $rowLevel = mysqli_fetch_array($levelQuery);
} else {
    echo "<script type = \"text/javascript\">
        window.location = (\"studentList.php\");
        </script>";
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

</head>

<body>
    <!-- Left Panel -->

    <?php include 'includes/leftMenu.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- Header-->

        <script>
            //Only allows Numbers
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

            //Check if the value entered is greater than 100 and not less than 0
            function myFunction() {
                var x, text;
                // Get the value of the input field with id="numb"
                x = document.getElementById("score").value;
                // If x is Not a Number or less than one or greater than 10
                if (isNaN(x) || x < 1 || x > 100) {
                    // text = "Value cannot be greater than 100 or less than 0";
                    alert("Invalid");
                } else {
                    text = "";
                }
                document.getElementById("demo").innerHTML = text;
            }
        </script>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h3 align="center">GRADING CRITERIA</h3>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Results</th>
                                            <th>Average</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td bgcolor="#32ff7e">Excellent</td>
                                            <td bgcolor="#32ff7e">90% +</td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#7bed9f">Very nice</td>
                                            <td bgcolor="#7bed9f">85% +</td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#97fdae">Nice</td>
                                            <td bgcolor="#97fdae">80% +</td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#fffa65">Good</td>
                                            <td bgcolor="#fffa65">75% +</td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#ff4757">Fail</td>
                                            <td bgcolor="#ff4757">Below 74</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Grade</th>
                                            <th>Letter Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>75 - 100</td>
                                            <td>A+</td>
                                        </tr>
                                        <tr>
                                            <td>70 - 74</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>65 - 69</td>
                                            <td>B</td>
                                        </tr>
                                        <tr>
                                            <td>60 - 64</td>
                                            <td>Fail</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <!--/.col-->
                    <?php

                    ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">All Pupils</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Subject</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Grades</th>
                                            <th>Grade Level</th>
                                            <th>Date Added</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if ($_SESSION['adminTypeId'] == 1) {
                                            $ret = mysqli_query($con, "SELECT * FROM tblstudent INNER JOIN tbldepartment ON  tbldepartment.`departmentId` = tblstudent.`departmentId` INNER JOIN tbllevel ON tbllevel.`levelId` = tbldepartment.`levelId`
                                            ");
                                        } else {
                                            $ret = mysqli_query($con, "SELECT tblresult.`resultId`, tblresult.`grade` ,tblcourse.`subjectTitle`, tblstudent.`firstName`,tblstudent.`lastName`,tblstudent.`schoolyear`, tblsemester.`grading`, tbllevel.`levelName` FROM tblresult INNER JOIN tblcourse ON tblcourse.`subjectId` = tblresult.`subjectId`
                                            INNER JOIN tblstudent ON tblstudent.`StudentId` = tblresult.`StudentId` INNER JOIN tblsemester ON tblsemester.`grading_Id`= tblresult.`gradingId` INNER JOIN tbldepartment ON tbldepartment.`departmentId` = tblresult.`departmentId` INNER JOIN tbllevel ON  tbllevel.`levelId` = tbldepartment.`levelId` WHERE tblstudent.`matricNo` = '$_GET[matricNo]' and tblsemester.`grading_Id` = '$_GET[semesterId]'");
                                        }

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>

                                                <td><?= $row['resultId'] ?></td>
                                                <td><?= $row['subjectTitle']; ?></td>
                                                <td><?= $row['firstName']; ?></td>
                                                <td><?= $row['lastName']; ?></td>
                                                <td><?= $row['grade']; ?></td>
                                                <td>

                                                    <?php
                                                    $lvl = $row['levelName'];

                                                    if ($lvl == "Grade 1") {
                                                        echo '<i style="background:#99d98c; border-radius:15px; color: black; padding: 2px 5px 2px 5px; font-family:cursive; font-size: 16px;" class="text-white  ">' . $lvl . '</i>';
                                                    } else if ($lvl == "Grade 2") {
                                                        echo '<i style="background:#76c893; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                    } else if ($lvl == "Grade 3") {
                                                        echo '<i style="background:#52b69a; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                    } else if ($lvl == "Grade 4") {
                                                        echo '<i style="background:#34a0a4; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                    } else if ($lvl == "Grade 5") {
                                                        echo '<i style="background:#168aad; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                    } else {
                                                        echo '<i style="background:#1a759f; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                    }
                                                    ?>

                                                </td>

                                                <td><?= $row['schoolyear']; ?></td>


                                                <td>
                                                    <!-- <a href="editStudent.php?editStudentId=<?php echo $row['matricNo']; ?>" title="Edit Details">
                                                        <i class="fa fa-edit fa-1x"></i>
                                                    </a> -->

                                                    <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo']; ?>" title="Delete Student Details">
                                                        <i class="fa fa-trash fa-1x"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php

                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end of datatable -->

            </div>
            <?php include 'includes/footer.php'; ?>
        </div><!-- .animated -->

    </div><!-- .content -->

    <div class="clearfix"></div>




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