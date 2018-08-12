<?php 

 require 'function_defination.php';
 $inv_id=$_GET['inv_id'];
 $query_result=select_all_event_info_by_id($inv_id);
 $event_info=  mysqli_fetch_assoc($query_result);
 
if(isset($_POST['btn']))
{
   
    $message=update_event_info($_POST);
}
 
?>






<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Event Edit Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h4 style="color: green;">
                <?php
                if(isset($message))
                {
                    echo $message;
                    unset($message);
                }
                ?>
            </h4>
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Event Title </label>
                        <div class="controls">
                            <input type="text" name="inv_title" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo $event_info['inv_title'];?>" >

                        </div>
                    </div>
                    

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Event Date</label>
                        <div class="controls">
                            <input type="date" name="inv_date" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo $event_info['inv_date'];?>" >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2"> Invitation Message</label>
                        <div class="controls">
                            <textarea  name="inv_message" id="textarea2" rows="3" ></textarea>
                        </div>
                    </div>


                    <div class="control-group">
                   <label for="designation" class="control-label">Designation</label>&nbsp &nbsp &nbsp
                       <select name="designation" class="form-control">
                        <option>Designation</option>
                        <option>All</option>
                        <?php foreach ($designation as $key) { ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['type'];  ?></option>
                        <?php } ?>
                    </select>
                  </div>

                    <div class="control-group">
                     <label for="department" class="control-label">Department</label>&nbsp &nbsp &nbsp
                        <select name="department" class="form-control">
                        <option>Department</option>
                        <option>All</option>
                        <?php foreach ($department as $key) { ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['department_name'];  ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <div class="control-group">
                    <label for="batch" class="control-label">Batch-Shift</label> &nbsp &nbsp &nbsp
                    <select name="batch" class="form-control">
                        <option>Batch-Shift</option>
                        <option>All</option>
                        <option>No</option>
                        <?php foreach ($batch as $key) { ?>
                        <option value="<?php echo $key['id']; ?>"><?php echo $key['batch_name']." (".$key['shift']." )";  ?></option>
                        <?php } ?>
                    </select>
                  </div>


                      <div class="control-group">
                        <label class="control-label" for="typeahead">Special Guest</label>
                        <div class="controls">
                            <input type="text" name="special_no" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" placeholder="+88" ><br>

                            <input type="email" name="special_email" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" placeholder="xyz@gmail.com" >
                            <input type="hidden" name="u_id"  value="<?php echo uniqid('inv_',FALSE); ?>">

                        </div>
                    </div>
                    

                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Event</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<script>
    document.forms['edit_payment_form'];
</script>