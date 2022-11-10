<?php

include('../includes/dbconnection.php');
include('../includes/session.php');
error_reporting(0);

?>

<?php

$query = mysqli_query($con, "SELECT * FROM tblstudent WHERE matricNo='$matricNo'");
$row = mysqli_fetch_array($query);
$user = $row['matricNo'];
$levelId = $row['levelId'];

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
                                    <li><a href="#">Grades</a></li>
                                    <li class="active">My Grades</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLE FOR GRADE 1 -->
            <div class="card w-100 my-4">
                <h3 
                <?php
                     $sql = "SELECT * FROM tblresult WHERE matricNo=$matricNo";
                     $result = $con->query($sql);

                                     if ($result->num_rows > 0){
                                            echo 'hidden';
                                        }else{
                                            echo '';
                                        }
                                     
                ?>
                 align="center" style="color:red; padding:19px;">Sorry, there are no records to be shown.</h3>
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE matricNo=$matricNo");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 1){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=$levelId AND semesterId=1");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 1){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 1 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=1 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=1 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=1 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=1 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=1 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=1 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=1 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=1 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=1 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=1 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=1 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=1 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=1 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 1 -->

            <!-- TABLE FOR GRADE 2 -->
            <div class="card w-100 my-4">
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=2");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 2){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=2");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 2){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 2 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=2 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=2 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=2 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=2 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=2 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=2 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=2 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=2 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=2 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=2 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=2 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=2 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=2 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 2 -->

            <!-- TABLE FOR GRADE 3 -->
            <div class="card w-100 my-4">
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=3");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 3){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=3");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 3){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 3 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=4 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=3 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=3 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=3 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=3 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=3 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=3 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=3 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=3 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=3 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=3 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=3 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=3 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 3 -->


            <!-- TABLE FOR GRADE 4 -->
            <div class="card w-100 my-4">
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=4");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 4){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=4");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 4){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 4 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=4 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=4 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=4 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=4 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=4 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=4 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=4 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=4 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=4 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=4 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=4 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=4 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=4 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 4 -->

            <!-- TABLE FOR GRADE 5 -->
            <div class="card w-100 my-4">
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=5");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 5){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=5");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 5){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 5 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=5 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=5 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=5 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=5 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=5 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=5 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=5 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=5 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=5 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=5 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=5 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=5 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=5 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 5 -->

            <!-- TABLE FOR GRADE 6 -->
            <div class="card w-100 my-4">
                <table 
                    <?php 

                        $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=6");
                        $row = mysqli_fetch_array($query);
                        $check = $row['levelId'];

                            if ($check != 6){
                                echo 'hidden';
                            }
                    ?> 
                class="table">

                    <thead>
                            <h3 
                                <?php 

                                    $query = mysqli_query($con, "SELECT * FROM tblresult WHERE levelId=6");
                                    $row = mysqli_fetch_array($query);
                                    $check = $row['levelId'];

                                        if ($check != 6){
                                            echo 'hidden';
                                        }
                                ?>  
                            class="text-sm-center" style="color:#00a6fb; font-weight:650; padding:12px 14px;">Grade 6 Records</h3>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">1st Grading</th>
                            <th scope="col">2nd Grading</th>
                            <th scope="col">3rd Grading</th>
                            <th scope="col">4th Grading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    $sql = "SELECT * FROM tblcourse WHERE levelId=6 AND semesterId=1";
                                    $result = $con->query($sql);

                                     if ($result->num_rows >0){
                                        while($row=$result->fetch_assoc()){
                                            echo $row['courseTitle'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=6 AND semesterId=1 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=6 AND semesterId=2 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql2 = "SELECT * FROM tblresult WHERE levelId=6 AND semesterId=3 AND matricNo=$matricNo";
                                    $result2 = $con->query($sql2);

                                     if ($result2->num_rows >0){
                                        while($row2=$result2->fetch_assoc()){
                                            echo $row2['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>

                            <td>
                                <?php
                                    $sql4 = "SELECT * FROM tblresult WHERE levelId=6 AND semesterId=4 AND matricNo=$matricNo";
                                    $result4 = $con->query($sql4);

                                     if ($result4->num_rows >0){
                                        while($row4=$result4->fetch_assoc()){
                                            echo $row4['score'];
                                            echo '<br>';
                                            echo '<hr>';
                                        }
                                     }

                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #ade8f4;">
                            <th class="text-sm-center">AVERAGE:</th> 

                            <?php

                                // query for 1st to 4th
                                $sql = "SELECT sum(score) FROM tblresult WHERE levelId=6 AND semesterId=1 AND matricNo=$matricNo";
                                $result = $con->query($sql);

                                $sql2 = "SELECT sum(score) FROM tblresult WHERE levelId=6 AND semesterId=2 AND matricNo=$matricNo";
                                $result2 = $con->query($sql2);

                                $sql3 = "SELECT sum(score) FROM tblresult WHERE levelId=6 AND semesterId=3 AND matricNo=$matricNo";
                                $result3 = $con->query($sql3);

                                $sql4 = "SELECT sum(score) FROM tblresult WHERE levelId=6 AND semesterId=4 AND matricNo=$matricNo";
                                $result4 = $con->query($sql4);

                                // query for counting rows from 1st to 4th
                                $forRows = "SELECT score FROM tblresult WHERE levelId=6 AND semesterId=1 AND matricNo=$matricNo";
                                $resforRows = $con->query($forRows);

                                $forRows2 = "SELECT score FROM tblresult WHERE levelId=6 AND semesterId=2 AND matricNo=$matricNo";
                                $resforRows2 = $con->query($forRows2);

                                $forRows3 = "SELECT score FROM tblresult WHERE levelId=6 AND semesterId=3 AND matricNo=$matricNo";
                                $resforRows3 = $con->query($forRows3);

                                $forRows4 = "SELECT score FROM tblresult WHERE levelId=6 AND semesterId=4 AND matricNo=$matricNo";
                                $resforRows4 = $con->query($forRows4);

                                // Rows variable for each Grading
                                $cntrows1 = mysqli_num_rows($resforRows);
                                $cntrows2 = mysqli_num_rows($resforRows2);
                                $cntrows3 = mysqli_num_rows($resforRows3);
                                $cntrows4 = mysqli_num_rows($resforRows4);

                                while($row = $result->fetch_assoc()){
                                $avg = $row['sum(score)'] / $cntrows1;

                                    if($avg >= 75){
                                        echo '<th>'.round($avg,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg,2).' ✖️</th>';
                                    }
                                }

                                while($row2 = $result2->fetch_assoc()){
                                $avg2 = $row2['sum(score)'] / $cntrows2;
                                    
                                    if($avg2 >= 75){
                                        echo '<th>'.round($avg2,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg2,2).' ✖️</th>';
                                    }
                                }

                                while($row3 = $result3->fetch_assoc()){
                                $avg3 = $row3['sum(score)'] / $cntrows3;

                                    if($avg3 >= 75){
                                        echo '<th>'.round($avg3,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg3,2).' ✖️</th>';
                                    }
                                }

                                while($row4 = $result4->fetch_assoc()){
                                $avg4 = $row4['sum(score)'] / $cntrows4;
                                    
                                    if($avg4 >= 75){
                                        echo '<th>'.round($avg4,2).' ✔️</th>';
                                    }else{
                                        echo '<th>'.round($avg4,2).' ✖️</th>';
                                    }
                                }
                            ?>                   
                        </tr>
                    </tfoot>
                </table>
            </div><!-- END TABLE FOR GRADE 6 -->


</div>







        <div class="clearfix">

        </div>

        <?php $con->close(); include 'includes/footer.php'; ?>


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




</body>

</html>