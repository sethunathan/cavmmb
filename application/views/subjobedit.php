<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>subjob">
            <i class="fa fa-dashboard"></i> <span>JOB List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">JOB Details</p>
 
    <form action="<?php echo base_url(); ?>subjob/savesubjob/<?php echo $subjob_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
      <div class="form-group has-feedback">
        <input name="subjobname"  value ="<?php echo $subjobname?>" type="text" class="form-control" placeholder="Job">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	 
	  <div class="form-group has-feedback">
        <input name="details"  value ="<?php echo $details?>" type="text" class="form-control" placeholder="Details">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="jobname" name="jobname">		     
		<?php
			 										
            $this->db->select('jobname');                      
            $castxe= $this->db->get('masjob');	
			$row = mysql_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value= '$data->jobname'";
					if($data->jobname==$jobname) {echo "selected";}
				    echo ">$data->jobname</option>";
				} 
		?>  
		</select>
      </div>
	   
	    <div class="form-group has-feedback"> 
	   <div class="txt-heading">Regular/Non-Regular</div>
<input type="radio"  name="repeat"  value= "1">Regular</input>
<input type="radio"  name="repeat"  value= "2">Non-Regular</input><br>

 </div>
 
  <div class="form-group has-feedback"> 
<div class="txt-heading">Active/In Active</div>
<input type="radio"   name="active"  value= "1">Active</input>
<input type="radio"   name="active"  value= "2">In-Active</input><br>
 </div>
 
        <div class="col-xs-4">
          <button type="submit" class="class="btn btn-success btn-sm">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
<?php include 'bodyfooter.php';?>