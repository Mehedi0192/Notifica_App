<?php

$hostname='localhost';
$username='notifica_diu';
$password='rfhTGi2tyQd5';
$db_name='notifica_diu';

$con=  mysqli_connect($hostname, $username, $password);
if($con)
{
    $db_select=  mysqli_select_db($con, $db_name);
    if($db_select)
    {
        
    }
    else 
    {
        die('database not selected'.mysqli_error($con));
    }
}
else 
{
    die('server not connected'.mysqli_error($con));
}

