
<?php 
error_reporting(0);

$query = mysqli_query($con,"select * from tblstudent where matricNo='$matricNo'");
$row = mysqli_fetch_array($query);
$departmentId = $row['departmentId'];
$facultyId = $row['facultyId'];
$levelId = $row['levelId'];


$que=mysqli_query($con,"select * from tbldepartment where Id = '$departmentId'"); //Section                     
$row = mysqli_fetch_array($que);  
$departmentName = $row['departmentName'];      


$que=mysqli_query($con,"select * from tblfaculty where Id = '$facultyId'"); //Clasrroom                      
$row = mysqli_fetch_array($que);  
$facultyName = $row['facultyName'];      

////////////  ADMINISTRATOR DASHBOARD //////////////

$queryStudent=mysqli_query($con,"select * from tblstudent where facultyId = '$facultyId' and departmentId = '$departmentId'"); 
$adminCountStudent = mysqli_num_rows($queryStudent);

$queryCourses=mysqli_query($con,"select * from tblcourse where facultyId = '$facultyId' and departmentId = '$departmentId'"); 
$adminCountCourses=mysqli_num_rows($queryCourses);



//-------------------------ADMINISTRATOR


$admin=mysqli_query($con,"select * from tbladmin where adminTypeId = '2'");
$countAdmin=mysqli_num_rows($admin);

$todaysAtt=mysqli_query($con,"select * from tblattendance where date(DateTaken)=CURDATE();");
$countTodaysAttendance=mysqli_num_rows($todaysAtt);

$allAtt=mysqli_query($con,"select * from tblattendance");
$countAllAttendance=mysqli_num_rows($allAtt);

// //-------------------------------------------


$staffQuery=mysqli_query($con,"select * from tblstaff"); 
$countAllStaff = mysqli_num_rows($staffQuery);

$departmentQuery=mysqli_query($con,"select * from tbldepartment"); //Section
$countDepartment = mysqli_num_rows($departmentQuery);

$facultyQuery=mysqli_query($con,"select * from tblfaculty"); //Classroom
$countFaculty = mysqli_num_rows($facultyQuery);

$studentQuery=mysqli_query($con,"select * from tblstudent"); //Pupil
$countAllStudent = mysqli_num_rows($studentQuery);

$courseQuery=mysqli_query($con,"select * from tblcourse"); //Sbuject
$countAllCourses = mysqli_num_rows($courseQuery);

$courseSession=mysqli_query($con,"select * from tblsession"); //School Year
$countAllSession = mysqli_num_rows($courseSession);

$resultComputed=mysqli_query($con,"select * from tblfinalresult"); //Results
$countAllComputed = mysqli_num_rows($resultComputed);

$levelQue=mysqli_query($con,"select * from tbllevel"); //Subs
$countAllLevel = mysqli_num_rows($levelQue);

$semesterQue=mysqli_query($con,"select * from tblsemester"); //Gradings
$countAllSemester = mysqli_num_rows($semesterQue);

$distinctno=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Distinction'");

$uppercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Upper Credit'"); 
$countAllUpc = mysqli_num_rows($uppercred);

$lowercred=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Lower Credit'");
$countAlllc = mysqli_num_rows($lowercred);

$justpass=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Pass'"); 
$countAlljp = mysqli_num_rows($justpass);

$failed=mysqli_query($con,"SELECT * from tblfinalresult WHERE classOfDiploma = 'Fail'"); 
$countAllf = mysqli_num_rows($failed);


$lecCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'");
$countLecCourse = mysqli_num_rows($lecCourse);

$que=mysqli_query($con,"select * from tblassignedstaff where departmentId = '$departmentId'");
$lecCountStaff = mysqli_num_rows($que);

//-----------------------STUDENT----------------------

$studCourse=mysqli_query($con,"select * from tblcourse where departmentId = '$departmentId'");
$coutAllStudentCourses = mysqli_num_rows($studCourse);

$queResult=mysqli_query($con,"select * from tblfinalresult where matricNo = '$matricNo'"); 
$countAllStudResult = mysqli_num_rows($queResult);
?>