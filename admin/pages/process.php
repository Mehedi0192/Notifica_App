<?php
//echo '<pre>';
//print_r($_POST);

if(isset($_POST['btn']))
{
    require 'function_defination.php';
    $message=  send_invitation($_POST);
}
 
    require 'db_connect.php';
    $sql="SELECT * from tbl_batch";
    $batch=mysqli_query($con,$sql);
    $batch=mysqli_fetch_all($batch,MYSQLI_ASSOC);
    $sql1="SELECT * from tbl_department";
    $department=mysqli_query($con,$sql1);
    $department=mysqli_fetch_all($department,MYSQLI_ASSOC);
    $sql2="SELECT * from tbl_designation";
    $designation=mysqli_query($con,$sql2);
    $designation=mysqli_fetch_all($designation,MYSQLI_ASSOC);

?>




<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Event Confirm</h2>
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
                    <div class="form-actions">
                        <button type="submit" name="btn" value="<?php echo $_GET['id']; ?>" class="btn btn-primary">Send Notification</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->