<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>emp">
            <i class="fa fa-dashboard"></i> <span>EMPLOYEE List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">EMPLOYEE Details</p>
 
    <form action="<?php echo base_url(); ?>emp/saveemp/<?php echo $emp_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
      <div class="form-group has-feedback">
        <input name="empname"  value ="<?php echo $empname?>" type="text" class="form-control" placeholder="Emp Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	 
	  <div class="form-group has-feedback">
        <input name="details"  value ="<?php echo $details?>" type="text" class="form-control" placeholder="Details">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	  <p class="login-box-msg">Username</p>
	  <div class="form-group has-feedback">
        <input name="username"  value ="<?php echo $username?>" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	
	   <p class="login-box-msg">Password</p>
	  <div class="form-group has-feedback">
        <input name="password"  value ="<?php echo $password?>" type="text" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	  
	   <p class="login-box-msg">Email-ID</p>
	  <div class="form-group has-feedback">
        <input name="email"  value ="<?php echo $email?>" type="email" class="form-control" placeholder="Email-ID">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	  
	   <p class="login-box-msg">Contact No</p>
	  <div class="form-group has-feedback">
        <input name="contactno"  value ="<?php echo $contactno?>" type="text" class="form-control" placeholder="Contact No">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	   <p class="login-box-msg">Address</p>
	  <div class="form-group has-feedback">
        <input name="address"  value ="<?php echo $address?>" type="text" class="form-control" placeholder="Address">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	   <p class="login-box-msg">Branch</p>
	   
        <div id="branchcode"> 
		<input type='radio'  class='addjobcode' name='branch_code'  value ="7" <?php if($branch_code==7) {echo "checked";}?>>PDM </input>
		<input type='radio'  class='addjobcode' name='branch_code'  value ="8" <?php if($branch_code==8) {echo "checked";}?>>TUP </input>
		  </div>
    
	<p>Cash (A/c) </p>
	<div id="ss"> 		
			<select  class="form-control"  style="width: 100%" id="cashcode" name="cashcode">		 
				<?php
					
					$this->db->select('ac_name,ac_code'); 
					$this->db->order_by('ac_name'); 
					
					$this->db->where('group_code', 2);		
					
					$castxe= $this->db->get('accmasaccounts');	
					$row = mysqli_fetch_row($result);
					foreach($castxe->result() as $data)
					 {
					   echo "<option value= '$data->ac_code'";
					   echo ">$data->ac_name</option>";
					  } 
					  ?>  
			</select>
					
	</div> 			
   <p class="login-box-msg">Active/In Active</p>
	 
        <div id="active"> 
		<input type='radio'  class='addjobcode' name='active'  value ="1" <?php if($active==1) {echo "checked";}?>>Active </input>
		<input type='radio'  class='addjobcode' name='active'  value ="0" <?php if($active==0) {echo "checked";}?>>In Active </input>
	</div>
	  
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
     
  <!-- /.form-box -->

<?php include 'bodyfooter.php';?>