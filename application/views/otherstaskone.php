

	 
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
<select   id="e2"    name='task_code' style="width:300px">
<?php
  
    $previousCountry = null; 
	$this->db->where('job_code', 5);
	$this->db->order_by('subjobname,trntask1.task_code');   
	$this->db->select('subjobname,task_name,trntask1.task_code');
	$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');	     
	     
    $castxe= $this->db->get('massubjob'); 
	                    $i=0;
                        foreach ($castxe->result() as $airport)
						{ 
					  		  if ($previousCountry != $airport->subjobname) 
							    {  
									echo "<optgroup label='$airport->subjobname'>";
								}	
	                    echo "<option  value='$airport->task_code'>$airport->task_name </option>"; 
                        $previousCountry = $airport->subjobname;    
						}
                       if ($previousCountry !== null)  { echo '';}
					 ?>
 </select>					 
 
<script>
 $("#e2").select2({closeOnSelect:true}); 
</script>
  
<div class="form-group has-feedback">
       	 
	 


		 
	 
	  </div>
 <br><br>