<h1>Entry Level & Verification Level Pending</h1>
   <form action="<?php echo base_url(); ?>itfollowup/sortablethreeb" method="post">
<div class="table-responsive">
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">
    <td>S.No</td> <td>Order</td>    
    <td>Task</td>	
    <td>Service </td>
	<td>Client </td>
	<td>Assign To </td>
    <td>Starting Date </td>
    <td>Ending Date </td>
	 <td>Open </td>
  </tr>
  
<?php 
 
$i=1;foreach ($showdetailtwo as $rsclient) : ?>  
  <tr>
  <td><input type = "text" name="row_orderb[]" id="row_orderb[]" value="<?php echo  $rsclient->id; ?>"/> </td> 
  <td><?php echo $rsclient->entryandverfiorder; ?></td>    
  <td><?php echo $rsclient->task_name;?></td>   
  <td><?php echo $rsclient->subjobname ; ?></td>
  <td><?php echo $rsclient->ac_name ; ?></td>
  <td><?php echo $rsclient->empname ; ?></td>
  <td><?php echo $rsclient->starting_date ; ?></td>
  <td><?php echo $rsclient->ending_date ; ?></td>
   
  <?php
     $task_code = $rsclient->task_code;
	 $movetotask = $rsclient->movetotask;
	 $ac_code = $rsclient->ac_code;
	 $jobcode= $rsclient->job_code;
	 $followup='';
	 if ($jobcode==2)
	 {
		 $followup='auditingfollowup';
	 }	 
	 else if ($jobcode==3)
	 {
		 $followup='itfollowup';
	 }
	 elseif ($jobcode==4) {
		 $followup='followup';
	 }					 
	 else if ($jobcode==5)
	 {
		 $followup='othersfollowup';
	 }
	 else if ($jobcode==6)
	 {
		 $followup='tdsfollowup';
	 }
     
	 if ($movetotask==1)
	 {
		 $base_url=base_url().''."$followup/task/$task_code/$ac_code"; 
		echo "<td><a target='_blank' href='$base_url'>";
		echo "<button class='btn btn-primary' style='color:lightgreen;font-size:20px;background-color: green;' type='button'>Show Detail-Entry</button></td>";
	 }
     else if ($movetotask==2)
	 {
		$base_url=base_url().''."$followup/verification/$task_code/$ac_code";
     
	 	echo "<td><a target='_blank' href='$base_url'>";
		echo "<button style='color:light-blue;font-size:20px;background-color: blue;' class='btn btn-primary' type='button'>Show Detail-Verfi</button></td>";
	 }
	  
	 	
  ?>
 
  </tr>
<?php $i=$i+1;endforeach ; ?>
 
  
 </table>
 	<input type="submit" class="btnSave" name="submit" value="Save Entry&Verification"  />
</div>
