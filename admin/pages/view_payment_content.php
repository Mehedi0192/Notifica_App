<?php

require 'function_defination.php';

$query_result=  select_all_payment_info();
//$payment_info=  mysqli_fetch_assoc($query_result);
?>

  <?php while($payment_info=mysqli_fetch_assoc($query_result)){ ?>
<h1 align="center">Payment View</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>Payment Id</th>
        <th><?php echo $payment_info['payment_id'];?></th>
    </tr>
    <tr>
        <th>Tenant Name</th>
        <th><?php echo $payment_info['tenant_name'];?></th>
    </tr>    
    <tr>
        <th>Total pay</th>
        <th><?php echo $payment_info['total_pay'];?></th>
    </tr>    
    <tr>
        <th>Tenant Information</th>
        <th><?php echo $payment_info['tenant_information'];?></th>
    </tr>    
    <tr>
        <th>Received By</th>
        <th><?php echo $payment_info['received_by'];?></th>
    </tr>    
    <tr>
        <th>Date</th>
        <th><?php echo $payment_info['date'];?></th>
    </tr>    
    
    <tr>
        <th>Publication status</th>
        <th>
        <?php
        if($payment_info['publication_status']==1)
        {
            echo 'Published';
        }
        else 
        {
            echo 'Unpublished';
        }
        ?>
        </th>
    </tr> 
    <br> <br> <br>
  <?php } ?>
</table>

