<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body >
  <div id="main_div">
  <form method="post" >
<h5>Filter</h5>
<select name="month" id="month" onchange="months()" required>
  <?php
  if(isset($_POST['month']))
  {
      if($_POST['month'] == '01')
  {
   $month ="JANUARY";
  }
 else if($_POST['month'] == '02')
  {
   $month ="FEBUARY";
  }
   else if($_POST['month'] == '03')
  {
   $month ="MARCH";
  } else if($_POST['month'] == '04')
  {
   $month ="APRIL";
  } else if($_POST['month'] == '05')
  {
   $month ="MAY";
  } else if($_POST['month'] == '06')
  {
   $month ="JUNE";
  } else if($_POST['month'] == '07')
  {
   $month ="JULY";
  } else if($_POST['month'] == '08')
  {
   $month ="AUGUST";
  } else if($_POST['month'] == '09')
  {
   $month ="SEPTEMBER";
  }else if($_POST['month'] == '10')
  {
   $month ="OCTOBER";
  }else if($_POST['month'] == '11')
  {
   $month ="NOVEMBER";
  }else if($_POST['month'] == '12')
  {
   $month ="DECEMBER";
  }


    echo '<option value="">'.$month.'</option>';
}
  ?>
  <option value="">-SELECT-</option>
  <option value="01">JANUARY</option>
  <option value="02">FEBUARY</option>
  <option value="03">MARCH</option>
  <option value="04">APRIL</option>
  <option value="05">MAY</option>
  <option value="06">JUNE</option>
  <option value="07">JULY</option>
  <option value="08">AUGUST</option>
  <option value="09">SEPTEMBER</option>
  <option value="10">OCTOBER</option>
  <option value="11">NOVEMBER</option>
  <option value="12">DECEMBER</option>
</select>
</form>



<table>
  <tr>
    <th style="width:70%">Event Name</th>
    <th style="width:30%">Date and Time</th>
  </tr>


<?php
require_once('connectMySql.php');
$where = "";
if(isset($_POST['month']))
{





  $where = " AND MONTH(schedule_from) = '".$_POST['month']."' ";
}

$query = sprintf("SELECT * FROM schedule_list WHERE DATE(schedule_from) > CURDATE() %s ",$where); 
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
  echo '
  <tr>
    <td>'.$row['title'].'</td>
    <td>'.date('F d, Y g:i A', strtotime($row['schedule_from'])).'</td> 
  </tr>';
}

?>
</table>
</div>
</body>
</html>
<script>
 function months(){ 
  var month = document.getElementById('month').value;
  $.ajax({
   url:"upcoming_schedule.php",
   method: "POST",
   data:{month:month},
   success:function(data){
    $('#main_div').html(data);
   }
  })
};
</script>