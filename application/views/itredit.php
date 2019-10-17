<?php include 'body.php';?>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>itsetup">
            <i class="fa fa-dashboard"></i> <span>ITR List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">ITR Details</p>
 
    <form action="<?php echo base_url(); ?>itsetup/saveitr/<?php echo $itr_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
      <div class="form-group has-feedback">
        <input name="itrname"  value ="<?php echo $itrname?>" type="text" class="form-control" placeholder="ITR Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	 
	  <p class="login-box-msg">Year</p>
	  <div class="form-group has-feedback">
        <input name="itryear"  value ="<?php echo $itryear?>" type="text" class="form-control" placeholder="itryear">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	   <p class="login-box-msg">Description</p>
	  <div class="form-group has-feedback">
        <input name="description"  value ="<?php echo $description?>" type="text" class="form-control" placeholder="description">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
     
  <!-- /.form-box -->

<?php include 'bodyfooter.php';?>