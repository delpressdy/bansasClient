<?php

    include('../includes/dbconnection.php');

    $deptId = intval($_GET['deptId']);//gradeId

        $queryss=mysqli_query($con,"select * from tblcourse where departmentId=".$deptId." ORDER BY courseTitle ASC");                        
        $countt = mysqli_num_rows($queryss);

        if($countt > 0){                       
<<<<<<< HEAD
        echo '<label for="select" class=" form-control-label">Course</label>
        <select required name="courseId" class="custom-select form-control">';
        echo'<option value="">--Select Course--</option>';
=======
        echo '<label for="select" class=" form-control-label">Subject</label>
        <select required name="courseId" class="custom-select form-control">';
        echo'<option value="">--Select--</option>';
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['courseId'].'" >'.$row['courseTitle'].'</option>';
        }
        echo '</select>';
        }

?>

