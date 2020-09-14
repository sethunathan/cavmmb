 
<?php include 'body.php';?><img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
<a target="_blank" href="https://services.gst.gov.in/services/login" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> GST LOGIN</a>
 <br><br>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<textarea hidden class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" ></textarea>


<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

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
 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("clientt/gstidsearch", $attr);?>
            <div class="form-group">
               
				 
	  <select  id="e2"     id="ac_name" name="ac_name">	       
		<?php 
		    
            $this->db->order_by('ac_name');              	
            //$this->db->where('group_code', $this->session->userdata('branchcode'));      		
            $this->db->select('ac_name,ac_code,contactno,group_code');                      
            $castxe= $this->db->get('accmasaccounts');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
					$s=$data->ac_name.'-'.$data->group_code;
				    echo "<option value='$data->ac_code'";                    			
				    echo ">$s</option>";
				} 
		?>  
		
 
</select>
<br>
<br>
<script>
 $("#e2").select2({closeOnSelect:true});
  
</script>
 
                <div class="col-md-6">
                   
                    <a href="<?php echo base_url(). "clientt/gstidsearch"; ?>" class="btn btn-primary">
					 <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
					</a>
					
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div>
 
 
<p class="login-box-msg">Our Client Details</p>
<div class="table-responsive">
<table class="table" width="85%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">
     <td>S.No</td>       
	<td>Name</td>
<td>Contact Persion</td>	<td>Contact Nos.</td>	
<td>Pan </td>		
<td>GST No</td>		
<td>GST ID</td>		
<td>GST Pwd</td>			
<td>E-Way UID*</td>		
<td>E-Way Pwd*</td>     
  </tr>
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
    
     <td><?php if(isset($pageno))  print $pageno; ?></td>
     
    <td><?php echo $data->ac_name .' - '.$data->group_code ; ?></td>
<td><?php echo $data->contactperson   ; ?></td>   
 <td><?php echo $data->contactno   ; ?></td> 
<td><?php echo $data->pan.'---'. $data->tin_no   ; ?></td>   
 
<td><?php echo $data->gst   ; ?></td>   
<td contenteditable="true"
	onBlur="saveToDatabase(this,'gstid','<?php  echo $data->ac_code ?>',
	'<?php  echo $data->ac_name ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->gstid ; ?></td>
	
	
<td contenteditable="true"
	onBlur="saveToDatabase(this,'gstpwd','<?php  echo $data->ac_code ?>',
	'<?php  echo $data->ac_name ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->gstpwd ; ?></td>

	<td contenteditable="true"
	onBlur="saveToDatabase(this,'ewaybilluserid','<?php  echo $data->ac_code ?>',
	'<?php  echo $data->ac_name ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->ewaybilluserid ; ?></td>
	
	<td contenteditable="true"
	onBlur="saveToDatabase(this,'ewaybillpwd','<?php  echo $data->ac_code ?>',
	'<?php  echo $data->ac_name ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->ewaybillpwd ; ?></td>
	
  </tr>
<?php $pageno=$pageno+1;  endforeach ; ?>
</table>
</div>
 

 

<script>

function saveToDatabase(editableObj,column,id,acname,acname1) {
	
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("clientt/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname1+' - '+column+' Sucessfully Updated !!!');			 
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>