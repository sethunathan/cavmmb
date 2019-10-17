<?php
    echo 'Welcome ';
	$current_datetime=date("Y-m-d");
	$emp_code = $this->session->userdata('emp_code');
     
	 
	$row = $this->db->query("SELECT count(id) as previous  from trntask2 where  followupassignto=$emp_code and  followupdoneat<$current_datetime  ")->row();
     if ($row)	
	 {
		 //echo ' Followp Level - Previous Day '.$row->previous;
	 }
     
	 
    $row = $this->db->query("SELECT count(id) as total  from trntask2 where  followupassignto=". $emp_code." and movetotask=0 ")->row();
     if ($row)	
	 {
		 echo ' Followp Level In Hand '.$row->total;
	 }
	 
	//////////////////////////////////////////////////////////////////////////
	
    $row = $this->db->query("SELECT count(id) as previous  from trntask2 where  entryassisgnedto=$emp_code and  entrydoneat<$current_datetime  ")->row();
     if ($row)	
	 {
		// echo '</br> Entry Level - Previous Day '.$row->previous;
	 }	
	 
	 $row = $this->db->query("SELECT count(id) as total  from trntask2 where  entryassisgnedto=". $emp_code." and movetotask=1 ")->row();
     if ($row)	
	 {
		 echo ' </br> Entry Level In Hand '.$row->total;
	 }
	 
	 //////////////////////////////////////////////////////////////////////////
	 
	   $row = $this->db->query("SELECT count(id) as previous  from trntask2 where  verificationassignto=$emp_code and  entrydoneat<$current_datetime  ")->row();
     if ($row)	
	 {
		// echo ' </br> Verification Previous Day '.$row->previous;
	 }	
	 
	   $row = $this->db->query("SELECT count(id) as total  from trntask2 where  verificationassignto=". $emp_code." and movetotask=2 ")->row();
     if ($row)	
	 {
		 echo ' </br> Verification In Hand '.$row->total;
	 }
	
	 
 ?>
<?php 
 
if ($showdetail)?>
<h1>Followup Level Pending</h1>
<div class="table-responsive">
<table class="table"   border="1" cellspacing="2" cellpadding="4"  >
  <tr >
    <td>S.No</td>     
    <td>Task</td>	
    <td>Service </td>
	<td>Assign To </td>
    <td>Starting Date </td>
    <td>Ending Date </td>	
	<td>Open</td>
  </tr>
  
<?php $i=1;foreach ($showdetail as $rsclient) : ?>  
  <tr>
  <td><?php echo $i; ?></td>  
  <td><?php echo $rsclient['task_name']; ?></td>   
  <td><?php echo $rsclient['subjobname'].'-'.$rsclient['followupdoneat']; ?></td>
  <td><?php echo $rsclient['prevempname'] ; ?></td>
  <td><?php echo $rsclient['currentempname'] ; ?></td>
  <td><?php echo $rsclient['starting_date'] ; ?></td>
  <td><?php echo $rsclient['ending_date'] ; ?></td>
   
  <?php
     $task_code = $rsclient['task_code'];
	 $jobcode= $rsclient['job_code'];
	 
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
       
		$base_url=base_url().''."$followup/index/$task_code";
		echo "<td><a target='_blank' href='$base_url'>";
		echo "<button style='color:red;font-size:20px;background-color: coral;' class='btn btn-primary' type='button'>Show Detail</button></td>";
  ?>
   
  </tr>
<?php $i=$i+1;endforeach ; ?>


</table>
</div>

<h1>Entry Level & Verification Level Pending</h1>
<div class="table-responsive">
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">
    <td>S.No</td> 
	<td>Order</td>    
    <td>Task</td>	
	<td>Previous Person</td>
	<td>No.Of.Days </td>
	<td>Client </td>
    <td>Assign Date </td>
    <td>Ending Date </td>
  </tr>
  
<?php 
 
$i=1;foreach ($showdetailtwo as $rsclient) : ?>  
  <tr>
  <td><?php echo $i; ?></td> 
  <td><?php echo $rsclient->entryandverfiorder; ?></td>    
  <td><?php echo $rsclient->task_name.'-'. $rsclient->id;?></td>   
  <td><?php echo $rsclient->prevempname; ?></td>
  <td>
       <?php 
	    $movetotask = $rsclient->movetotask;
	    if ($movetotask==1)
	    {
		    $ending_date =$rsclient->followupdoneat;
			if ($ending_date)
			{
				$current_date = date("d-m-Y");
				$datetime1 = new DateTime($ending_date);
				$datetime2 = new DateTime($current_date);

				$difference = $datetime1->diff($datetime2);
				echo '<span style="color:red;text-align:center;">Entry Pending!!!</span>';
				//echo  $difference->d.' days'.' - '.$rsclient->days;
			//	echo  ' days- '.$rsclient->days;
				} 	
	     }
	     else if ($movetotask==2)
	    {
		    $ending_date =$rsclient->entrydoneat;
			if ($ending_date)
			{
				$current_date = date("d-m-Y");
				$datetime1 = new DateTime($ending_date);
				$datetime2 = new DateTime($current_date);

				$difference = $datetime1->diff($datetime2);
				echo '<span style="color:red;text-align:center;">Veri Pending!!!</span>';
				//echo  $difference->d.' days'.' - '.$rsclient->days;
				//echo  'days - '.$rsclient->days;
				} 	
				//} 	
	     }
		?>
</td>
  <td><?php echo $rsclient->ac_name ; ?></td>
  <td>
  
  <?php if ($movetotask==1)
	     {
		    echo $ending_date =$rsclient->followupdoneat;
			  	
	     } 
		 else if ($movetotask==2)
	    {
			 echo $ending_date =$rsclient->entrydoneat;
		}
		 ?>
  </td>
  
  <td><?php 
  $itreturndate= $rsclient->ending_date;
 echo  $itreturndate = substr($itreturndate,8, 2).'-'.substr($itreturndate,5, 2).'-'.substr($itreturndate,0, 4); ?></td>
   
  <?php
       // $strSQL="UPDATE trntask2 SET entryandverfiorder='" . $i . "' WHERE id=". $rsclient->id;
       // $this->db->query($strSQL); 
		
     $task_code = $rsclient->task_code;
	
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
</div>
<h1>Entry Level Pending-Common</h1>
<div class="table-responsive">
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="4"  >
  <tr class="AdminTableHeader">
    <td>S.No</td>     
    <td>Task</td>	
	<td>Client </td>
	<td>Previous Person </td>	
    <td>Starting Date </td>
    <td>Ending Date </td>
	 <td>Open </td>
  </tr>
  
<?php $i=1;foreach ($showdetailtwoa as $rsclient) : ?>  
  <tr>
  <td><?php echo $i; ?></td>  
  <td><?php echo $rsclient['task_name'].'-'.$rsclient['task_code']; ?></td>   
  
  <td><?php echo $rsclient['ac_name'] ; ?></td>
  <td><?php echo $rsclient['prevempname'] ; ?></td>  
  <td><?php echo $rsclient['starting_date'] ; ?></td>
  <td><?php echo $rsclient['ending_date'] ; ?></td>
   
  <?php
     $task_code = $rsclient['task_code'];
	 $ac_code = $rsclient['ac_code'];
	 $jobcode= $rsclient['job_code'];
	 $id= $rsclient['id'];
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
	 else if ($jobcode=6)
	 {
		 $followup='tdsfollowup';
	 }
     $base_url=base_url().''."$followup/task/$task_code/$ac_code/$id";
     
	 	echo "<td><a target='_blank' href='$base_url'>";
		echo "<button class='btn btn-primary' style='color:red;font-size:20px;background-color: white;' type='button'>Show Detail</button></td>";
  ?>
   
  </tr>
<?php $i=$i+1;endforeach ; ?>
</table>
</div>


