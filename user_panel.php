<?php 
session_start();
include 'db_connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <title>Notifica User Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<br>
<h2 style="color: green;" align="center"><b>Welcome To Notifica User Panel</b> <a style="color: red; margin-left:370px;" href="logout.php"><b>Logout<b></a></h2><br><br>


<body>

<div class="container">
           
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Designation</th>
        <th>Department</th>
        <th>Batch</th>
        <th>Password</th>
        


      </tr>
    </thead>
    <tbody>
    	<?php
      $email=$_SESSION['email'];
         $sql="SELECT * FROM tbl_register WHERE email='$email'";
         $result= $connection->query($sql);
         while($key=mysqli_fetch_assoc($result)){
        
         	
         
    	 ?>
      <tr>
        <td><?php echo $key["full_name"];?> </td>
        <td><?php echo $key["email"];?></td>
        <td><?php echo $key["contact_no"];?></td>
        <td><?php echo $key["designation"];?></td>
        <td><?php echo $key["department"];?></td>
        <td><?php echo $key["batch"];?> </td>
        <td><?php echo $key["password"];?></td>
        <td><a href="edit.php"><b style="color: green; font-size: 24px;">Edit</b></a></td>
        <td><a href="delete.php"><b style="color: red; font-size: 24px;">Delete</b></a></td>

      </tr>
        <?php 
           }
      ?>
    </tbody>
  </table>
</div>





<script type="text/javascript" charset="utf8"  src="https://code.jquery.com/jquery-3.2.1.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#example').DataTable();
 	});
 </script>
</body>
</html>
