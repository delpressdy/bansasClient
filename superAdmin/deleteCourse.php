<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM tblcourse WHERE subjectId='$delid'");

if ($query == TRUE) {

        echo "<script type = \"text/javascript\">
        window.location = (\"viewCourses.php\")
        </script>";  
}
else{

echo "<script type = \"text/javascript\">
        window.location = (\"viewCourses.php\")
        </script>";  

}
