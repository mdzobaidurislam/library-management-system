<?php 
session_start();
require_once('../include/Db.php');
require_once('../include/function.php');

if (isset($_SESSION['student_login'])) {
        echo Redirect_to('index.php');
    }


if (isset($_POST['students_reg'])) {
  $fname=htmlentities($_POST['fname']);
  $lname=htmlentities($_POST['lname']);
  $roll=htmlentities($_POST['roll']);
  $reg=htmlentities($_POST['reg']);
  $email=htmlentities($_POST['email']);
  $username=htmlentities($_POST['username']);
  $password=htmlentities($_POST['password']);
  $phone=htmlentities($_POST['phone']);
  $password_hash=password_hash($password, PASSWORD_DEFAULT);
  $input_error=array();
  if (empty($fname)) {
      $input_error['fname']="Fast name is required.";
  }
  if (empty($lname)) {
      $input_error['lname']="Last name is required.";
  }
  if (empty($roll)) {
      $input_error['roll']="Roll is required.";
  }
  if (empty($reg)) {
      $input_error['reg']="Registration number is required.";
  }
  if (empty($email)) {
      $input_error['email']="Email is required.";
  }
  if (empty($username)) {
      $input_error['username']="User name is required.";
  }

  if (empty($password)) {
      $input_error['password']="Password name is required.";
  }

  if (empty($phone)) {
      $input_error['phone']="Phone number is required.";
  }
  if (count($input_error)===0) {

        $email_check = "SELECT * FROM students WHERE email='$email' ";
        $run_query=mysqli_query($con,$email_check);
        $email_check_row = mysqli_num_rows($run_query);
        if ($email_check_row===0) {

            $user_check = "SELECT * FROM students WHERE username='$username' ";
            $user_run_query=mysqli_query($con,$user_check);
            $user_check_row = mysqli_num_rows($user_run_query);
            if ($user_check_row===0) {
                if (strlen($username)>5) {
                    if (strlen($password)>5) {
                        $query="INSERT INTO students (fname,lname,roll,reg,email,username,password,phone,status)VALUES('$fname','$lname','$roll','$reg','$email','$username','$password_hash','$phone','0')";
                          $run_query=mysqli_query($con,$query);
                          if ($run_query) {
                              $smsg="Registration successfull!";
                          }else{
                            $emsg="Something wrong !";
                          }
                    }else{
                         $emsg="Password to be shoort more than 6 dist!";
                     }
                }else{
                 $emsg="Username to be shoort more than 6 dist!";
             }
            }else{
                 $emsg="This user alredy exists!";
             }
        }else{
            $emsg="This email alredy exists!";
        }

  }

}







?>


<!DOCTYPE html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Register from</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">Student Register From</h1>
        </div>
       <div class="container">
           <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    if (isset($smsg)) {?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?php echo $smsg;?>
                    </div>
                  <?php  }
                ?>
                <?php
                    if (isset($emsg)) {?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?php echo $emsg;?>
                    </div>
                  <?php  }
                ?>
                </div>
           </div>
       </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?= isset($fname) ? $fname:'' ; ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($input_error['fname'])){ echo $input_error['fname'];} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name" value="<?php if(isset($lname)){ echo $lname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($input_error['lname'])){ echo $input_error['lname'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="roll" name="roll"  placeholder="Roll"value="<?php if(isset($roll)){ echo $roll;} ?>" >
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['roll'])){ echo $input_error['roll'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" id="Reg number"  placeholder="Registration number" value="<?php if(isset($reg)){ echo $reg;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['reg'])){ echo $input_error['reg'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php if(isset($email)){ echo $email;} ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php if(isset($input_error['email'])){ echo $input_error['email'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" value="<?php if(isset($username)){ echo $username;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['username'])){ echo $input_error['username'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your password" value="<?php if(isset($password)){ echo $password;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['password'])){ echo $input_error['password'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" id="phone" pattern="01[1|3|5|6|7|8|9]{0-9}{8}" placeholder="Enter your phone" required value="<?php if(isset($phone)){ echo $phone;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['phone'])){ echo $input_error['phone'];} ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="students_reg" id="students_reg" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Log In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
</body>
</html>
