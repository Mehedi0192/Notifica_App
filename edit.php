<?php 

session_start();
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
                </head>

<body>
  <br><br><br><br>

                <form id="register-form" action="update.php" method="post" role="form" style="width: 40%; margin-left: 30%;">
                    
                  <?php

      $email=$_SESSION['email'];
         $sql="SELECT * FROM user_details WHERE email='$email'";
         $result= $connection->query($sql);
         while($key=mysqli_fetch_assoc($result)){
        
          
         
       ?>

                  <div class="form-group">
                    <input type="text" name="full_name" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $key["full_name"];?>">
                    
                  </div>


                  <div class="form-group">
                    <input type="text" name="contact_no" id="username" tabindex="1" class="form-control" placeholder="+88" value="<?php echo $key["contact_no"];?>">
                  </div>


                  <div class="form-group">
                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="<?php echo $key["email"];?>">
                  </div>


                  <div class="form-group">
                       <select name="designation" class="form-control">
                        <option>Designation</option>>
                      <?php foreach ($designation as $key1) { ?>
                      <option  value="<?php echo $key1['id']; ?>" ><?php echo $key1['type'];  ?></option>
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
                    <input type="password" name="password" id="username" tabindex="1" class="form-control" placeholder="Password" value="">
                  </div>

                  <?php 
           }
      ?>


                   <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="btn" id="register-submit" tabindex="4" class="form-control btn btn-register" value="UPDATE Now">
                      </div>
                    </div>
                  </div>


                </form>
              </body>
            </html>