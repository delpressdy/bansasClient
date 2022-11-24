<?php
error_reporting(0);
session_start();
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select * from tblstaff where staffId='$uname' && password='$password'");
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if ($count > 0) {
        $_SESSION['adminTypeId'] = 2;
        $_SESSION['facultyId'] = $row['facultyId'];
        $_SESSION['staffId'] = $row['staffId'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];

        echo "<script type = \"text/javascript\">
        window.location = (\"superAdmin/index.php\")
               </script>";
    } else {
        $errorMsg = "<h3 class='alert alert-danger text-danger' role='alert'>Please type valid Staff_ID and Password</h3>";
    }
}
?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Grading PHP</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="img/favicon2.jpeg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-light">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                    </a>
                </div>
                <div class="login-form">
                    <form method="Post" Action="">
                        <?php echo $errorMsg; ?>
                        <h3><strong class="text-success">Hi, Please Login</strong></h3>
                        <hr>
                        <div class="form-group">
                            <label>Staff_ID</label>
                            <input type="text" name="uname" Required class="form-control" placeholder="ID Number">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" Required class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label class="pull-left">
                                <small><a class="text-success" href="index.php">Go to main page</a></small>
                            </label>
                        </div>
                        <br><!-- Log on to codeastro.com for more projects! -->
                        <button type="submit" name="login" class="btn btn-info btn-flat m-b-30 m-t-30">Log in</button>

                        <!-- <div class="register-link m-t-15 text-center"><br>
                            <p>Sign Up <a class="text-success" href="staff/signup.php"><b>here!<b></a></p>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>