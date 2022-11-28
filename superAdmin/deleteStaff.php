<?php
 include('../includes/dbconnection.php');
include('../includes/session.php');

$delid = $_GET['delid'];



$query = mysqli_query($con,"DELETE FROM tblstaff WHERE staffId='$delid'");


if ($query === TRUE) {

    $que = mysqli_query($con,"DELETE FROM tblassignedstaff WHERE staffId='$delid'");

    if($que == TRUE){

        echo "<script type = \"text/javascript\">
        window.location = (\"viewStaff.php\")
        </script>";  

        }
        else{

            
        }
}
else{


}


   

?>

