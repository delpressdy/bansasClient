<div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">
                                            <h2 align="center">Pupil Records</h2>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>StudentID</th>
                                                    <th>Grade lvl</th>

                                                    <th>Section</th>

                                                    <th>Date Added</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if ($_SESSION['adminTypeId'] == 1) {
                                                    $ret = mysqli_query($con, "SELECT * FROM tblstudent INNER JOIN tbldepartment ON  tbldepartment.`departmentId` = tblstudent.`departmentId` INNER JOIN tbllevel ON tbllevel.`levelId` = tbldepartment.`levelId`
                                            ");
                                                } else {
                                                    $ret = mysqli_query($con, "SELECT * FROM tblstudent INNER JOIN tbldepartment ON  tbldepartment.`departmentId` = tblstudent.`departmentId` INNER JOIN tbllevel ON tbllevel.`levelId` = tbldepartment.`levelId` where tbldepartment.departmentId = ' $_SESSION[departmentId]' ");
                                                }

                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['firstName'] . ' ' . $row['lastName']  ?></td>
                                                        <td><?php echo $row['matricNo']; ?></td>
                                                        <td>

                                                            <?php
                                                            $lvl = $row['levelName'];

                                                            if ($lvl == "Grade 1") {
                                                                echo '<i style="background:#99d98c; border-radius:15px; color: black; padding: 2px 5px 2px 5px; font-family:cursive; font-size: 16px;" class="text-white  ">' . $lvl . '</i>';
                                                            } else if ($lvl == "Grade 2") {
                                                                echo '<i style="background:#76c893; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                            } else if ($lvl == "Grade 3") {
                                                                echo '<i style="background:#52b69a; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                            } else if ($lvl == "Grade 4") {
                                                                echo '<i style="background:#34a0a4; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                            } else if ($lvl == "Grade 5") {
                                                                echo '<i style="background:#168aad; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                            } else {
                                                                echo '<i style="background:#1a759f; border-radius:15px; color: black; padding: 2px 4px 2px 4px; font-family:cursive; font-size: 16px;" class="text-white ">' . $lvl . '</i>';
                                                            }
                                                            ?>

                                                        </td>
                                                        <!-- <td><?php echo $row['facultyName']; ?></td> -->
                                                        <td><?php echo $row['departmentName']; ?></td>

                                                        <td><?php echo $row['dateCreated']; ?></td>

                                                        <td>
                                                            <!-- <a href="editStudent.php?editStudentId=<?php echo $row['matricNo']; ?>" title="Edit Details">
                                                        <i class="fa fa-edit fa-1x"></i>
                                                    </a> -->

                                                            <a onclick="return confirm('Are you sure you want to delete?')" href="deleteStudent.php?delid=<?php echo $row['matricNo']; ?>" title="Delete Student Details">
                                                                <i class="fa fa-trash fa-1x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $cnt = $cnt + 1;
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>