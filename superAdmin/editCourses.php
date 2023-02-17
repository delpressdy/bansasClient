<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
error_reporting(0);


if (isset($_GET['subjectId'])) {

    $_SESSION['subjectId'] = $_GET['subjectId'];

    $query = mysqli_query($con, "select * from tblcourse where subjectId='$_SESSION[subjectId]'");
    $rowi = mysqli_fetch_array($query);
} else {

    echo "<script type = \"text/javascript\">
    window.location = (\"createCourses.php\")
    </script>";
}


if (isset($_POST['submit'])) {

    $alertStyle = "";
    $statusMsg = "";

    $courseTitle = $_POST['courseTitle'];

    $departmentId = $_POST['department'];

    $dateAdded = date("Y-m-d");


    $query = mysqli_query($con, "update tblcourse set subjectTitle='$courseTitle',dateAdded = '$dateAdded' ,departmentId='$departmentId'
    where subjectId='$_SESSION[subjectId]'");

    if ($query) {

        $alertStyle = "alert alert-success";
        $statusMsg = "Subject updated Successfully!";
    } else {
        $alertStyle = "alert alert-danger";
        $statusMsg = "An error Occurred!";
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


    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }



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

        function showLecturer(str) {
            if (str == "") {
                document.getElementById("txtHintt").innerHTML = "";
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
                        document.getElementById("txtHintt").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxCallLecturer.php?deptId=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <script>
        function showValues2(str) {
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
                xmlhttp.open("GET", "ajaxCall.php?fid=" + str, true);
                xmlhttp.send();
            }
        }

        function showRole(str) {
            if (str == "") {
                document.getElementById("txtHintt").innerHTML = "";
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
                        document.getElementById("txtHintt").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxCallRole.php?id=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <!-- Left Panel -->
    <?php $page = "courses";
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
                                    <h2 align="center">Edit Subject</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="<?php echo $alertStyle; ?>" role="alert"><?php echo $statusMsg; ?></div>
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- Log on to codeastro.com for more projects! -->
                                                        <label for="cc-exp" class="control-label mb-1">Subject Name</label>
                                                        <input id="" name="courseTitle" type="text" class="form-control cc-exp" value="<?= $rowi['subjectTitle'] ?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Course Title">
                                                    </div>
                                                </div>


                                            </div>
                                            <div>
                                                <div class="row">

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="x_card_code" class="control-label mb-1">Section</label>
                                                            <?php
                                                            $query = mysqli_query($con, "select * from tbldepartment");
                                                            $count = mysqli_num_rows($query);
                                                            if ($count > 0) {
                                                                echo ' <select required name="department"  onchange="showValues2(this.value)" class="custom-select form-control">';
                                                                echo '<option value="">--Select Level--</option>';
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo '<option value="' . $row['departmentId'] . '" >' . $row['departmentName'] . '</option>';
                                                                }
                                                                echo '</select>';
                                                            }
                                                            ?>
                                                        </div>


                                                    </div>





                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <?php
                                                            echo "<div id='txtHint'></div>";
                                                            ?>

                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" name="submit" class="btn btn-success">Update Subject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- Log on to codeastro.com for more projects! -->
                            </div>
                        </div>
                        <!--/.col-->


                        <br><br>

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