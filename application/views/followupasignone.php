<?php include 'body.php';?>
<li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/followupasign">
            <i class="fa fa-dashboard"></i> <span>Back<-Main Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>
<form action="<?php echo base_url(); ?>admin/savefollowupasign" method="post">
<div class="form-group has-feedback"> 
       <select class="form-control" id="branch_code" name="branch_code">		     
		<?php 
			foreach($accmasgroup  as $data)
				{ ?>  
				   <option value="<?php echo $data['group_code'];?>";              			
				    <?php if($data['group_code']==$branch_code) {echo "selected";}?>
					><?php echo $data['groupname'];?>
					 </option>";
				<?php 
				} ?>
		  
		</select>
		
	  <select class="form-control" id="emp_code" name="emp_code">		     
		<?php 
			foreach($masemp  as $data)
				{ ?>  
				   <option value="<?php echo $data['emp_code'];?>";              			
				     ><?php echo $data['empname'];?>
					 </option>";
				<?php 
				} ?>
		  
		</select>
</div>
 
 <script type="text/javascript">
  document.getElementById('emp_code').value = "<?php echo $_GET['emp_code'];?>";
  document.getElementById('branch_code').value = "<?php echo $_GET['branch_code'];?>";
</script>
  <div class="form-group has-feedback">
<div class="container "><div class="row">
<div class="form-group"> <p class="padding"> 
<?php
    $previousCountry = null;$previoustask_name = null;
	foreach ($followupasignone  as $airport)
		{
			$subjobname=$airport['subjobname'];
			$task_name=$airport['task_name'];
			$task_code=$airport['task_code'];			 
			$starting_date=$airport['starting_date'];
			$base_url=base_url().'admin';
			$reminder_date = date("d-m-Y", strtotime($starting_date));
                        if ($previousCountry != $subjobname) 
							    {
									echo "<br><button type='button'  class='btn btn-success  btn-sm'>";
									echo $subjobname;
									echo '</button><br>';
						}
		                
	                    echo "<input type='checkbox'    multiple='multiple' name='task_code[]'  value= '$task_code'";
		                echo ">$task_name - $reminder_date</input>";
						if ($previoustask_name != $task_name) 
							    {
									 
									echo "<br>";
									echo "<a target='_blank' href='$base_url/showdetail/$task_code/$branch_code'>";
									echo "<button class='btn btn-primary' type='button'>Show Detail</button>";
									echo "</a>";
								 	
						}
						echo "<br>";
                        $previousCountry = $subjobname;
                        $previoustask_name =$task_name;       						
		}
        if ($previousCountry !== null) {echo '';} if ($previoustask_name !== null) {echo '';}
 ?>
	</p>
</div></div></div></div>
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice{  background-color: #dd4b39; }
</style>		
<style>
p.padding {
    padding-left: 2cm;
}

p.padding2 {
    padding-left: 50%;
}
</style> 
 <p><button id="btnsubAddAction" name="subsubmit"  >Assign</button></p>
 <br><br>
<?php include 'bodyfooter.php';?>