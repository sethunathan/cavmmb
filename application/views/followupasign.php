<?php include 'body.php';?>
<li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/main">
            <i class="fa fa-dashboard"></i> <span>Back<-Main Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
<form action="<?php echo base_url(); ?>admin/followupasignone" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="branch_code" name="branch_code">		     
		<?php 
			foreach($accmasgroup  as $data)
				{ ?>  
				   <option value="<?php echo $data['group_code'];?>";              			
				     ><?php echo $data['groupname'];?>
					 </option>";
				<?php 
				} ?>
		  
		</select>
		<p class="login-box-msg">Type</p>
	   
        <div id="task_code"> 
		<input type='radio'   name='task_code'  value ="7" >Followp </input>
		<input type='radio'   name='task_code'  value ="8" >Entry </input>
		<input type='radio'   name='task_code'  value ="9" >Verification </input>
		  </div>
</div>
 
 <script type="text/javascript">
  document.getElementById('branch_code').value = "<?php echo $_GET['branch_code'];?>";
</script>
 
 <p><button   name="subsubmit" >Load</button></p>
 <br><br>
<?php include 'bodyfooter.php';?>