<?php

include('../includes/dbconnection.php');

$fid = intval($_GET['fid']); //gradeId

$queryss = mysqli_query($con, "select * from tbldepartment where facultyId=" . $fid . " ORDER BY departmentName ASC");
$countt = mysqli_num_rows($queryss);

if ($countt > 0) {
    echo '<label for="select" class=" form-control-label">Section</label>
        <select required name="departmentId" onchange="showLecturer(this.value)" class="custom-select form-control">';
    while ($row = mysqli_fetch_array($queryss)) {
        echo '<option value="' . $row['departmentName'] . '" >' . $row['departmentName'] . '</option>';
    }
    echo '</select>';
}
