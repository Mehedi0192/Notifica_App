<?php

$hostname='localhost';
$username='notifica_diu';
$password='rfhTGi2tyQd5';
$db_name='notifica_diu';

$connection=  mysqli_connect($hostname, $username, $password);
if($connection)
{
    $db_select=mysqli_select_db($connection, $db_name);
    if($db_select)
    {
        
    }
 else {
        die('problem'.mysqli_error($connection));   
    }
}
 else {
    die('problem'.mysqli_error($connection));    
}
?>