<?php
session_start();

$email=$_SESSION['email'];


 require 'db_connect.php';
    
    $sql="DELETE FROM tbl_register WHERE email='$email' ";
    if(mysqli_query($connection, $sql))
    {
        $message= 'deleted successfully';

        header ('Location:index.php');
    }
    else 
    {
        die('query problem'.mysqli_error($connection));
    }