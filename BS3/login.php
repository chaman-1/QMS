<?php 
    include("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login-submit'])) {
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        $sql = "SELECT `fid`, `role`, `active` FROM faculty WHERE `email` = '$myusername' and `passwd` = '$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        if($count == 1 && $row['active'] == 1) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['role'] = $row['role'];
            if($row['role'] == 'user') {
                header("location: myhome.php");
            } else if (($row['role'] == 'admin')) {
                header("location: dashboard.php");
            } else {
                header("location: login.php");
                echo("Invalid User Category");
            }
         }else {
            echo("Your Login Name or Password is invalid");
         }
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register-submit'])){
        $fid = mysqli_real_escape_string($conn, $_POST['fid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "SELECT `email` from `faculty` where `email`='$email'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
        $sql = "INSERT INTO `faculty`(`fid`, `name`, `role`, `email`, `passwd`, `active`) VALUES('$fid', '$name', 'user', '$email', '$password', 0)";
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
        // if ($conn->query($sql) === TRUE) {
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
    }
?>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
<script type="text/javascript" src="assets/js/custom.js"></script>
</head>
<body style="background: linear-gradient(#9368e9a1, #9368e9b0), url(../assets/img/full-screen-image-3.jpg);">
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="fid" id="fid" tabindex="1" class="form-control" placeholder="Faculty ID" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Your Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>