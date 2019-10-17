
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
  $this->db->where('task_code', $task_code);
  $this->db->select('ac_code');
  $this->db->from('trntask2');
  $query = $this->db->get();
  $options='';
foreach ($query->result() as $row)
{  $options.= $row->ac_code.",";}
     $HiddenProducts = explode(',',$options);
	 $names = array(7,8);   
	$this->db->where_in('group_code', $names); 
	$this->db->order_by('accmasaccounts.group_code,ac_name');   
	$this->db->select('groupname,ac_name,ac_code');
	$this->db->join('accmasgroup', 'accmasaccounts.group_code = accmasgroup.group_code');
	     
    $castxe= $this->db->get('accmasaccounts');	 
	                    $i=0;
                        foreach ($castxe->result() as $airport)
						{
                            if ($previousCountry != $airport->groupname) 
							    {  
									echo "<br><button type='button'  class='btn btn-success  btn-sm'>";echo $airport->groupname;echo '</button><br>';
								}
					   echo "<label class='col-md-4 checkbox-inline' for='checkboxes-$i'>";			
	                   echo "<input type='checkbox'    multiple='multiple' name='acname[]'  value= '$airport->ac_code'";
							    
								 if(in_array($airport->ac_code, $HiddenProducts))
								 {
									   echo "checked";
									}
				                echo ">$airport->ac_name</input>"; echo "</label>";echo ' <br>'; 
                                $previousCountry = $airport->groupname; 
								$i=$i+1;
								 
						}
                        if ($previousCountry !== null) 
						    {
							 echo '';
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