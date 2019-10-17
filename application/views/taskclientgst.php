
<input type="checkbox" id="checkAll">Check/DeSelect All<hr /> 
 <script> 
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
<div class="form-group has-feedback">
       	    <div class="txt-heading" >Customer List
 
	 
<div class="container">
 
<div class="row">
<div class="form-group">
                	
<?php
    $previousCountry = null;
    $this->db->where_in('group_code', array('7','8')); 
    $this->db->where('massubjob.job_code', 4);	
	$this->db->order_by('group_code,ac_name');  
    $this->db->distinct();	
	$this->db->select('ac_name,accmasaccounts.ac_code,group_code');
	$this->db->join('massetupjob', 'massetupjob.ac_code = accmasaccounts.ac_code');
	$this->db->join('massubjob', 'massubjob.subjob_code = massetupjob.subjob_code');
	
    $castxe= $this->db->get('accmasaccounts');	
    	
	                    $i=0;
                        foreach ($castxe->result() as $airport)
						{   
                             if ($previousCountry != $airport->group_code) 
							    {  
									echo "<br><button type='button'  class='btn btn-success  btn-sm'>";echo $airport->group_code;echo '</button><br>';
								}						
					        echo "<label class='col-md-4 checkbox-inline' for='checkboxes-$i'>";			
	                        echo "<input type='checkbox'    multiple='multiple' name='acname[]'  value= '$airport->ac_code'";
							echo ">$airport->ac_name</input>"; echo "</label>";echo ' <br>'; 
                            $previousCountry = $airport->group_code; 							
							$i=$i+1;
								 
						}
                       
					 ?>
</div>
</div>
</div>

		 
	 
	  </div>
	  </div>
	  
	  
	  
	  	  
	  
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