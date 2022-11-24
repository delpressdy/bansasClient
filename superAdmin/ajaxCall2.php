<?php

include('../includes/dbconnection.php');

$fid = intval($_GET['fid']); //gradeId

$queryss = mysqli_query($con, "select * from tbldepartment where facultyId=" . $fid . " ORDER BY departmentName ASC");
$queryss2 = mysqli_query($con, "select * from tblstaff where facultyId=" . $fid . "");
$countt = mysqli_num_rows($queryss);
$countt2 = mysqli_num_rows($queryss2);

if ($countt > 0) {
    echo '
        <select hidden required name="departmentId" onchange="showLecturer(this.value)" class="custom-select form-control">';
    while ($row = mysqli_fetch_array($queryss)) {
        echo '<option value="' . $row['departmentId'] . '" >' . $row['departmentName'] . '</option>';
    }
    echo '</select>';

    echo '<select hidden required name="teacher" onchange="showLecturer(this.value)" class="custom-select form-control">';
    while ($row2 = mysqli_fetch_array($queryss2)) {
        echo '<option value="' . $row2['facultyId'] . '" >' . $row2['facultyId'] . ' ' . $row2['lastName'] . '</option>';
    }
    echo '</select>';
}
