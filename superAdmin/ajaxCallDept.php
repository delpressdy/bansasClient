<?php

    include('../includes/dbconnection.php');

    $fid = intval($_GET['fid']);//gradeId

        $queryss=mysqli_query($con,"select * from tbldepartment where facultyId=".$fid." ORDER BY departmentName ASC");                        
        $countt = mysqli_num_rows($queryss);

        if($countt > 0){                       
<<<<<<< HEAD
        echo '<label for="select" class=" form-control-label">Select Department</label>
        <select required name="departmentId" class="custom-select form-control">';
        echo'<option value="">--Select Department--</option>';
=======
        echo '<label for="select" class=" form-control-label">Select Section</label>
        <select required name="departmentId" class="custom-select form-control">';
        echo'<option value="">--Select Section--</option>';
>>>>>>> 1bb09366e33d936fac926359eee432755bfd56e2
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Id'].'" >'.$row['departmentName'].'</option>';
        }
        echo '</select>';
        }

?>

