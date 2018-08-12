<?php
//session_start();

function admin_login_check_info($data)
{
    require './db_connect.php';
    $password=md5($data['password']);
    $sql="SELECT * FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password'";
    if(mysqli_query($con, $sql))
    {
        $query_result=  mysqli_query($con, $sql);
        $admin_info=mysqli_fetch_assoc($query_result);
        //echo '<pre>';
        //print_r($admin_info);
        
        if($admin_info)
        {
            $_SESSION['admin_name']=$admin_info['admin_name'];
            $_SESSION['admin_id']=$admin_info['admin_id'];
            header('Location:admin_master.php');
        }
        else 
        {
            $message='please use valid email and password';
            return $message;
        }
    }
    else 
    {
        die('query problemn'.mysqli_error($con));
    }
}


function add_invitation($data)
{
    require './db_connect.php';
    $sql="INSERT INTO tbl_invitation(inv_title,inv_date,inv_message,designation,department,batch,special_no,special_email,u_id)VALUES('$data[inv_title]','$data[inv_date]','$data[inv_message]','$data[designation]','$data[department]','$data[batch]','$data[special_no]','$data[special_email]','$data[u_id]')";
    if(mysqli_query($con, $sql))
    {
        // $message='Invitation sended successfully';
        // return $message;
        echo '<script>alert("Invitation created!");window.location.href = "process.php?id='.$data['u_id'].'";</script>';
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
    
}


function send_invitation($data)
{
    $id =$data['btn'];
    require './db_connect.php';
    $sql="SELECT * FROM tbl_invitation WHERE u_id='$id'"; 
    $x=mysqli_query($con,$sql);
    $x=mysqli_fetch_assoc($x);
    $sql1=""; $xx="";
    if($x['designation']==0){
        $sql1="SELECT email,contact_no FROM tbl_register"; 
        $xx=mysqli_query($con,$sql1);
    }
    else{
        $designation=$x['designation'];
    if($x['department']==0){
        $sql1="SELECT email,contact_no FROM tbl_register WHERE designation='$designation'"; 
        $xx=mysqli_query($con,$sql1);
    }
    else{
        $department=$x['department'];
        $batch=$x['batch'];
        if($x['batch']==0 && $x['designation']==2){
            $sql1="SELECT email,contact_no FROM tbl_register WHERE designation='2'";
        $xx=mysqli_query($con,$sql1);       
        }
        else{
            if($x['designation']==2){
                $sql1="SELECT email,contact_no FROM tbl_register WHERE designation='2' AND batch='$batch' AND department='$department' ";
        $xx=mysqli_query($con,$sql1);       
            }
        }
    }

}
 $email=mysqli_fetch_all($xx,MYSQLI_ASSOC);
 $mail="";
 $phone="";
foreach ($email as $key => $value) {
        $mail=$mail.$value['email'].",";
        $phone=$phone.$value['contact_no'].",";
}
$mail=substr($mail, 0, -1).",".$x['special_email'];
$phone=substr($phone, 0, -1).",".$x['special_no'];

try
{
$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
$paramArray = array(
'userName'        => "01705683096",
'userPassword'    => "89217",
'messageText'     => $x['inv_message'],
'numberList'    => $phone,
'smsType'         => "TEXT",
'maskName'        => '',
'campaignName'    => '',
);
$value = $soapClient->__call("OneToMany", array($paramArray));
// echo $value->OneToManyResult;
mailSend($mail,$x['inv_message'],$x['inv_date'],$x['inv_title']); 
} 
catch 
(Exception $e) {echo $e->getMessage();
}


 echo '<script>alert("Event Sent Successfully!");window.location.href = "invite.php";</script>';
}

function mailSend($email,$msg,$date,$title)
{
$to = $email;
$subject = $title;
$txt = $msg;
$headers = "From: mehedihasan01924629@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
 
}


function select_all_event_info()
{
    require './db_connect.php';
    
    $sql="SELECT * from tbl_invitation WHERE deletion_sts=1 ";
    if(mysqli_query($con, $sql))
    {
        $query_result=  mysqli_query($con, $sql);
        return $query_result;
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}


function unpublished_payment_by_id($payment_id)
{
    require './db_connect.php';
    
    $sql="UPDATE tbl_payment SET publication_status=0 WHERE payment_id='$payment_id' ";
    if(mysqli_query($con, $sql))
    {
        $message= 'payment updated successfully';
        return $message;
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}

function published_payment_by_id($payment_id)
{
    require './db_connect.php';
    
    $sql="UPDATE tbl_payment SET publication_status=1 WHERE payment_id='$payment_id' ";
    if(mysqli_query($con, $sql))
    {
        $message= 'payment updated successfully';
        return $message;
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}


function  select_all_event_info_by_id($inv_id)
{
    require './db_connect.php';
    
    $sql="SELECT * from tbl_invitation WHERE deletion_sts=1 AND inv_id=$inv_id ";
    if(mysqli_query($con, $sql))
    {
        $query_result=  mysqli_query($con, $sql);
        return $query_result;
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}



function update_event_info($data)
{
    require './db_connect.php';
    $sql="UPDATE tbl_payment SET tenant_name = '$data[tenant_name]', total_pay = '$data[total_pay]', tenant_information='$data[tenant_information]', received_by='$data[received_by]', date='$data[date]',  publication_status = '$data[publication_status]' WHERE  payment_id='$data[payment_id]' ";
    if(mysqli_query($con, $sql))
    {
        $_SESSION['message']='payment Updated successfully';
        header('Location:manage_event.php');
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}


function delete_event_by_id($inv_id)
{
    require './db_connect.php';
    
    $sql="UPDATE tbl_invitation SET deletion_sts=0 WHERE inv_id='$inv_id' ";
    if(mysqli_query($con, $sql))
    {
        $message= 'Event deleted successfully';
        return $message;
    }
    else 
    {
        die('query problem'.mysqli_error($con));
    }
}






function  admin_logout()
{
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    
    header('Location:index.php');
}


