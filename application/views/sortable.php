<?php include 'body.php';?> 
<body>
<form action="<?php echo base_url(); ?>admin/sortableone" method="post">


<div class="txt-heading">Staff</div>
<div id="job_code">   
 <select class="form-control" id="emp_code" name="emp_code">	
		 <?php							 
			$this->db->select('empname,emp_code');
			$this->db->order_by('emp_code');
			$castxe= $this->db->get('masemp');	
			 
			foreach($castxe->result() as $data)
				             {
								 
								   echo "<option value= '$data->emp_code'";
				                   echo ">$data->empname</option>";
								 
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