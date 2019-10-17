<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>othersfollowup/verification">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>othersfollowup/verification" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="verificationn" name="verificationn">		     
		<?php  
		    $this->db->where('job_code', 5);
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
 <script type="text/javascript">
  document.getElementById('verificationn').value = "<?php echo $_GET['verificationn'];?>";
</script>

	 <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
 </form>
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<table class="table">
  <tr class="AdminTableHeader">
    <td>S.No </td> 
    <td>Client Name</td> 
    <td>Task Name</td>  	 	
	<td>Contact Nos.</td>
	<td>Starting Date</td>	
	<td>End Date</td>	
	<td>Due Date</td>	
    <td>Remarks(*)</td>
    <td>T.A.N.(*)</td>	
	<td>Traces PWD(*)</td>
	<td>Move to Billing</td>	 
	<td>Reverse to Followup</td><td>Reverse to Entry</td>
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>     
    <td><?php echo $rsclient['ac_name'].' - '.$rsclient['group_code'] ; ?></td>   
	<td><?php echo $rsclient['task_name'] ; ?></td>
    <td><?php echo $rsclient['contactno'] ; ?></td>
	
	<td><?php echo date("d-m-Y", strtotime($rsclient['startingdate']) );	?>	</td>
	<td><?php echo date("d-m-Y", strtotime($rsclient['targetdate']) );	?></td>
	<td><?php echo date("d-m-Y", strtotime($rsclient['duedate']) );	?>	</td>
	
    <td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	
    <td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'tanno','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['tanno'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'treacespwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['treacespwd'] ; ?></td>
   
	<td> 
	 <button class="btnEditAction" name="billing"
      onClick="callCrudAction('billing','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move  to Billing</button> 
    </td>
	<td> 
	 <button class="btnEditAction" name="reverse"
      onClick="callCrudAction('reverse','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse to Followup</button> 
    </td>
  <td> 
	 <button class="btnEditAction" name="reverseentry"
      onClick="callCrudAction('reverseentry','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse to Entry</button> 
    </td>
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<script>
function callCrudAction(action,id,acname) {
	$("#loaderIcon").show(); 
	if(action=="verification"){
	if(confirm("Are you sure you want to Move this?")){     
		 
    }
    else{
		 
		$("#loaderIcon").hide();
        return false;
    }
    }
	
	jQuery.ajax({
	url: '<?php echo site_url("othersfollowup/movetotask2")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
			case "reverseentry":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
			
			case "edit":
				 
			break;
			case "billing":
				$('#message_'+id).fadeOut();				
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
function savegstaccmasaccounts(editableObj,column,ac_code,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("othersfollowup/savegstaccmasaccounts")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&ac_code='+ac_code,
		success: function(data){
		 	//alert(data);
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname+' '+column+' Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
<script>
function saveToDatabase(editableObj,column,id,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("othersfollowup/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname+' Entry Level Remarks Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>