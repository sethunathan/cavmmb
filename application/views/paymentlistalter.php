<?php include 'body.php';?>
<a target="_blank" href="https://services.gst.gov.in/services/login" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> GST LOGIN</a>
 
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnEditAction1{background-color:#2FC332;border:0;padding:2px 10px;color:yellow;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>Followup/paymentlist">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>Followup/paymentlist" method="post">
<div class="form-group has-feedback table-responsive">   
	  <select class="form-control" id="followupp" name="followupp">		     
		<?php  
		   
			if($followupp)
				{
				//	 $this->db->where('trntask1.task_code', $followupp);	
					}	           	
            $this->db->where('job_code', 4);				
            $this->db->order_by('task_code','desc');
            $this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');			
            $this->db->select('task_name,task_code');                      
            $castxe= $this->db->get('trntask1');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->task_code'"; 
                   	if($data->task_code==$followupp) {echo "selected";}					
				    echo ">$data->task_name</option>";
				} 
		?>  
		</select>
</div>
 <script type="text/javascript">
  document.getElementById('followupp').value = "<?php echo $_GET['followupp'];?>";
</script>

	 <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
 </form>
 <br><br>
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table class="table">
  <tr class="AdminTableHeader">
    <td>S.No </td>
    <td>Followup</td>  		
    <td>Client Name</td>  	
	<td>Contact Nos.</td> 
    <td>Assign To</td>   	
	<td>Remarks(*)</td>			 
	<td>Move to Billing List</td>
	 
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td><?php echo $rsclient['task_name'] ; ?></td>   	
	<td><?php echo substr($rsclient['ac_name'], 0, 25).' - '.$rsclient['group_code'] ; ?></td> 
    
    <td><?php echo $rsclient['contactno'] ; ?></td> 
       <td><?php echo $rsclient['empname'] ; ?></td>		
	<td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	  
	 
    <td> 
	 <button class="btnEditAction" name="billing"
      onClick="callCrudAction('billing','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Billing List</button> 
      </td>
	 
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table> 
</div>
 
 
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>
 
 



 <script>
function callCrudAction(action,id,acname) {
	$("#loaderIcon").show();
	
     
	if(action=="billing"){
	if(confirm("Are you sure you want to Move this?")){      
		 
    }
    else{
		 
		$("#loaderIcon").hide();
        return false;
    }
    }
	
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetotask1")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {			 
			case "billing":
				$('#message_'+id).fadeOut();
				$("#txtmessage").val(acname+' Sucessfully Moved ');				
			break;
		}
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
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
		 //	alert(data);
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname+' Remarks Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
 


 

 
 <script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"});  
});	 
</script>
<?php include 'bodyfooter.php';?>