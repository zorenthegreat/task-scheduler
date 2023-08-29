


<?php

require('../../config.php');




if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT  * from schedule_list   where id = '{$_GET['id']}' ");
        $qrys = $conn->query("SELECT  * from schedule_list   where id = '{$_GET['id']}' ");
    $gg=$qrys->fetch_assoc();
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	
    <dl>
        <?php if($_settings->userdata('type') == 1): ?>
        
        <?php endif; ?>
        <dt class="text-muted">Category</dt>
        <dd class="pl-4"><?php echo $gg['category_id'];?></dd>
        <?php if($gg['category_id']=='Hyplex-setup'){?>
        <dt class="text-muted">Setup-Type</dt>
        <dd class="pl-4"><?php echo $gg['setup_type'];?></dd>
        <dt class="text-muted">Break Out Room</dt>
        <dd class="pl-4"><?php echo $gg['Break_out_room'];?></dd>
        <dt class="text-muted">Names</dt>
        <dd class="pl-4"><?php echo $gg['names'];?></dd>

        <?php }?>
        <?php if($gg['category_id']=='Zoom' || $gg['category_id']=='Webinar' ){?>
        <dt class="text-muted">Title</dt>
        <dd class="pl-4"><?= isset($title) ? $title : "" ?></dd>    
        <dt class="text-muted">Tech Assistant</dt>
        <dd class="pl-4"><?= isset($ass) ? $ass : "" ?></dd> 
        <?php }?>   
        <dt class="text-muted">DRY RUN</dt>  
        <dd class="pl-4"><?= isset($dry_run) ? date("F d, Y h:i A", strtotime($dry_run)) : "" ?></dd> 
        <dt class="text-muted">Emails</dt>
        <dd class="pl-4"><?php echo $gg['emails'];?></dd>
        <dt class="text-muted">College</dt>
        <dd class="pl-4"><?php echo $gg['college'];?></dd>
        <dt class="text-muted">Contact Person</dt>
        <dd class="pl-4"><?php echo $gg['contact_person'];?></dd>
        <?php if($gg['category_id']=='Zoom'){ ?>
        
        <?php }?>  
            <?php if($gg['category_id']=='Zoom' || $gg['category_id']=='Webinar' ){?>
        <dt class="text-muted">Recording</dt>
        <dd class="pl-4"><?= isset($record) ? $record : "" ?></dd> 
<?php }?>
        <dt class="text-muted">Livestreaming</dt>
        <dd class="pl-4"><?= isset($live) ? $live : "" ?></dd>  
        <dt class="text-muted">Schedule Start</dt>  
        <dd class="pl-4"><?= isset($schedule_from) ? date("F d, Y h:i A", strtotime($schedule_from)) : "" ?></dd>
        <dt class="text-muted">Schedule End</dt>
        <dd class="pl-4"><?= isset($schedule_to) ? date("F d, Y h:i A", strtotime($schedule_to)) : "" ?></dd>
           <?php if($gg['category_id']=='Zoom' || $gg['category_id']=='Webinar' ){?>
        <dt class="text-muted">Zoom Host/Co-Host</dt>
        <dd class="pl-4"><?= isset($host) ? $host : "" ?></dd>
        <dt class="text-muted">Tech Assistant</dt>
        <dd class="pl-4"><?= isset($ass) ? $ass : "" ?></dd> 
        <?php }?>
        
             <?php if($gg['category_id']=='Hyplex-setup'){?>
            <dt class="text-muted">Venue/Location</dt>
        <dd class="pl-4"><?php echo $gg['venue'];?></dd>
        

         <?php if($gg['category_id']=='Webinar'){?>
         <dt class="text-muted">List of Panelist</dt>
        <dd class="pl-4"><?= isset($panel) ? $panel : "" ?></dd>
       <?php }?> 
       <?php }?>   
    </dl>

           <?php if($gg['title2'] != '')
        {
            echo'<br><br><hr><dt class="text-muted">Category</dt>
            <dd class="pl-4">'.$gg['services'].'</dd>
            <dt class="text-muted">Title</dt>
            <dd class="pl-4">'.$gg['title2'].'</dd>
             <dt class="text-muted">DRY RUN</dt>  
        <dd class="pl-4">'.$gg['dry_run2'].'</dd> 
        <dt class="text-muted">Livestreaming</dt>
        <dd class="pl-4">'.$gg['live2'].'</dd>  
        <dt class="text-muted">Recording</dt>
        <dd class="pl-4">'.$gg['record2'].'</dd> 
                <dt class="text-muted">Tech Assistant</dt>
        <dd class="pl-4">'.$gg['ass2'].'</dd> 
         <dt class="text-muted">Zoom Host/Co-Host</dt>
        <dd class="pl-4">'.$gg['host2'].'</dd>
            ';
        }
        ?>


    <div class="clear-fix my-3"></div>
    <div class="text-right">
    <div class="clear-fix my-3"></div>

        <button class="btn btn-sm btn-primary bg-gradient-primary btn-flat edit-schedule" type="button" ><i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-sm btn-danger bg-gradient-danger btn-flat delete-schedule" type="button" ><i class="fa fa-trash"></i> Delete</button>
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="submit" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
    </form>

<script>    
    $(function(){
        $('#uni_modal').on('shown.bs.modal', function(){
            $('.edit-schedule').click(function(){
                uni_modal("<i class='fa fa-edit'></i> Edit Schedule Details", "schedules/manage_schedule.php?id=<?= isset($id) ? $id : '' ?>");
            })
            $('.delete-schedule').click(function(){
                _conf("Are you sure to delete this Scheduled Task?", 'delete_schedule', ['<?= isset($id) ? $id : '' ?>'])
            })
        })
        $('#uni_modal').on('hidden.bs.modal', function(){
            if($('form#schedule-form').length > 0 && $('#schedule-form [name="id"]').val() != ''){
			    uni_modal("<i class='fa fa-calendar-day'></i> Scheduled Task Details", "schedules/view_schedule.php?id=<?= isset($id) ? $id : '' ?>")
            }
        })
        
    })
    function delete_schedule($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_schedule",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    
  
  
   

</script>