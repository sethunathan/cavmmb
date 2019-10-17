<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>changepassword">
            <i class="fa fa-dashboard"></i> <span>Change Password</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
		
		 <form action="<?php echo base_url(); ?>changepassword/savepassword" method="post">
 
		 	
	  
 	   
		 <div class="txt-heading" > Enter New Password
      <div class="form-group has-feedback">
        <input name="password" id="password" value ="" type="text" class="form-control" placeholder="Password">
		<label for="password">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
 
		<br><br><br>
		
		      <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>

<?php include 'bodyfooter.php';?>