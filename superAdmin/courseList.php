
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');

    if(isset($_GET['matricNo']) && isset($_GET['levelId']) && isset($_GET['departmentId']) && isset($_GET['facultyId']) && isset($_GET['sessionId']) && isset($_GET['semesterId'])){

        $matricNo = $_GET['matricNo'];
        $levelId = $_GET['levelId'];
        $departmentId = $_GET['departmentId'];
        $facultyId = $_GET['facultyId'];
        $sessionId = $_GET['sessionId'];
        $semesterId = $_GET['semesterId'];

        
        $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");                        
        $rowStd = mysqli_fetch_array($stdQuery);

        $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");                        
        $rowSemester = mysqli_fetch_array($semesterQuery);

        $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");                        
        $rowSession = mysqli_fetch_array($sessionQuery);

        $levelQuery=mysqli_query($con,"select * from tbllevel where Id = '$levelId'");                        
        $rowLevel = mysqli_fetch_array($levelQuery);

    
    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList.php\");
        </script>";
    }



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])){

    $score=$_POST['score'];
    $N = count($score);

    $courseCode = $_POST['courseCode'];
    $courseUnit = $_POST['courseUnit'];
    $dateAdded = date("Y-m-d");

    $letterGrade = "";
    $gradePoint = "";
    $scoreGradePoint = 0.00;
   

    $totalCourseUnit = 0;
    $totalScoreGradePoint = 0;
    $gpa = "";

    for($i = 0; $i < $N; $i++)
    {

<<<<<<< HEAD
      $score[$i]; //each scores entered
      $courseCode[$i]; // each course codes 
      $courseUnit[$i]; //each course units
      $letterGrade =  getScoreLetterGrade($score[$i]); //get the score letter grade (AA, A, AB, B etc) for each courses
      $gradePoint =  getScoreGradePoint($score[$i]); //get the score grade points (4.00, 3.75, 3.50 etc) for each courses

      $scoreGradePoint = $courseUnit[$i] * $gradePoint; //multiply each course unit with their grade point ( 3 * 4 = 12)
     
    
            //Checks if result has been computed (MatricNo, level, semester and session)
=======
      $score[$i]; 
      $courseCode[$i];
      $courseUnit[$i];
      $letterGrade =  getScoreLetterGrade($score[$i]); 
      $gradePoint =  getScoreGradePoint($score[$i]); 

      $scoreGradePoint = $courseUnit[$i] * $gradePoint;
  



            //Checks if ang result has been computed (MatricNo, level, semester and session)
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
            $que=mysqli_query($con,"select * from tblfinalresult where matricNo ='$matricNo' and levelId = '$levelId' and semesterId = '$semesterId' and sessionId = '$sessionId'");
            $ret=mysqli_fetch_array($que); 

            if($ret == 0){  //if no record exists, insert a record

                $query=mysqli_query($con,"insert into tblresult(matricNo,levelId,semesterId,sessionId,courseCode,courseUnit,score,scoreGradePoint,scoreLetterGrade,totalScoreGradePoint,dateAdded) 
                value('$matricNo','$levelId','$semesterId','$sessionId','$courseCode[$i]','$courseUnit[$i]','$score[$i]','$gradePoint','$letterGrade','$scoreGradePoint','$dateAdded')");

<<<<<<< HEAD
                if ($query) {

                    $totalCourseUnit += $courseUnit[$i]; //adds up all the course units
                    $totalScoreGradePoint += $scoreGradePoint; //adds up all the score grade points

                    //computes the gpa by dividing the total course unit by the total score grade point
                    $gpa = round(($totalScoreGradePoint / $totalCourseUnit), 2);
                    $classOfDiploma = getClassOfDiploma($gpa); //gets the class of diploma (Distinction, Upper, Lower etc)
=======


                if ($query) {

                    $totalCourseUnit += $courseUnit[$i]; //adds up all the course units e ignore rani
                    $totalScoreGradePoint += $scoreGradePoint; //adds up all the score grade points

                    $totalGrade += $score[$i];

                    
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
                }
                else
                {
                    $alertStyle ="alert alert-danger";
                    $statusMsg="An error Occurred!";
                }

<<<<<<< HEAD
            }//end of check 

       
            //echo 'Score = '.$score[$i].' Letter Grade = '.$letterGrade.' Grade point = '.$gradePoint.' totalGradePoint = '.$scoreGradePoint.'<br>';

    }//end of loop


           //Checks if result has been computed (MatricNo, level, semester and session)
=======
            }

    }//end sa loop


            // QUERY PARA COMPUTE OG AVERAGE 

            $qry = "select * from tblresult where matricNo = '$matricNo' and semesterId = '$semesterId'";
            if($res = mysqli_query($con, $qry)){
                $rows = mysqli_num_rows($res);

                $avg = $totalGrade / $rows;

                //E ignore ni para ni e compute ang gpa by dividing the total course unit by the total score grade point
                // $gpa = round(($totalScoreGradePoint / $totalCourseUnit), 2);
                $classOfDiploma = getClassOfDiploma($avg); //gets the class of diploma (Distinction, Upper, Lower etc)

            };



           //Check if ang result kay computed (MatricNo, level, semester and session)
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
            $que=mysqli_query($con,"select * from tblfinalresult where matricNo ='$matricNo' and levelId = '$levelId' and semesterId = '$semesterId' and sessionId = '$sessionId'");
            $ret=mysqli_fetch_array($que);

            if($ret > 0){

                $alertStyle ="alert alert-danger";
<<<<<<< HEAD
                $statusMsg="The result has been computed for this student for this semester, level and session!";
            }
            else{

                $querys = mysqli_query($con,"insert into tblfinalresult(matricNo,levelId,semesterId,sessionId,totalCourseUnit,totalScoreGradePoint,gpa,classOfDiploma,dateAdded) 
                value('$matricNo','$levelId','$semesterId','$sessionId','$totalCourseUnit','$totalScoreGradePoint','$gpa','$classOfDiploma','$dateAdded')");
=======
                $statusMsg="Grades are already computed for this student!";
            }
            else{

                $querys = mysqli_query($con,"insert into tblfinalresult(matricNo,levelId,semesterId,sessionId,totalCourseUnit,totalScoreGradePoint,gpa,avg,classOfDiploma,dateAdded) 
                value('$matricNo','$levelId','$semesterId','$sessionId','$totalCourseUnit','$totalScoreGradePoint','$gpa','$avg','$classOfDiploma','$dateAdded')");
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

                if ($querys) {

                    $alertStyle ="alert alert-success";
                    $statusMsg="Result Computed Successfully!";
                }
                else
                {
                    $alertStyle ="alert alert-danger";
                    $statusMsg="An error Occurred!";
                }
            }

    
<<<<<<< HEAD
}//end of POST

=======
}
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

?>



<!doctype html>
<<<<<<< HEAD
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
=======
<html class="no-js" lang="">
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
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

<<<<<<< HEAD
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
=======
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
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

<<<<<<< HEAD
//Check if the value entered is greater than 100 and not less than 0
=======
//Check if ang value na entered is greater than 100 and not less than 0
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
function myFunction() {
  var x, text;
  // Get the value of the input field with id="numb"
  x = document.getElementById("score").value;
  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x < 1 || x > 100) {
    // text = "Value cannot be greater than 100 or less than 0";
    alert("Invalid");
  } 
  else{
    text = "";
  }
 document.getElementById("demo").innerHTML = text;
}
</script>
</head>
<body>
<<<<<<< HEAD
    <!-- Left Panel -->
=======
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
     
         <?php include 'includes/leftMenu.php';?>

    <div id="right-panel" class="right-panel">
<<<<<<< HEAD

        <!-- Header-->
                    <?php include 'includes/header.php';?>
        <!-- Header-->

=======
    <?php include 'includes/header.php';?>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
<<<<<<< HEAD
                        </div> <!-- .card -->
                    </div><!--/.col-->
=======
                        </div> 
                    </div>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
<<<<<<< HEAD
                                <strong class="card-title"><h4 align="center">Compute <?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?>'s&nbsp;<?php echo $rowLevel['levelName'];?>&nbsp;[<?php echo $rowSemester['semesterName'];?>] - Semester Result</h></strong>
=======
                                <strong class="card-title"><h4 align="center"><?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?>'s&nbsp;
                                <strong class="text-success">[<?php echo $rowSemester['semesterName'];?>]</strong> - Result</h></strong>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
                            </div>
                            <form method="post">
                            <div class="card-body">
                                <p id="demo"></p>
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>#</th>
<<<<<<< HEAD
                                            <th>Course</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Score</th>
=======
                                            <th>Subject</th>
                                            <th>Code</th>
                                            <th>Grade</th>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
                $ret=mysqli_query($con,"SELECT tblcourse.courseCode,tblcourse.courseTitle,tblcourse.dateAdded,tblcourse.Id,
                tblcourse.courseUnit,tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsemester.semesterName
                from tblcourse 
                INNER JOIN tbllevel ON tbllevel.Id = tblcourse.levelId
                INNER JOIN tblsemester ON tblsemester.Id = tblcourse.semesterId
                INNER JOIN tblfaculty ON tblfaculty.Id = tblcourse.facultyId
                INNER JOIN tbldepartment ON tbldepartment.Id = tblcourse.departmentId
                where tblcourse.levelId ='$levelId' and tblcourse.semesterId ='$semesterId' 
                and tblcourse.departmentId ='$departmentId' and tblcourse.facultyId ='$facultyId'");

                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['courseTitle'];?></td>
                <td><?php  echo $row['courseCode'];?></td>
<<<<<<< HEAD
                <td><?php  echo $row['courseUnit'];?></td>
                <td><input  name="score[]" id="score" type="text" class="form-control" maxlength="3" onkeypress="return isNumber(event)" ></td>
=======
                <td><input  name="score[]" id="score" type="text" class="form-control" maxlength="3" onkeypress="return isNumber(event)" autofocus></td>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
                <input id="" value="<?php echo $row['courseCode'];?>" name="courseCode[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['courseUnit'];?>" name="courseUnit[]"  type="hidden" class="form-control" >
                <input id="" name="" value="<?php echo $row['Id'];?>" type="hidden" class="form-control" >
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                                                
                                    </tbody>
                                </table>
<<<<<<< HEAD
                            <button type="submit" onclick="myFunction()" name="compute" class="btn btn-success">Compute Result</button>
=======
                            <button type="submit" onclick="myFunction()" name="compute" class="btn btn-success">Compute</button>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
                             </form>
                            </div>
                        </div>
                    </div>
                    
<<<<<<< HEAD
<!-- end of datatable -->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
=======

            </div>
        </div>
    </div>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

    <div class="clearfix"></div>

        <?php include 'includes/footer.php';?>


<<<<<<< HEAD
</div><!-- /#right-panel -->

<!-- Right Panel -->
=======
</div>
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2

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

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
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
