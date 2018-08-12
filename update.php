<?php
session_start();

if(isset($_POST['btn']))
{
   
    require 'db_connect.php';
     $email=$_SESSION['email'];


    $sql="UPDATE tbl_register SET full_name = '$_POST[full_name]', contact_no= '$_POST[contact_no]', email = '$_POST[email]', designation = '$_POST[designation]', department = '$_POST[department]', batch = '$_POST[batch]', password = '$_POST[password]' WHERE  email='$email' ";
    if(mysqli_query($connection, $sql))
    {
        $_SESSION['message']='payment Updated successfully';
        header('Location:user_panel.php');
    }
    else 
    {
        die('query problem'.mysqli_error($connection));
    }
}