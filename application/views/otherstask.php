<div class="form-group has-feedback">
<div class="container ">
 
<div class="row">
<div class="form-group">

<p class="padding">                  	
<?php
  
    $previousCountry = null;  
	$this->db->order_by('subjobname,trntask1.task_code');   
	$this->db->where('job_code !=',5);
	$this->db->select('subjobname,task_name,trntask1.task_code');
	$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');	     
    $castxe= $this->db->get('massubjob'); 
	foreach ($castxe->result() as $airport)
		{
                            if ($previousCountry != $airport->subjobname) 
							    {
									echo "<br><button type='button'  class='btn btn-success  btn-sm'>";
									echo $airport->subjobname;
									echo '</button>
									<br><br>';
								}
						 echo "<label  >";			
	                    echo "<input type='checkbox'    multiple='multiple' name='task_code[]'  value= '$airport->task_code'";
		                echo ">$airport->task_name</input>";
						echo "</label>";
                        $previousCountry = $airport->subjobname; 
		}
        if ($previousCountry !== null) {echo '';}
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

 <br><br>