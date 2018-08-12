<?php

require 'function_defination.php';

$query_result=select_all_event_info();

if($_GET['p_sts'] == 'delete') 
 {
     $message=delete_event_by_id($inv_id);
 }

?>




<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage All Event</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h4>
                <?php if(isset($message))
                {
                  echo $message;
                  unset($message);
                }
                ?>
            </h4>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while($event_info=mysqli_fetch_assoc($query_result)){ ?>
                    <tr>
                        <td><?php echo $event_info['inv_id'];?></td>
                        <td class="center"><?php echo $event_info['inv_title'];?></td>
                        <td class="center"><?php echo $event_info['inv_date'];?></td>
                        <td class="center"><?php echo $event_info['inv_message'];?></td>


                        <td>
                                <a class="btn btn-info" href="edit_event.php?inv_id=<?php echo $event_info['inv_id'];?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?p_sts=delete&inv_id=<?php echo $event_info['inv_id'];?>" title="Delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php  } ?>
                    
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->