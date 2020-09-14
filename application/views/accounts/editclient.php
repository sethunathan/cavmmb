<?php include 'body.php';?>
 
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>


 <li class="active treeview">
          <a href="<?php echo base_url(); ?>clientt">
            <i class="fa fa-dashboard"></i> <span>Client List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">Our Client Details</p>

    <form action="<?php echo base_url(); ?>clientt/saveclient/<?php echo $ac_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>  <div class="txt-heading" >Client Name 
      <div class="form-group has-feedback">
        <input name="ac_name" id="ac_name" value ="<?php echo $ac_name?>" type="text" class="form-control" placeholder="Client Name">
		<label for="ac_name">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	  
	 
  
	  <div class="form-group has-feedback"> <div class="txt-heading" >Address
        <input name="address"  value ="<?php echo $address?>" type="text" class="form-control" placeholder="Address">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	<div class="txt-heading" >Group 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="groupname" name="groupname">		     
		<?php
			 		
            $this->db->order_by('group_code');					
            $this->db->select('groupname');    
            $names = array(7,8);   
			$this->db->where_in('group_code', $names); 			
            $castxe= $this->db->get('accmasgroup');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->groupname'";
                    if($data->groupname==$groupname) {echo "selected";}
				    echo ">$data->groupname</option>";
				} 
		?>  
		</select>
      </div>
	  </div>  
	<div class="txt-heading" >Entity 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="entityname" name="entityname">		     
		<?php
			 		
            $this->db->order_by('entity_code');					
            $this->db->select('entityname');                      
            $castxe= $this->db->get('masentity');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->entityname'";
                    if($data->entityname==$entityname) {echo "selected";}
				    echo ">$data->entityname</option>";
				} 
		?>  
		</select>
      </div>
	  </div>
	  
	  
	  
	 <div class="txt-heading" id="dialog_title_span">D.O.B/Establishment Date
 
	 
       <div class="form-group has-feedback">
	 
        <input name="reg_date"   value ="<?php echo $reg_date?>" class="daterange" type="text"  placeholder="Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>
</div>

<style>
.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: green;
    background: #d1e6d6;
	margin:20px 0px 5px;
}
</style>
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
                    if($data->tin_number==$tin_no) {echo "selected";}
				    echo ">$data->state_code</option>";
				} 
		?>  
		</select>
      </div>
	</div>  
        <div class="txt-heading" >P.A.N.
	  <div class="form-group has-feedback">
        <input onBlur="checkAvailability()" name="pan" id="pan"  value ="<?php echo $pan?>" type="text" class="form-control" placeholder="PAN">
		  
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	   <span id="user-availability-status"></span>    
      </div>
	  </div>
	  
   <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
    
 
<script>
 
function checkAvailability() { 
var username =$("#pan").val();
var ac_name =$("#ac_name").val();
var tin_no =$("#tin_no").val() ; 
$('#panerror').val('');
if(username.length >= 3)	
{	
$("#loaderIcon").show();

 
$("#user-availability-status").html('Loading');
	
jQuery.ajax({
url: '<?php echo site_url("client/check_availability")?>',
data: {
	username:username,ac_name:ac_name,tin_no:tin_no
},
type: "POST",
success:function(data){
	 
$("#user-availability-status").html(data);
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

<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
 <div class="txt-heading" >Contact Person
	  <div class="form-group has-feedback">
        <input name="contactperson"  value ="<?php echo $contactperson?>" type="text" class="form-control" placeholder="Contact Person">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	   </div>
	     <div class="txt-heading" >Contact Number
	  <div class="form-group has-feedback">
        <input name="contactno"  value ="<?php echo $contactno?>" type="text" class="form-control" placeholder="Contact Number">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	    <div class="txt-heading" >I.T Password
	   <div class="form-group has-feedback">
        <input name="itpwd"  value ="<?php echo $itpwd?>" type="text" class="form-control" placeholder="I.T. Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	    <div class="txt-heading" >G.S.T.
	    <div class="form-group has-feedback">
        <input name="gst"  value ="<?php echo $gst?>" type="text" class="form-control" placeholder="GSTIN">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	   <div class="txt-heading" >G.S.T. ID
	    <div class="form-group has-feedback">
        <input name="gstid"  value ="<?php echo $gstid?>" type="text" class="form-control" placeholder="GST ID">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	    <div class="txt-heading" >G.S.T. ID/Password
	  <div class="form-group has-feedback">
        <input name="gstpwd"  value ="<?php echo $gstpwd?>" type="text" class="form-control" placeholder="G.S.T. ID/PWD">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	    <div class="txt-heading" >I.T. T.D.S. Password
	    <div class="form-group has-feedback">
        <input name="tdspwd"  value ="<?php echo $tdspwd?>" type="text" class="form-control" placeholder="I.T. T.D.S. Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	  <div class="txt-heading" >TRACES Password
	    <div class="form-group has-feedback">
        <input name="treacespwd"  value ="<?php echo $treacespwd?>" type="text" class="form-control" placeholder="TRACES Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	  
	   <div class="txt-heading" >E-Way Bill User ID 
	    <div class="form-group has-feedback">
        <input name="ewaybilluserid"  value ="<?php echo $ewaybilluserid?>" type="text" class="form-control" placeholder="E-Way Bill User ID">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	   <div class="txt-heading" >E-Way Bill Password
	    <div class="form-group has-feedback">
        <input name="ewaybillpwd"  value ="<?php echo $ewaybillpwd?>" type="text" class="form-control" placeholder="E-Way Bill Password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>	  
	  
	  
	  <div class="txt-heading" >T.A.N.
	    <div class="form-group has-feedback">
        <input name="tanno"  value ="<?php echo $tanno?>" type="text" class="form-control" placeholder="T.A.N.">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	  
	    <div class="txt-heading" >I.E.C.
	   <div class="form-group has-feedback">
        <input name="iec"  value ="<?php echo $iec?>" type="text" class="form-control" placeholder="I.E.C">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  </div>
	  
	    <div class="txt-heading" >E-Mail
      <div class="form-group has-feedback">
        <input type="email" name="email" value ="<?php echo $email?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  </div>

	  <div class="txt-heading" >GST State Code-Number Only
      <div class="form-group has-feedback"> 
        <input type="gststate" name="gststate" value ="<?php echo $gststate?>" class="form-control" placeholder="GST State Code">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  </div>
	  <div class="txt-heading" >GST Stat Name
      <div class="form-group has-feedback">
        <input type="gststate" name="gststatename" value ="<?php echo $gststatename?>" class="form-control" placeholder="GST State Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  </div>
	  
	    
	      <div class="form-group has-feedback">
       	    <div class="txt-heading" >Services
 
	 

<p class="padding">                  	
<?php
  
  $previousCountry = null;  
  $this->db->where('ac_code', $ac_code);
  $this->db->select('subjob_code');

 $this->db->from('massetupjob');
 $query = $this->db->get();
$options='';
foreach ($query->result() as $row)
{  $options.= $row->subjob_code.",";}
     $HiddenProducts = explode(',',$options);
	 
	$this->db->order_by('subjobname,subjob_code');   
	$this->db->select('subjobname,jobname,subjob_code');
	$this->db->join('masjob', 'masjob.job_code = massubjob.job_code','left');
	     
    $castxe= $this->db->get('massubjob');	 
	
                        foreach ($castxe->result() as $airport)
						{
                            if ($previousCountry != $airport->jobname) 
							    {
									echo "<br><button type='button'  class='btn btn-success  btn-sm'>";echo $airport->jobname;echo '</button><br>';
								}
	                  echo "<input type='checkbox'    multiple='multiple' name='subjob[]'  value= '$airport->subjob_code'";
							    
								 if(in_array($airport->subjob_code, $HiddenProducts))
								 {
									   echo "checked";
									}
				                echo ">$airport->subjobname</input>";
                                $previousCountry = $airport->jobname; 
						}
                        if ($previousCountry !== null) 
						    {
							 echo '';
							}
					 ?>
	</p>
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
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
     
 
<?php include 'bodyfooter.php';?>