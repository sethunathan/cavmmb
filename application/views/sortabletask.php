<?php include 'body.php';?> 
<body>
<form action="<?php echo base_url(); ?>admin/sortableone" method="post">


<div class="txt-heading">Task</div>
<div id="job_code">   
 <select class="form-control" id="task_code" name="task_code">	
		 <?php							 
			$this->db->select('task_name,task_code');
			$this->db->order_by('task_code');
			$castxe= $this->db->get('trntask1');
			foreach($castxe->result() as $data)
				             {
								   echo "<option value= '$data->task_code'";
				                   echo ">$data->task_name</option>";
								 
				              } 
			?> 
    </select>
</div>	
 </br>
<br>
	<input type = "hidden" name="row_orderb" id="row_orderb" /> 
	<ul id="sortable-row">
		<?php
			
		
		 if ($taskstageb)
		   {
		   foreach($taskstageb->result() as $data)
				{
		?>
		<li id=<?php echo $data->id; ?>>
		<?php echo $data->id.'-'.$data->ac_name.'-'. $data->subjobname.'-'. $data->remarks;  ?></li>
		<?php 
		}
	    }		
		
		?>  
		
	</ul>
 
  <div class="col-xs-4">
 <button type="submit" class="class="btn btn-success btn-sm">Load</button>
  </div>
 
<?php include 'bodyfooter.php';?>
 
</body>
</html>