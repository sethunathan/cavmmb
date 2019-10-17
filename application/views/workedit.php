<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>work">
            <i class="fa fa-dashboard"></i> <span>WORK List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
   
 
    <form action="<?php echo base_url(); ?>work/savework/<?php echo $work_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
    
      </div>
      <div class="form-group has-feedback">
        <input name="workname"  value ="<?php echo $workname?>" type="text" class="form-control" placeholder="Job">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	 
	  
	  
	  <div class="form-group has-feedback">
        <input name="details"  value ="<?php echo $details?>" type="text" class="form-control" placeholder="Details">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	  
	 <p class="login-box-msg">Sevice</p>
	  
	  <div class="form-group has-feedback"> 
	  <select class="form-control" id="subjobname" name="subjobname">		     
		<?php
			 										
            $this->db->select('subjobname');                      
            $castxe= $this->db->get('massubjob');	
			$row = mysql_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value= '$data->subjobname'";
					if($data->subjobname==$subjobname) {echo "selected";}
				    echo ">$data->subjobname</option>";
				} 
		?>  
		</select>
      </div>
	 
	 <p class="login-box-msg">Client</p>
	<div class="form-group has-feedback"> 
	  <select class="form-control" id="acname" name="acname">		     
		<?php
			 										
            $this->db->select('ac_name');                      
            $castxe= $this->db->get('accmasaccounts');	
			$row = mysql_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value= '$data->ac_name'";
					if($data->ac_name==$ac_name) {echo "selected";}
				    echo ">$data->ac_name</option>";
				} 
		?>  
	   </select>
    </div>
	
	 <p class="login-box-msg">Staff</p>
	  
	<div class="form-group has-feedback"> 
	  <select class="form-control" id="empname" name="empname">		     
		<?php
			 										
            $this->db->select('empname');                      
            $castxe= $this->db->get('masemp');	
			$row = mysql_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value= '$data->empname'";
					if($data->empname==$empname) {echo "selected";}
				    echo ">$data->empname</option>";
				} 
		?>  
	   </select>
    </div>
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <!-- /.register-box -->
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</body>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker(
	{
		format: "dd-mm-yyyy",
		yearRange: '2000:2050',		 
        changeMonth: true, 
        changeYear: true,
		autoclose: true
    }
	);
  }

  );
  </script>

	 <p class="login-box-msg">Due Date</p>
	  <?php $dobday='10';$dobmonth='10';$dobyear='2017'; ?>
	<div class="form-group has-feedback"> 
	 <input class="form-control" type="text" value="<?php echo "$duedate"?>" name="datepicker" id="datepicker">
    </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
</div>

</html>

<?php //include 'bodyfooter.php';?>