
<?php
$staffId = $_SESSION['staffId'];
$query = mysqli_query($con,"select * from tblstaff where staffId='$staffId'");
$row = mysqli_fetch_array($query);
$staffFullName = $row['firstName'].' '.$row['lastName'];
?>

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                <li class="menu-title">Staff: &nbsp;&nbsp;&nbsp;<b class="text-danger"><?php echo $staffFullName;?></b></li>

                    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>">
                        <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                 
                 <li class="menu-title text-success">Pupils Window</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='student'){ echo 'active'; }?>">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Pupils</a>

                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-eye"></i> <a href="viewStudent.php">View list</a></li>
                        </ul>
                    </li>
                   
                    <li class="menu-title text-success">Grades Reports</li>
                      <li class="menu-item-has-children dropdown <?php if($page=='result'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Grade</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="studentList3.php">Generate</a></li>                     
                            <li><i class="fa fa-plus"></i> <a href="gradingCriteria.php">Grading Criteria</a></li>

                        </ul>
                    </li>

                   <!-- <li class="menu-title">Faculty and Dept.</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='faculty'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Faculty</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createFaculty.php">Add New Faculty</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewFaculty.php">View Faculty</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown <?php if($page=='department'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Departments</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createDepartment.php">Add New Dept.</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewDepartment.php">View Department</a></li>
                        </ul>
                    </li>

                     <li class="menu-item-has-children dropdown <?php if($page=='courses'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i> <a href="createCourses.php">Add New Course</a></li>
                            <li><i class="fa fa-eye"></i> <a href="viewCourses.php">View Courses</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Account</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='profile'){ echo 'active'; }?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="menu-icon fa fa-key"></i> <a href="changePassword.php">Change Password</a></li>
                            <li><i class="menu-icon fa fa-user"></i> <a href="updateProfile.php">Update Profile</a></li>
                            </li>
                        </ul>
                         <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                    </li> -->
                </ul>
            </div>
        </nav>
    </aside>