<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>merge">
            <i class="fa fa-dashboard"></i> <span>Merge Task</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
		
		 <form action="<?php echo base_url(); ?>merge/savemerge" method="post">
<p class="login-box-msg">Task From(OLD)</p>
 
		 	
	  
 	  <select class="form-control" id="taskfrom" name="taskfrom">		     
		<?php
			 	

                            $this->db->order_by('task_code');
                            $this->db->select('task_code,task_name');                         
		                    $datauserr= $this->db->get('trntask1');	
	                        foreach ($datauserr->result() as $dataa){
							
				    echo "<option value='$dataa->task_code'";                  
				    echo ">$dataa->task_name</option>";
				} 
		?>  
		</select>
		
		 <div class="txt-heading" >Task Name (Combine  Name) 
      <div class="form-group has-feedback">
        <input name="taskname" id="taskname" value ="" type="text" class="form-control" placeholder="Task Name">
		<label for="taskname">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
 <p class="login-box-msg">Task To(Transfer to)</p>
 
		 	
 	  <select class="form-control" id="taskto" name="taskto">		     
		<?php
			 	

                            $this->db->order_by('task_code');
                            $this->db->select('task_code,task_name');                         
		                    $datauserr= $this->db->get('trntask1');	
	                        foreach ($datauserr->result() as $dataa){
							
				    echo "<option value='$dataa->task_code'";                  
				    echo ">$dataa->task_name</option>";
				} 
		?>  
		</select>
		<br><br><br>
		
		      <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>

<?php include 'bodyfooter.php';?>