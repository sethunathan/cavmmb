<?php include 'body.php';?>
 <a target="_blank" href="https://services.gst.gov.in/services/login"
 class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> GST LOGIN</a>
  <a target="_blank" href="https://ewaybillgst.gov.in/login.aspx"
 class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> e-Way Bill LOGIN</a>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
<br>
<form action="<?php echo base_url(); ?>followup/verification" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="verificationn" name="verificationn">		     
		<?php  
		$this->db->where('job_code', 4);	
		
		   // $this->db->where_in('subjob_code', array('1','3','4','6','12'));	 
            $this->db->order_by('task_code','desc');					
            $this->db->select('task_name,task_code');  
            $this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');			
            $castxe= $this->db->get('trntask1');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->task_code'"; 
                   	if($data->task_code==$verificationn) {echo "selected";}					
				    echo ">$data->task_name</option>";
				} 
		?>  
		</select>
</div>
<br>
 <script type="text/javascript">
  document.getElementById('verificationn').value = "<?php echo $_GET['verificationn'];?>";
</script>
<br>
	 <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
 </form>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>followup/verification">
            <i class="fa fa-dashboard"></i> <span>Verification - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>   
		
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
 

<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>

<div class="table-responsive">
<table         width="100%" border="1" cellspacing="2" cellpadding="4" > 



 <thead><tr>
    
    <th data-sortable="true">S.No </th> 
    <th data-sortable="true">Client Name</th> 
    <th data-sortable="true">Task Name</th> 
     
	<th>Contact Nos.</th>
	<th>GST UID</th>
	<th>GST PWD(*)</th>
	<td>E-Way UID*</td>		
    <td>E-Way Pwd*</td>
    <th data-sortable="true">Entry Staff</th> 
    <th data-sortable="true">Done at</th> 
    <th data-sortable="true">Days</th> 
    <th>Remarks(*)</th>
	<th>To Bill</th>
	<th>To Payment</th>
	<th>To F.L.</th>
    <th>To Entry Level</th>		
 </tr></thead>
   
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td> 
	    
    <td>
    	<?php if ($i==1)
    	 { 
               echo substr($rsclient['ac_name'],0,15); 
         }?>
      
    </td>   
    <td><?php   if ($i==1)
    	 {  echo $rsclient['task_name'].'-'.$rsclient['id'] ; }?></td> 
    <td><?php   if ($i==1)
    	 {  echo $rsclient['contactno'] ; }?></td> 

    <td  
	onBlur="savegstaccmasaccounts(this,'gstid','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstid'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'gstpwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstpwd'] ; ?></td>
	
		<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'ewaybilluserid','<?php  echo $rsclient['ac_code'] ?>',
	'<?php echo $rsclient['ac_name']  ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['ewaybilluserid'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'ewaybillpwd','<?php  echo $rsclient['ac_code'] ?>',
	'<?php  echo $rsclient['ac_name']  ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['ewaybillpwd'] ; ?></td>
	
	
	 <td><?php  if ($i==1)
    	 {  echo $rsclient['empname'] ;} ?></td> 
	
	<td><?php   
      //   $last_renewaldate= date("d-m-Y H:i A", strtotime($rsclient['entrydoneat'] ));
	//	 echo $last_renewaldate;   ?>
	
	</td>	 
	
	<td>
<?php 
//$current_date = date("d-m-Y");
//$datetime1 = new DateTime($last_renewaldate);
//$datetime2 = new DateTime($current_date);

//$difference = $datetime1->diff($datetime2);
//echo '<span style="color:red;text-align:center;">Pending!!!</span>';
//echo   $difference->d.' days';
 


?></td>  
<td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>  
   
	  <td>
	    
      <button type="button" class="btn btn-primary"              	
			data-id="<?php echo $rsclient['id']; ?>" 
			data-childtaskcode="<?php echo $rsclient['childtask_code']; ?>" 			
            data-acname="<?php echo $rsclient['ac_name']; ?>"
			data-taskname="<?php echo $rsclient['task_name']; ?>"
            data-taskcode="<?php echo $rsclient['task_code']; ?>" 
            data-accode="<?php echo $rsclient['ac_code']; ?>" 
            data-subjobcode="<?php echo $rsclient['subjob_code']; ?>"	
			data-toggle="modal" 
			data-target="#exampleModal">
      Move to Billing List
     </button> 
      
    </td>
	  <td> 

   
          <button class="btnEditAction" name="payment"
      onClick="callCrudAction('payment','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Payment</button> 
        
      </td>
	   <td> 
	 <button class="btnEditAction" name="reverse"
      onClick="callCrudAction('reverse','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse F.L</button> 
      </td>
      <td>
      <button class="btnEditAction" name="reverseentry"
      onClick="callCrudAction('reverseentry','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse Entry</button> 
      </td>
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
</div>



</div>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<?php include 'movetobill.php';?>

<script>
function callCrudAction(action,id,acname) {

	$("#loaderIcon").show();
	
    //$("#txtmessage").val('Updating'+id);
	if(action=="delete"){
	if(confirm("Are you sure you want to Move this?")){      
		//alert('k');exit;
    }
    else{
		 
		$("#loaderIcon").hide();
        return false;
    }
    }
	
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetotask2")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(' Sucessfully Reversed ');
			break;
			case "payment":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(' Sucessfully Moved ');
			break;
			case "reverseentry":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(' Sucessfully Moved ');
			break;
			case "insert":
				// $('#message_'+id).fadeOut();
				 $("#txtmessage").val(' Sucessfully Moved to Billing ');
			break;//
			case "edit":
				 
			break;
			case "delete":
				$('#message_'+id).fadeOut();
				//$('#table1 .hideme').hide();
				// $("#message_'+id").animate({'line-height':0},1000).hide(1);
				//$('#message_'+id).hide();
				//$("#txtmessage").val(acname+' Sucessfully moved to Followup Register ');
			break;
		}
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
    }
	//error:function (){}
	});

}


</script>



<script>
function SaveReminder(action,id) {

	 
	var comp_id=$('#comp_id').text();	
	var amount=$("#amount").val();
	var taxper=$("#taxper").val();
	var taxamt=$("#taxamt").val();
   // var reminder_date=$('#reminder_date').val();	
	var remarks=$('#remarks').val();    

	jQuery.ajax({
	url: '<?php echo site_url("followup/movetotask2")?>',
	data:{ action:action,id:id,comp_id:comp_id,amount:amount,taxper:taxper,taxamt:taxamt,remarks:remarks},
	type: "POST",
	success:function(data){
		switch(action) {			 		
			case "insert":				 
				$("#txtmessage").val(id+' Sucessfully Saved ');
			break;		
		}
		 $("#txtmessage").val(data);
		
	},
	error: function (request, status, error) {
        // alert(request.responseText);
		 $("#txtmessage").val(request.responseText);
    }
	,error: function (request, status, error) {
        alert(request.responseText); 
       $("#txtmessage").val(request.responseText);	
		} 
   });
	  $("#loaderIcon").hide();
}


</script> 


<script>
function savegstaccmasaccounts(editableObj,column,ac_code,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("followup/savegstaccmasaccounts")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&ac_code='+ac_code,
		success: function(data){
		 	//alert(data);
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(column+' Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
<script>
function saveToDatabase(editableObj,column,id,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("followup/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(' Verification Level Remarks Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>
 
 

