
<?php
include('dbconnection.php');
session_start(); 

if (isset($_SESSION['staffId']))
{
    $staffId = $_SESSION['staffId'];

}
else if(isset($_SESSION['matricNo'])){

   $matricNo = $_SESSION['matricNo'];
}

else{
  echo "<script type = \"text/javascript\">
  window.location = (\"../index.php\");
  </script>";

}
?>