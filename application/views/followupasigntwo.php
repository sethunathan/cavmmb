<?php include 'body.php';?>
<form action="<?php echo base_url(); ?>admin/savefollowupasigntwo" method="post">
<div class="form-group has-feedback"> 
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
			$id=$airport['id'];
			$ac_name=$airport['ac_name'];
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
		                
	                    echo "<input type='checkbox'    multiple='multiple' name='task_code[]'  value= '$id'";
		                echo ">$task_name - $ac_name</input>";
						 echo "<br>";
                        $previousCountry = $subjobname;
                        $previoustask_name =$ac_name;       						
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
 <p><button id="btnsubAddAction" name="subsubmit"  >Assign(In Progress)</button></p>
 <br><br>
<?php include 'bodyfooter.php';?>