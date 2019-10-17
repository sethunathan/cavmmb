<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<a target="_blank" href="https://incometaxindiaefiling.gov.in/home" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> I.T. LOGIN</a>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>itfollowup/verification">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>itfollowup/verification" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="verificationn" name="verificationn">		     
		<?php  
		    $this->db->where('job_code', 3);
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
    <td>Remarks(*)</td>
    <td>PAN(*)</td>	
	<td>I.T. PWD(*)</td>
    <td>Move to Billing</td>
    <td>Move to Billing-New</td>	
    <td>Move to Payment</td>	
	<td>Reverse to Followup</td>
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>     
    <td><?php echo $rsclient['ac_name'].' - '.$rsclient['group_code'] ; ?></td>   
	<td><?php echo $rsclient['task_name'] ; ?></td>
    <td><?php echo $rsclient['contactno'] ; ?></td>
    <td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	
    <td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'pan','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['pan'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'itpwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['itpwd'] ; ?></td>
   
	 
	<td>
	   <button type="button" class="btn btn-primary"         	 
			data-id="<?php echo $rsclient['id']; ?>"  
			data-name="<?php echo $rsclient['ac_name']; ?>" 
            data-task_code="<?php echo $rsclient['task_code']; ?>"			
			data-toggle="modal" data-target="#exampleModal">
       Move To Billing </button> 
	 </td>
	 <td>
	  <?php if ($i==1)
    	 { ?>
      <button type="button" class="btn btn-primary"              	
			data-id="<?php echo $rsclient['id']; ?>" 
			data-childtaskcode="<?php echo $rsclient['childtask_code']; ?>" 			
            data-acname="<?php echo $rsclient['ac_name']; ?>"
			data-taskname="<?php echo $rsclient['task_name']; ?>"
            data-taskcode="<?php echo $rsclient['task_code']; ?>" 
            data-accode="<?php echo $rsclient['ac_code']; ?>" 
            data-subjobcode="<?php echo $rsclient['subjob_code']; ?>"	
			data-toggle="modal" 
			data-target="#itModal">
			
      Move to Billing List-Test
     </button> 
       <?php }?>
    </td>
	 <td> 
	 <button class="btnEditAction" name="payment"
      onClick="callCrudAction('payment','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move  to Payment</button> 
    </td>
	<td> 
	 <button class="btnEditAction" name="reverse"
      onClick="callCrudAction('reverse','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse to Followup</button> 
    </td>
  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>

 <?php include 'movetobillit.php';?>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
		
        <div  style="display: none;" id="id">       
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>	
		 
		 <div  hidden style="display: none;" id="task_code">  <h4>     
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div> </h4>
		 
		<div id="acname">  <h4>     
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div> </h4>
		 
			  
		 <div class="form-group has-feedback">
        <input type="text" id="remarks4" value ="" class="form-control"		 
		placeholder="I.T. Remarks">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
 	      <div class="form-group has-feedback">
        <input type="text" id="itreturndate"   class="form-control"		 
		placeholder="Return Date (Format-dd/mm/yyyy- ex:31/12/2018)">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
 
		
	<div class="txt-heading"   id="tablef">		  
	  <div>Entry Assingn to</div>
	   <select class="form-control" id="verified" name="verified">
       	   
		 <option value='1'>Un-Verified</option>;
         <option value='2'>Verified</option>;	    
		</select>	
        </div>
		 <br>
	   
	  <button type="button" id="movetoverificationlevelmodal"   class="btn btn-primary" 
     	  name="movetoentrylevelmodal"
        onClick="saveverificationlevelmodal('movetoverificationlevelmodal',
		document.getElementById('id').value,		
		document.getElementById('itreturndate').value,
		document.getElementById('remarks4').value,
	    document.getElementById('verified').value)
		">
        Move to I.T. Verification Level
	  </button>

    
	</div>
	
	
		
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 

 

</div>



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script type="text/javascript"> 
$(document).ready(function(){
    $('#exampleModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
        
	    var  id = $(e.relatedTarget).data('id');  
		var  name = $(e.relatedTarget).data('name'); 
		var  itreturndate = $(e.relatedTarget).data('itreturndate'); 
	    var todaydate = new Date();
var day = todaydate.getDate();
var month = todaydate.getMonth() + 1;
if (month < 10) { month = '0' + month; }
var year = todaydate.getFullYear();
var datestring = day + "/" + month + "/" + year;
 $('#itreturndate').val(datestring);
		$('#acname').html(name);		
		$('#id').html(id);
		$('#task_code').html(task_code);
       $('#id').val(id);
     });
	  
});
 
</script>
<script>
function saveverificationlevelmodal(action,id,itreturndate,remarks4,verified) {
	$("#loaderIcon").show();
	var task_code=$('#task_code').text();
    var acname=$('#acname').text();	
	var verified=$("#verified").val();
	
	 
     
	jQuery.ajax({
	url: '<?php echo site_url("itfollowup/movetoitverification")?>',
	data:{ action:action,id:id,remarks4:remarks4,task_code:task_code,
	verified:verified,itreturndate:itreturndate
	},
	type: "POST",
	success:function(data){
		switch(action) {
			 
            case "movetoverificationlevelmodal": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(acname+'Sucessfully moved to I.T. Verification List');
				$("#txtmessage").val(data+'Sucessfully moved to I.T. Verification List');
			break	;	
			 
		}
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
		 $("#txtmessage").val(request.responseText);
    }
	
	});
}
</script> 


<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<script>
function callCrudAction(action,id,acname) {
	$("#loaderIcon").show(); 
	 
	if(confirm("Are you sure you want to Move this?")){     
		 
    }
    else{
		 
		$("#loaderIcon").hide();
        return false;
    }
     
	
	jQuery.ajax({
	url: '<?php echo site_url("itfollowup/movetotask2")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
		 
			case "billing":
				$('#message_'+id).fadeOut();				
			break;
			case "payment":
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
		url: '<?php echo site_url("itfollowup/savegstaccmasaccounts")?>',
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
		url: '<?php echo site_url("itfollowup/saveremarks")?>',
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