

	 
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
<select  id="e1"    name='ac_code' style="width:300px">
<?php
  
    $previousCountry = null; 
	
	$this->db->order_by('accmasaccounts.group_code,ac_name');   
	$this->db->select('groupname,ac_name,ac_code');
	$this->db->join('accmasgroup', 'accmasaccounts.group_code = accmasgroup.group_code');
	     
    $castxe= $this->db->get('accmasaccounts');	 
	                    $i=0;
                        foreach ($castxe->result() as $airport)
						{ 
					  		  if ($previousCountry != $airport->groupname) 
							    {  
									echo "<optgroup label='$airport->groupname'>";
								}	
	                    echo "<option  value='$airport->ac_code'>$airport->ac_name </option>"; 
                        $previousCountry = $airport->groupname;    
						}
                       if ($previousCountry !== null)  { echo '';}
					 ?>
 </select>					 
 
<script>
 $("#e1").select2({closeOnSelect:true}); 
</script>
  
<div class="form-group has-feedback">
       	 
	 


		 
	 
	  </div>
 <br><br>