
<?php $admin = $this->session->userdata('admin');?>
<?php 
  
        if (!$this->session->userdata('loggedin'))
        {	
			$target= base_url().'login';
            header("Location: " . $target);
        }
$username = $this->session->userdata('username');?>
<?php $groupcode = $this->session->userdata('groupcode');?>


  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section style="background:green;"   class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assests/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome <?php echo $username;?></p>
          
        </div>
      </div>
	
   <ul class="sidebar-menu"   style="color:red;font-size:20px;background-color: white;"  data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<?php if($admin==0) { ?> 
      <li>
          <a href="<?php echo base_url(); ?>admin/viewalltest">
            <i class="fa fa-folder"></i> <span>All Projects-Test </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 <li>
          <a href="<?php echo base_url(); ?>billing/outstanding">
            <i class="fa fa-folder"></i> <span>Outstanding</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
		<li>
          <a href="<?php echo base_url(); ?>nrtask">
            <i class="fa fa-folder"></i> <span>Task-Non-Repeative-Self Assign</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
		
        
		 <li>
          <a href="<?php echo base_url(); ?>billing/notbilledyet">
            <i class="fa fa-folder"></i> <span>DSC - Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>billing/createbill">
            <i class="fa fa-folder"></i> <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>billing/createbillshort">
            <i class="fa fa-folder"></i> <span>Billing-Digital Sign</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>clientt">
            <i class="fa fa-folder"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
         
			
		 <li>
          <a href="<?php echo base_url(); ?>clientt/gstid">
            <i class="fa fa-folder"></i> <span>GST UID & PWD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>others">
            <i class="fa fa-folder"></i> <span>Link Task & Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>others/dupclient">
            <i class="fa fa-folder"></i> <span>Combine Clients (Duplicates) </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		 
		
			
		 
		 <li>
          <a href="<?php echo base_url(); ?>changepassword">
            <i class="fa fa-folder"></i> <span>Change Password</span>
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
          <a href="<?php echo base_url(); ?>accounts/journalentry">
            <i class="fa fa-folder"></i> <span>Journal Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		   <li>
          <a href="<?php echo base_url(); ?>clientt/gstid">
            <i class="fa fa-folder"></i> <span>GST UID & PWD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
        <li>
          <a href="<?php echo base_url(); ?>billing/outstandingtest">
            <i class="fa fa-folder"></i> <span>OS-Testing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
        <li>
          <a href="<?php echo base_url(); ?>billing/outstanding">
            <i class="fa fa-folder"></i> <span>Outstanding</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
		 	 
			 <li>
		 <a href="<?php echo base_url(); ?>clientaccounts">
            <i class="fa fa-folder"></i> <span>Accounts Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> </li>
		  
         <li>		  
		 <a href="<?php echo base_url(); ?>billing/createbill">
            <i class="fa fa-folder"></i> <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
        <li>		  
		 <a href="<?php echo base_url(); ?>billing/billingnew">
            <i class="fa fa-folder"></i> <span>Billing-Add New</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>

		<li>
          <a href="<?php echo base_url(); ?>billing/createbillshort">
            <i class="fa fa-folder"></i> <span>Billing-Digital Sign</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 <li>
          <a href="<?php echo base_url(); ?>billing/unbilled">
            <i class="fa fa-folder"></i> <span>Billed/Un Billed</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		  <li>
          <a href="<?php echo base_url(); ?>billing/notbilledyet">
            <i class="fa fa-folder"></i> <span>Billed-Work Not Completed</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
        <li>
          <a href="<?php echo base_url(); ?>admin/viewalltest">
            <i class="fa fa-folder"></i> <span>All Projects-Test </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
			<li>
          <a href="<?php echo base_url(); ?>admin/viewall">
            <i class="fa fa-folder"></i> <span>All Projects </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 <li>
          <a href="<?php echo base_url(); ?>others/dupclient">
            <i class="fa fa-folder"></i> <span>Combine Clients (Duplicates) </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 <li>
          <a href="<?php echo base_url(); ?>task">
            <i class="fa fa-folder"></i> <span>Task-Repeative</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
			<li>
          <a href="<?php echo base_url(); ?>followup">
            <i class="fa fa-folder"></i> <span>Staff Reg-Followup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>admin/sortable">
            <i class="fa fa-folder"></i> <span>Sortable</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>merge">
            <i class="fa fa-folder"></i> <span>Merge Task</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
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
          <a href="<?php echo base_url(); ?>admin/viewstaff">
            <i class="fa fa-folder"></i> <span>Staff Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>admin/followupasign">
            <i class="fa fa-folder"></i> <span>Staff Assign-Followup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>task">
            <i class="fa fa-folder"></i> <span>Followup Re-Create</span>
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
          <a href="<?php echo base_url(); ?>clientt">
            <i class="fa fa-folder"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
				
        <li>
          <a href="<?php echo base_url(); ?>Job">
            <i class="fa fa-folder"></i> <span>Sub Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		</li> 
		
		 <li>
          <a href="<?php echo base_url(); ?>Setuptask">
            <i class="fa fa-folder"></i> <span>Setup Task</span>
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
          <a href="<?php echo base_url(); ?>others">
            <i class="fa fa-folder"></i> <span>Link/De-Link Task & Client</span>
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
            <i class="fa fa-folder"></i> <span>Serivces </span>
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
	
		<?php } ?>
			<li>
          <a href="<?php echo base_url(); ?>followup/paymentlistgst">
            <i class="fa fa-folder"></i> <span>Payment List-G.S.T</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>followup/paymentlistit">
            <i class="fa fa-folder"></i> <span>Payment List-I.T</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>followup/futurelist">
            <i class="fa fa-folder"></i> <span>Junk List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		
		
		
		 
		<li>
          <a href="<?php echo base_url(); ?>accounts/paymententry">
            <i class="fa fa-folder"></i> <span>Payment Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>accounts/receiptentry">
            <i class="fa fa-folder"></i> <span>Receipt Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		<li>
          <a href="<?php echo base_url(); ?>accounts/contraentry">
            <i class="fa fa-folder"></i> <span>Contra Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		
		<li>
          <a href="<?php echo base_url(); ?>accounts/ledger">
            <i class="fa fa-folder"></i> <span>Ledger-Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		
		<li>
          <a href="<?php echo base_url(); ?>others/otherss">
            <i class="fa fa-folder"></i> <span>Link Task & Client-Non Repetive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>admin/linkit">
            <i class="fa fa-folder"></i> <span>Un Verified I.T.R</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		<li>
          <a href="<?php echo base_url(); ?>admin/verifieditr">
            <i class="fa fa-folder"></i> <span>Verified I.T.R</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
	 <li>
          <a href="<?php echo base_url(); ?>admin/defectiveit">
            <i class="fa fa-folder"></i> <span>Defective  I.T.R</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		 <li>
          <a href="<?php echo base_url(); ?>admin/processedit">
            <i class="fa fa-folder"></i> <span>Processed I.T.R</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		 <li>
          <a href="<?php echo base_url(); ?>admin/unprocessedtds">
            <i class="fa fa-folder"></i> <span>Un Processed T.D.S</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		 <li>
          <a href="<?php echo base_url(); ?>admin/defectivetds">
            <i class="fa fa-folder"></i> <span>Defective  T.D.S</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
		 <li>
          <a href="<?php echo base_url(); ?>admin/form16tds">
            <i class="fa fa-folder"></i> <span>Form 16  (T.D.S)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		 <li>
          <a href="<?php echo base_url(); ?>admin/processedtds">
            <i class="fa fa-folder"></i> <span>Processed T.D.S</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
		
	
		
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
  