<?php

include('../includes/dbconnection.php');

$fid = intval($_GET['fid']); //gradeId

$queryss = mysqli_query($con, "SELECT tbldepartment.`departmentId`, tbllevel.`levelName` FROM tbllevel INNER JOIN tbldepartment ON tbldepartment.`levelId` = tbllevel.`levelId` WHERE tbldepartment.`departmentId` = '$fid '");
$countt = mysqli_num_rows($queryss);

if ($countt > 0) {
    echo '<label for="select" class=" form-control-label">Grade </label>
        <select disabled required name="departmentId" onchange="showLecturer(this.value)" class="custom-select form-control">';
    while ($row = mysqli_fetch_array($queryss)) {
        echo '<option value="' . $row['departmentId'] . '" >' . $row['levelName'] . '</option>';
    }
    echo '</select>';
}
