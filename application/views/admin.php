<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB  | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/dist/css/skins/_all-skins.min.css">
   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini ">
 
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
	
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CA</b>VMMB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CA</b>VMMB</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	 
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>
 
<style>
.parent {display: block;position: relative;float: left;line-height: 30px;background-color: #4FA0D8;border-right:#CCC 1px solid;}
.parent a{margin: 10px;color: #FFFFFF;text-decoration: none;}
.parent:hover > ul {display:block;position:absolute;}

.child {display: none;}
.child li {background-color: #E4EFF7;line-height: 30px;border-bottom:#CCC 1px solid;border-right:#CCC 1px solid; width:100%;}
.child li a{color: #000000;}

ul{list-style: none;margin: 0;padding: 0px; min-width:10em;}
ul ul ul{left: 100%;top: 0;margin-left:1px;}
li:hover {background-color: #95B4CA;}
.parent li:hover {background-color: #F0F0F0;}
.expand{font-size:12px;float:right;margin-right:5px;}


</style>

  </header>
 

 <?php include 'leftside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
	  
	<ul class="sidebar-menu" data-widget="tree">
	 <?php if($admin==1) { ?> 
	    <li>
          <a href="<?php echo base_url(); ?>admin/viewall">
            <i class="fa fa-folder"></i> <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
	 <?php } ?> 
	</ul>
	<br>
	<br>
	
	 <?php if($admin==1) { ?> 
	<ul  id="menu">
	<li  style="color:red;font-size:20px;background-color: coral;" class="parent"><a href="#">Followup Register</a>
	 <ul class="child">	
	<?php
			 		
            
			$this->db->order_by(' repeat desc,jobname asc  '); 
            $this->db->select('jobname,job_code,repeat');   
            $this->db->distinct();			
            $castxe= $this->db->get('masjob');	
			
			foreach($castxe->result() as $data)
				{
					?> 
                       				   
					   
				<li class="parent"><a href="#"><?php echo $data->jobname;?><span class="expand">»</span></a> 
				  <ul class="child">
				 <?php
				            $jobcode=$data->job_code ;
							$repeat=$data->repeat ;
							$this->db->distinct();
						    $this->db->order_by('subjobname');
                            $this->db->select('subjobname,subjob_code'); 							
                            $this->db->where('job_code',  $data->job_code);
		                    $datauserr= $this->db->get('massubjob');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->subjobname;
							//$menoo2=$data->subjob_code;
						?> 
								<li class="parent"><a href="#"><?php echo $meno1;?><span class="expand">»</span></a> 
			               	    
								 <ul class="child">
				 <?php
						    $this->db->order_by('followupassigntoorder,task_name');
                            $this->db->select('task_name,trntask1.task_code');
                            $this->db->distinct();							
							$this->db->join('trntask2', 'trntask2.task_code = trntask1.task_code');
                            $this->db->where('subjob_code',  $dataa->subjob_code);
		                    $datauserr= $this->db->get('trntask1');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->task_name;
							$menoo2=$dataa->task_code;
						?> 
						
						
						<?php
						if ($jobcode==4) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>followup/index/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						
                        <?php
						if ($jobcode==3) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>itfollowup/index/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 						
						 
						  <?php
						if ($jobcode==6) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>tdsfollowup/index/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 	
						 
						 
						 						  <?php
						if ($jobcode==5) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>othersfollowup/index/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 	
						 
						 						  <?php
						if ($jobcode==2) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>auditingfollowup/index/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 	
						 
						 
						 <?php	} 		?> 
							
                   </ul>				
				</li>	
							
			             
			                <?php	} 		?> 
							</li>
                   </ul>				
				</li>
						
                 
				<?php	} 		?>  
					</li>
	
	</ul>


	<li style="color:red;font-size:20px;background-color: green;" class="parent"><a href="#">Entry Level Register</a>
	 <ul class="child">	
	<?php
			 		
            $this->db->order_by('jobname');					
            $this->db->select('jobname,job_code');                      
            $castxe= $this->db->get('masjob');	
			
			foreach($castxe->result() as $data)
				{
					?> 
                       				   
					   
				<li class="parent"><a href="#"><?php echo $data->jobname;?><span class="expand">»</span></a> 
				  <ul class="child">
				 <?php
						    $jobcode=$data->job_code ;
							$this->db->order_by('subjobname');
                            $this->db->select('subjobname,subjob_code'); 							
                            $this->db->where('job_code',  $data->job_code);
		                    $datauserr= $this->db->get('massubjob');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->subjobname;
							//$menoo2=$data->subjob_code;
						?> 
								<li class="parent"><a href="#"><?php echo $meno1;?><span class="expand">»</span></a> 
			               	    
								 <ul class="child">
				 <?php
						    $this->db->order_by('task_code');
                            $this->db->select('task_name,task_code'); 							
                            $this->db->where('subjob_code',  $dataa->subjob_code);
		                    $datauserr= $this->db->get('trntask1');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->task_name;
							$menoo2=$dataa->task_code;
						?> 
						
						
						<?php
						if ($jobcode==4) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>followup/task/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						
                        <?php
						if ($jobcode==3) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>itfollowup/task/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						 
						   <?php
						if ($jobcode==6) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>tdsfollowup/task/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?>
						
						<?if ($jobcode==5) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>othersfollowup/task/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 	
						 
						 						  <?php
						if ($jobcode==2) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>auditingfollowup/task/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
							
						 <?php	} 		?> 
							
                   </ul>				
				</li>	
							
			             
			                <?php	} 		?> 
							</li>
                   </ul>				
				</li>
						
                 
				<?php	} 		?>  
	
	</ul>
	</li>
	 <li class="parent"><a href="#">Verification Register</a>
	 <ul class="child">	
	<?php
			 		
            $this->db->order_by('jobname');					
            $this->db->select('jobname,job_code');                      
            $castxe= $this->db->get('masjob');	
			
			foreach($castxe->result() as $data)
				{
					?> 
                       				   
					   
				<li class="parent"><a href="#"><?php echo $data->jobname;?><span class="expand">»</span></a> 
				  <ul class="child">
				 <?php
				            $jobcode=$data->job_code ;
						    $this->db->order_by('subjobname');
                            $this->db->select('subjobname,subjob_code'); 							
                            $this->db->where('job_code',  $data->job_code);
		                    $datauserr= $this->db->get('massubjob');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->subjobname;
							//$menoo2=$data->subjob_code;
						?> 
								<li class="parent"><a href="#"><?php echo $meno1;?><span class="expand">»</span></a> 
			               	    
								 <ul class="child">
				 <?php
						    $this->db->order_by('task_code');
                            $this->db->select('task_name,task_code'); 							
                            $this->db->where('subjob_code',  $dataa->subjob_code);
		                    $datauserr= $this->db->get('trntask1');	
	                        foreach ($datauserr->result() as $dataa){
							$meno1=$dataa->task_name;
							$menoo2=$dataa->task_code;
						?> 
						
						<?php
						if ($jobcode==4) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>followup/verification/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						
                        <?php
						if ($jobcode==3) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>itfollowup/verification/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						 
						   <?php
						if ($jobcode==6) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>tdsfollowup/verification/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
						 
						 
						 <?if ($jobcode==5) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>othersfollowup/verification/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 	
						 
						 						  <?php
						if ($jobcode==2) {
						?>
							<li>
							 <a href="<?php echo base_url(); ?>auditingfollowup/verification/<?php echo $menoo2?>"><?php echo $meno1;?>
							</a>
							</li>
						 <?php	} 		?> 
							
						 <?php	} 		?> 
							
                   </ul>				
				</li>	
							
			             
			                <?php	} 		?> 
							</li>
                   </ul>				
				</li>
						
                 
				<?php	} 		?>  
	
	</ul>
	</li>
</ul>
	 <?php }?>
<br>
<?php include 'followupdetail.php';?>
</section>


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="£"></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assests/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assests/dist/js/adminlte.min.js"></script>

 

</body>
</html>
