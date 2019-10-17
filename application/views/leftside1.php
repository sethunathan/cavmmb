
<?php $admin = $this->session->userdata('admin');?>
<?php $username = $this->session->userdata('username');?>
<?php $groupcode = $this->session->userdata('groupcode');?>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assests/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome <?php echo $username;?></p>
          
        </div>
      </div>
 
   <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<?php if($admin==0) { ?> 
		
		  <li>
          <a href="<?php echo base_url(); ?>client">
            <i class="fa fa-folder"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
		<ul>
		<li>
          <a href="<?php echo base_url(); ?>followup">
            <i class="fa fa-folder"></i> <span>1.Followup Register(GST)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>followup/task">
            <i class="fa fa-folder"></i> <span>2.Entry Level(GST)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>followup/verification">
            <i class="fa fa-folder"></i> <span>3.Verification(GST)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
         
		<li>
          <a href="<?php echo base_url(); ?>itfollowup">
            <i class="fa fa-folder"></i> <span>I.IT Followup Register(IT)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>itfollowup/task">
            <i class="fa fa-folder"></i> <span>II.Entry Level(IT)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>itfollowup/verification">
            <i class="fa fa-folder"></i> <span>III.Verification(IT)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>itfollowup/verification">
            <i class="fa fa-folder"></i> <span>IV.Processing(IT)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
			<li>
          <a href="<?php echo base_url(); ?>itfollowup">
            <i class="fa fa-folder"></i> <span>I.Followup Register(Others)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>itfollowup/task">
            <i class="fa fa-folder"></i> <span>II.Entry Level(Others)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>itfollowup/verification">
            <i class="fa fa-folder"></i> <span>III.Verification(Others)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 
		<?php if($groupcode==7 || $groupcode==8 ) { ?> 
		 
		
		<?php } ?>
		<?php } ?>
		<?php if($admin==1) { ?>
			<li>
          <a href="<?php echo base_url(); ?>admin/viewall">
            <i class="fa fa-folder"></i> <span>All Projects Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>task">
            <i class="fa fa-folder"></i> <span>Followup Register-Create</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>followup">
            <i class="fa fa-folder"></i> <span>Followup Register-Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>followup/needclarification">
            <i class="fa fa-folder"></i> <span> Clarification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
	
		
		 <li>
          <a href="<?php echo base_url(); ?>client">
            <i class="fa fa-folder"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
				 <li>
          <a href="<?php echo base_url(); ?>client1">
            <i class="fa fa-folder"></i> <span>Client-New</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
        <li>
          <a href="<?php echo base_url(); ?>Job">
            <i class="fa fa-folder"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		</li> 
		
		 
		
		 <li>
          <a href="<?php echo base_url(); ?>Emp">
            <i class="fa fa-folder"></i> <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
 
		 
		 
          <li>
         <a href="<?php echo base_url(); ?>admin/company/1">
            <i class="fa fa-folder"></i> <span>Our Company Details-TUP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		  <li>
         <a href="<?php echo base_url(); ?>admin/company/2">
            <i class="fa fa-folder"></i> <span>Our Company Details-PDM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>jobs">
            <i class="fa fa-folder"></i> <span>Serivce List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>checklist">
            <i class="fa fa-folder"></i> <span>Check List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>test">
            <i class="fa fa-folder"></i> <span>Import Excel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<?php } ?>
         <li>
          <a href="<?php echo base_url(); ?>login/logout">
            <i class="fa fa-folder"></i> <span>Log Out</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   <?php
    //echo base_url();
    echo $this->dynamic_menu->build_menu();
?>
