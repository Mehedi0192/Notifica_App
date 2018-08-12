<?php

if (isset($_POST['btn'])) {

	
	function register_user($data)
	{
		require'./db_connect.php';


		$sql="INSERT INTO tbl_register(full_name,contact_no,email,designation,department,batch,password)VALUES('$data[full_name]','$data[contact_no]','$data[email]','$data[designation]','$data[department]','$data[batch]','$data[password]')";

		if(mysqli_query($connection,$sql))
		{


			$message="You have registered successfully";
			return$message;
		}
		else
		{
			die('not successfull'.mysqli_error($connection));
		}
	}
	$message=register_user($_POST);
	
}

header('Location:index.php');

?>


