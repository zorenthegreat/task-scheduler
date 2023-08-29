<h1>Welcome, <?php echo $_settings->userdata('username') ?>!</h1>
<hr>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <span class="info-box-icon bg-gradient-secondary elevation-1"></span>
        <div class="info-box-content">
          <span class="info-box-number text-right">
            <?php 
              
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="text-center">
    <?php if ($_settings->userdata('type') == 2): ?>
        <a href="<?php echo base_url ?>admin/?page=schedules" class="btn btn-primary">Add Schedule</a>
    <?php endif; ?>

  
</div>

<div class="row">
    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-calendar-day"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Today's Scheduled Tasks</span>
          <span class="info-box-number text-right">
            <?php 
              $schedule = $conn->query("SELECT * FROM schedule_list where date(schedule_from) =date('".date('Y-m-d')."')  ". ($_settings->userdata('type') != 1 ? " and user_id = '{$_settings->userdata('id')}'" : ""))->num_rows;
              echo format_num($schedule);
            ?>
            <?php ?><br><a href="#" class="view_today">View Today's Schedule</a>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Upcoming Schedules</span>
          <span class="info-box-number text-right">
            <?php 
              $schedule = $conn->query("SELECT * FROM schedule_list where unix_timestamp(date(schedule_from)) > '".strtotime(date('Y-m-d'))."' ". ($_settings->userdata('type') != 1 ? " and user_id = '{$_settings->userdata('id')}'" : ""))->num_rows;
              echo format_num($schedule);
            ?>
            <?php ?><br><a href="#" class="view_upcoming">View Upcoming Schedule</a>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>


<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-calendar-day"></i> Today's Schedule Tasks</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="view_today"> 
       
      </div>
   </div>
 </div> 
</div>

<div class="modal fade" id="modal-default1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-calendar"></i> Upcoming Schedule</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="view_upcoming"> 
       
      </div>
   </div>
 </div> 
</div>

<script>
  $(document).ready(function(){ 
  $(document).on('click', '.view_today', function(){
  $.ajax({
   url:"todays_schedule.php",
   success:function(data){
    $('#view_today').html(data);
    $('#modal-default').modal('show');
   }
  })
 })
});
</script>

<script>
  $(document).ready(function(){ 
  $(document).on('click', '.view_upcoming', function(){
  $.ajax({
   url:"upcoming_schedule.php",
   success:function(data){
    $('#view_upcoming').html(data);
    $('#modal-default1').modal('show');
   }
  })
 })
});
</script>