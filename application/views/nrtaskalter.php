<?php include 'body.php';?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>nrtask/newtask">
            <i class="fa fa-dashboard"></i> <span>New Task-Non Repeative</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<p class="login-box-msg">Non Repeative-Task Details</p>
<table width="100%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
    <td>Id #</td> 
    <td>Task #</td>   
	<td>Task Name</td>	
	<td>Client Name</td>
	<td>Status</td>
  	<td>Starting Date</td><td>Ending Date</td><td>Target Date</td>	
    <td>Edit</td>	
  </tr>
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
        <td><?php echo $i; ?></td>

    <td><?php echo $data->task_code; ?></td>
    <td><?php echo $data->task_name  ; ?></td> 
	<td><?php echo $data->ac_name  ; ?></td>
    <td><?php echo $data->movetotask  ; ?></td> 	
    <td><?php echo date("d-m-Y", strtotime($data->starting_date) );?></td> 	
    <td><?php echo date("d-m-Y", strtotime($data->ending_date) );?></td> 
    <td><?php echo date("d-m-Y", strtotime($data->target_date) );?></td> 
     <td>
	 
	<a href="<?php echo base_url(); ?>nrtask/edittask/<?php echo $data->task_code;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php $i=$i+1; endforeach ; ?>
</table>
<ul class="pagination">
<p><?php echo $links; ?></p>
</ul>
 
<?php include 'bodyfooter.php';?>