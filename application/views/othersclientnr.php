
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
<select   id="e1"    name='ac_code' style="width:300px">
<?php
  
    $previousCountry = null; 
	
	$admin = $this->session->userdata('admin');
	if ($admin==1)
	{
		$names = array(7,8);
        $this->db->where_in('accmasaccounts.group_code', $names);		
	}
	else
	{
	  $branchcode = $this->session->userdata('branchcode');
	  $this->db->where('accmasaccounts.group_code', $branchcode);
	}
	
    	
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
<style>
.bs-linebreak {
  height:10px;
}
</style> 
<div class="row">
  <div class="col-md-12 bs-linebreak">
  </div>
</div>

<div>	
	<button type="button" id="entry"  class="btnDeleteAction" >Add New - Not In List Create New Customer</button> 
</div>	
<br>
 <div class="entryscreen" style="display:none;">
         
		
        <div>Ac Name</div>
        <div class="form-group has-feedback">
           <input type="text"   id="acname"  name="acname" value ="" class="form-control"	placeholder="A/c Name">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 				
	    
        <div>Contact Nos.</div>
		<div class="form-group has-feedback">
			<input name="contactno"  id="contactno" value ="" type="text" class="form-control" placeholder="Contact Number">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		
	  	<div class="txt-heading" >Group 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="groupname" name="groupname">		     
		<?php
			 		
            $this->db->order_by('group_code');					
            $this->db->select('groupname,group_code');    
            $names = array(7,8);   
			$this->db->where_in('group_code', $names); 			
            $castxe= $this->db->get('accmasgroup');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->group_code'";
                    if($data->groupname==$groupname) {echo "selected";}
				    echo ">$data->groupname</option>";
				} 
		?>  
		</select>
      </div>
	  </div>
		
		<div class="txt-heading" >State Code 
			<div class="form-group has-feedback"> 
				 <select class="form-control" id="tin_no" name="tin_no">		     
				<?php
							
					$this->db->order_by('state_code');					
					$this->db->select('state_code,tin_number');                      
					$castxe= $this->db->get('stategst');	
					$row = mysqli_fetch_row($result);
					foreach($castxe->result() as $data)
						{
							echo "<option value='$data->tin_number'"; 
                            if($data->tin_number=="33") {echo "selected";}							
							echo ">$data->state_code</option>";
						} 
				?>  
				</select>
		  </div>
	    </div>  
		
	    <div class="txt-heading" >P.A.N.
		  <div class="form-group has-feedback">
				<input onBlur="checkAvailability()" name="pan" id="pan"  value ="" type="text" class="form-control" placeholder="PAN">				  
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			   <span id="user-availability-status"></span>    
		  </div>
	    </div>
	  
        <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
        <div class="txt-heading"  id="panerror" ></div>
	<div class="row">
	  <div class="col-md-12 bs-linebreak"></div>
	</div>
     
	  
	<button type="button"  id="saveaccounts"       class="btnDeleteAction"  >Save</button>	
 </div> 
 
 <script>
function checkAvailability()
 { 
     
    var pan =$("#pan").val();
    var ac_name =$("#acname").val();
    
	$('#panerror').val('');
	if(pan.length >= 3)	
	{
			$("#loaderIcon").show();
			$("#user-availability-status").html('Loading');				
			jQuery.ajax({
			url: '<?php echo site_url("clientt/check_availabilityshort")?>',
			data: {
				pan:pan,ac_name:ac_name
			},
			type: "POST",
			success:function(data){           
            var nameArr =  data.split('$');  
          
			$("#user-availability-status").html(nameArr[0]);			 
			$("#e1").html(nameArr[1]);
			$("#loaderIcon").hide();
			//$('#panerror').val('error');update accmasaccounts set gstid=SUBSTRING(gst,3,10) WHERE ac_code=1
			},
			error: function(xhr, status, error) {
			  alert(xhr.responseText);
				$(".errorspan").text(xhr.responseText);
				$("#loaderIcon").hide();
				}
			});
	}
 }
</script>
  <script>
function savedata()
 { 
    var pan =$("#pan").val();
    var ac_name =$("#acname").val();
	var contactno =$("#contactno").val();
    var groupname =$("#groupname").val();
	$('#panerror').val('');
	$("#loaderIcon").show();
	$("#user-availability-status").html('Loading');				
	jQuery.ajax({
	url: '<?php echo site_url("clientt/saveclientshort")?>',
	data: {
		pan:pan,ac_name:ac_name,contactno:contactno,groupname:groupname
	},
	type: "POST",
	success:function(data){     
    alert('Added');	
	var nameArr =  data.split('$');  
	//$(".error").html(nameArr);
	
	$("#user-availability-status").html(nameArr[0]);			 
	$("#e1").html(nameArr[1]);
	$("#loaderIcon").hide();		
	},
	error: function(xhr, status, error) {
		alert(xhr.responseText);
		$(".errorspan").text(xhr.responseText);
		$("#loaderIcon").hide();
		}
	});
	 
 }
</script>

 <br><br>