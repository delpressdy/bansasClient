<?php
$staffId = $_SESSION['staffId'];
$query = mysqli_query($con, "select * from tbladmin where staffId='$staffId'");
$row = mysqli_fetch_array($query);


if ($row['adminTypeId'] === 1) {

    $staffFullName = $row['firstName'] . ' ' . $row['lastName'];
} else {

    $staffFullName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
    $staffRoom = $_SESSION['departmentId'];
}
?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title"><b class="text-danger">&nbsp;&nbsp;&nbsp;<?php echo $staffFullName; ?></b></li>
                <li class="<?php if ($page == 'dashboard') {
                                echo 'active';
                            } ?>">
                    <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <?php if ($_SESSION['adminTypeId'] == 2) { ?>

                    <li class="menu-title">Pupils Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'student') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Pupils</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-plus"></i> <a href="createStudent.php">Add New Pupil</a></li> -->
                            <li><i class="fa fa-eye"></i> <a href="viewStudent.php">Show Pupils</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown <?php if ($page == 'courses') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Subjects</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createCourses.php">Add New Subject</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewCourses.php">Show Subjects</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Grading Repors Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'result') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Setup-Generate</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="<?php if ($_SESSION['adminTypeId'] == 2) {
                                                                        echo "studentList.php";
                                                                    } else {
                                                                        echo "studentList.php";
                                                                    } ?>">Submit Grades</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList3.php">View Grades</a></li>


                        </ul>
                    </li>

                    <li class="menu-title">Accounts Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'profile') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            <li><i class="menu-icon fa fa-user"></i> <a href="changePassword.php">Change Pass</a></li>
                        </ul>
                    <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>

                <?php } else { ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="createAdmin.php">Add Staff</a></li>
                            <li><i class="fa fa-eye"></i><a href="viewAdmin.php">View List</a></li>
                        </ul>
                    </li>
                    <!-- <li class="menu-title">Classrooms Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'faculty') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Classrooms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createFaculty.php">Add New Room</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewFaculty.php">View Rooms</a></li>
                        </ul>
                    </li> -->

                    <li class="menu-item-has-children dropdown <?php if ($page == 'department') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Sections</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createDepartment.php">Add New Section</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewDepartment.php">View Section</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Pupils Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'student') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Pupils</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createStudent.php">Add New Pupil</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewStudent.php">Show Pupils</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'courses') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Subjects</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createCourses.php">Add New Subject</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewCourses.php">Show Subjects</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Grading Repors Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'result') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Setup-Generate</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="<?php if ($_SESSION['adminTypeId'] == 2) {
                                                                        echo "studentList.php";
                                                                    } else {
                                                                        echo "studentList.php";
                                                                    } ?>">Submit Grades</a></li>
                            <li><i class="fa fa-plus"></i> <a href="studentList3.php">View Grades</a></li>


                        </ul>
                    </li>

                    <li class="menu-title">Accounts Tab ↓↓↓</li>
                    <li class="menu-item-has-children dropdown <?php if ($page == 'profile') {
                                                                    echo 'active';
                                                                } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            <li><i class="menu-icon fa fa-user"></i> <a href="changePassword.php">Change Pass</a></li>
                        </ul>
                    <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li>



                <?php   } ?>




            </ul>
        </div>
    </nav>
</aside>