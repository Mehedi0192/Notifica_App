<?php 
session_start();
$email= isset($_SESSION['email']);
if ($email){
    header('Location: user_panel.php');
}


require 'db_connect.php';
	$sql="SELECT * from tbl_batch";
	$batch=mysqli_query($connection,$sql);
	$batch=mysqli_fetch_all($batch,MYSQLI_ASSOC);
	$sql1="SELECT * from tbl_department";
	$department=mysqli_query($connection,$sql1);
	$department=mysqli_fetch_all($department,MYSQLI_ASSOC);
	$sql2="SELECT * from tbl_designation";
	$designation=mysqli_query($connection,$sql2);
	$designation=mysqli_fetch_all($designation,MYSQLI_ASSOC);



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Notifica For DIU</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script type="text/javascript">
		$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

	</script>


<body>

 <h4 style="color: green;">
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h4>

<div id="fullscreen_bg" class="fullscreen_bg center" />
<div id="regContainer" class="container"  >
<h2 style="color: green;" align="center"><b>Welcome To DIU Notifica Application</b></h2><br><br>

      <div class="row" style="margin-left: 30%;">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
             
              <div class="col-sm-6 col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>

               <div class="col-sm-6 col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>

            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                <form id="login-form" action="process.php" method="post" role="form" style="display:none;">
                  <div class="form-group">
                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="">
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
                        <input type="submit" name="btnn" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  </form>



                <form id="register-form" action="register.php" method="post" role="form" style="display:;">
                  <div class="form-group">
                    <input type="text" name="full_name" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                    
                  </div>

                  <div class="form-group">
                    <input type="text" name="contact_no" id="username" tabindex="1" class="form-control" placeholder="+88" value="">
                  </div>


                  <div class="form-group">
                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="">
                  </div>

                  

                  <div class="form-group">
                       <select name="designation" class="form-control">
                       	<option>Designation</option>>
                    	<?php foreach ($designation as $key) { ?>
                    	<option value="<?php echo $key['id']; ?>"><?php echo $key['type'];  ?></option>
                    	<?php } ?>
                    </select>
                  </div>

                    <div class="form-group">
                        <select name="department" class="form-control">
                        <option>Department</option>>
                    	<?php foreach ($department as $key) { ?>
                    	<option value="<?php echo $key['id']; ?>"><?php echo $key['department_name'];  ?></option>
                    	<?php } ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <select name="batch" class="form-control">
                    	<option>Batch-Shift</option>>
                    	<?php foreach ($batch as $key) { ?>
                    	<option value="<?php echo $key['id']; ?>"><?php echo $key['batch_name']." (".$key['shift']." )";  ?></option>
                    	<?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" id="username" tabindex="1" class="form-control" placeholder="Password">
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="btn" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
</html>