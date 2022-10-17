<?php
ob_start();

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');



    if(isset($_GET['matricNo']) && isset($_GET['levelId'])  && isset($_GET['sessionId']) && isset($_GET['semesterId'])){

        $matricNo = $_GET['matricNo'];
        $levelId = $_GET['levelId'];
        $sessionId = $_GET['sessionId'];
        $semesterId = $_GET['semesterId'];


        $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");
        $rowStd = mysqli_fetch_array($stdQuery);
        $departmentId = $rowStd['departmentId'];

        $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");
        $rowSemester = mysqli_fetch_array($semesterQuery);

        $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");
        $rowSession = mysqli_fetch_array($sessionQuery);

        $levelQuery=mysqli_query($con,"select * from tbllevel where Id = '$levelId'");
        $rowLevel = mysqli_fetch_array($levelQuery);

        $deptQuery=mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'");
        $rowDept = mysqli_fetch_array($deptQuery);
    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList3.php\");
        </script>";
    }



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])){


}//end of POST


?>



<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
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
    <div align="center"> 
    <h3><b>ONLINE STUDENT GRADING SYSTEM</b></h3>
     <h4><b> <?php echo $rowDept['departmentName'];?></b></h4>
     <b class="text-success">S.Y <?php echo $rowSession['sessionName'];?></b>
    </div>
   <div class="breadcrumbs" >
            <div class="breadcrumbs-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <br><br>
                                <h4>Student: 
                                    <b><?php echo  $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['otherName'];?></b>
                                </h4>

                                <h4>ID No: 
                                    <b><?php echo $rowStd['matricNo'];?></b>
                                </h4>
                                <h4>Grading:
                                    <b><?php echo $rowSemester['semesterName'];?></b> 
                                </h4>

                                <h4>Class lvl: 
                                    <b><?php echo $rowLevel['levelName'];?></b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="card-body">
                <div  align="center"><h2 class="text-success">****** Result ******</h2></div>
                <br>
                <table class="table table-striped table-bordered" style="width:100%;" border="0.1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Code</th>
                            <th>Grade</th>
                            <th>Letter Grade</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php

                $ret=mysqli_query($con,"SELECT tblresult.matricNo,tblresult.levelId,tblresult.courseCode,tblresult.courseUnit,tblresult.score,tblresult.scoreGradePoint,
                tblresult.scoreLetterGrade,tblresult.totalScoreGradePoint,tblresult.dateAdded,tblcourse.courseTitle,
                tbllevel.levelName,tblsemester.semesterName,tblsession.sessionName
                from tblresult
                INNER JOIN tbllevel ON tbllevel.Id = tblresult.levelId
                INNER JOIN tblcourse ON tblcourse.courseCode = tblresult.courseCode
                INNER JOIN tblsemester ON tblsemester.Id = tblresult.semesterId
                INNER JOIN tblsession ON tblsession.Id = tblresult.sessionId
                where tblresult.levelId ='$levelId' and tblresult.sessionId ='$sessionId'
                and tblresult.semesterId ='$semesterId' and tblresult.matricNo ='$matricNo'");
                $cnt=1;  $totalCourseUnit = 0;  $totalScoreGradePoint = 0;
                while ($row=mysqli_fetch_array($ret)) {
                      if($row['scoreLetterGrade'] == "F"){$color = 'red';}else{$color = '';}
                ?>
                <tr>
                <td bgcolor="<?php echo $color;?>"><?php  echo $cnt;?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseTitle'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['courseCode'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['score'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['scoreLetterGrade'];?></td>
                </tr>
                <?php
                    $cnt=$cnt+1;
                    $courseUnit = $row['courseUnit'];
                    $scoreGradePoint = $row['totalScoreGradePoint'];
                    $totalCourseUnit += $courseUnit;
                    $totalScoreGradePoint += $scoreGradePoint;
                }?>
                </tbody>
            </table>
            <br>
<!-------------------------- FROM THE FINAL RESULT TABLE --------------------------->
            <table class="table table-striped table-bordered" style="width:100%;" border="0.1">
                <thead>
                <tr>
                   
                    <th>Average</th>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody>
        <?php

        $ret=mysqli_query($con,"SELECT tblfinalresult.matricNo,tblfinalresult.levelId,tblfinalresult.totalCourseUnit,tblfinalresult.totalScoreGradePoint,tblfinalresult.avg,
        tblfinalresult.classOfDiploma,tblfinalresult.dateAdded,
        tbllevel.levelName,tblsemester.semesterName,tblsession.sessionName
        from tblfinalresult
        INNER JOIN tbllevel ON tbllevel.Id = tblfinalresult.levelId
        INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
        INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
        where tblfinalresult.levelId ='$levelId' and tblfinalresult.sessionId ='$sessionId'
        and tblfinalresult.semesterId ='$semesterId' and tblfinalresult.matricNo ='$matricNo'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
        ?>
        <tr>
        <td bgcolor="#F9D342"><?php  echo $row['avg'];?> %</td>
        <td bgcolor="#F9D342"><?php  echo $row['classOfDiploma'];?></td>
        </tr>
        <?php
        $cnt=$cnt+1;
        }?>

                    </tbody>
                </table>
                    <br>
<!-------------------------- SIGNATURE AND OTHERS --------------------------->

            <table class="table table-striped table-bordered" style="width:100%;"  border="0.1">
                <thead>
                <tr>
                    <th>Prinipal's Signature</th>
                    <th>Parent's Signature</th>
                    <th>Date</th>
                            
                </tr>
            </thead>
            <tbody>
       
        <tr>
        <td><img class="" src="includes/img/mysign.png"></td>
        <td><img class="" src="includes/img/mysign.png"></td>
        <td><?php echo date('M-d-Y h:s a');?></td>
        </tr>

                    </tbody>
                </table>
            </div>
        </div>

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
      } );

      
  </script>

</body>
</html>