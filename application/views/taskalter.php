<?php include 'body.php';?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/> 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> 
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>task/newtask">
            <i class="fa fa-dashboard"></i> <span>New Task</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  

<p class="login-box-msg">Task Details</p>
<ul class="pagination">
<p><?php echo $links; ?></p>
</ul>
<div class="table-responsive">
<table    data-toggle="table"  width="100%" border="1" cellspacing="2" cellpadding="4" >
<thead><tr>
  <th data-sortable="true">S.No </th> 
  <th data-field="code" data-sortable="true">Task #</th>
  <th data-field="name" data-sortable="true">Task Name</th>
  <th data-field="stdate" data-sortable="true">Date 1</th>
  <th data-field="enddate" data-sortable="true">Date 2</th>
  <th data-field="child" data-sortable="true">Target Date</th> 
  <th>Child </th>
  <th>Edit </th> 
  </tr></thead>
  
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
        <td><?php echo $i; ?></td>
    <td><?php echo $data->task_code; ?></td>
    <td><?php echo $data->task_name; ?></td> 
    <td><?php echo date("d-m-Y", strtotime($data->starting_date) );?></td> 	
    <td><?php echo date("d-m-Y", strtotime($data->ending_date) );?></td> 
    <td><?php echo date("d-m-Y", strtotime($data->target_date) );?></td> 
	<td><?php echo $data->childtask_code  ; ?></td>  
     <td> 
	<a href="<?php echo base_url(); ?>task/edittask/<?php echo $data->task_code;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php $i=$i+1; endforeach ; ?>
</table>
</div>
<ul class="pagination">
<p><?php echo $links; ?></p>
</ul>
 
<?php include 'bodyfooter.php';?>