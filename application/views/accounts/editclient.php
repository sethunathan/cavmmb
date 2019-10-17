<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>


 <li class="active treeview">
          <a href="<?php echo base_url(); ?>clientaccounts">
            <i class="fa fa-dashboard"></i> <span>Client List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">Ledger Details</p>

    <form action="<?php echo base_url(); ?>clientaccounts/saveclient/<?php echo $ac_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>  <div class="txt-heading" >A.c Name 
      <div class="form-group has-feedback">
        <input name="ac_name" id="ac_name" value ="<?php echo $ac_name?>" type="text" class="form-control" placeholder="Client Name">
		<label for="ac_name">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	  
	  
	 <div class="txt-heading" >Opening Balance
	        
	 
	  <div class="form-group has-feedback">
        <input onBlur="checkAvailability()" name="opnbal" id="opnbal"  value ="<?php echo abs($opn_bal)?>" type="text" class="form-control" placeholder="Opening Balance">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	   <span id="user-availability-status"></span>

         <select class="form-control" id="selopnbal" name="selopnbal">
			
              <option value="dr" <?php if ($opn_bal<0) {echo 'selected'; }?> >Dr</option>
			  <option value="cr"  <?php if ($opn_bal>0) {echo 'selected'; }?>>Cr</option>
		    </select>	   
      </div>
	  
	  </div>
  
	  <div class="form-group has-feedback"> <div class="txt-heading" >Address
        <input name="address"  value ="<?php echo $address?>" type="text" class="form-control" placeholder="Address">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	<div class="txt-heading" >Group 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="groupname" name="groupname">		     
		<?php
			 		
            $this->db->order_by('group_code');	
            $names = array(7,8);   
			$this->db->where_not_in('group_code', $names); 			
            $this->db->select('groupname');			
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
	 
	  
	  
 
<style>
.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: green;
    background: #d1e6d6;
	margin:20px 0px 5px;
}
</style>
 
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
url: '<?php echo site_url("clientaccounts/check_availability")?>',
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
	  
	    
	  
	    <div class="txt-heading" >E-Mail
      <div class="form-group has-feedback">
        <input type="email" name="email" value ="<?php echo $email?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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