
<?php 

ob_start();
session_start();

if (isset($_POST['btnn']))
{

include 'db_connect.php';


$email=$_POST['email'];
$password=$_POST['password'];

$_SESSION['email']=$email;

$sql="SELECT * FROM tbl_register WHERE email=$email AND password=$password";
$result=mysqli_query($connection,$sql);
if($result){
	echo "Log in Successful";
header('location:user_panel.php');
}
else
{
	echo "Enter Valid Info!";
	

}
}

 ?>
</body>
</html>