<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<a target="_blank" href="https://www.tdscpc.gov.in/app/login.xhtml" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> T.D.S LOGIN</a>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>tdsfollowup/task">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>tdsfollowup/task" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="taskk" name="taskk">		     
		<?php  
		    $this->db->where('job_code', 6);
            $this->db->order_by('task_code','desc');					
            $this->db->select('task_name,task_code'); 
            $this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left'); 			
            $castxe= $this->db->get('trntask1');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->task_code'"; 
                   	if($data->task_code==$taskk) {echo "selected";}					
				    echo ">$data->task_name</option>";
				} 
		?>  
		</select>
</div>
 <script type="text/javascript">
  document.getElementById('taskk').value = "<?php echo $_GET['taskk'];?>";
</script>

	 <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
 </form>
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table class="table">
  <tr class="AdminTableHeader">
    <td>S.No </td> 
    <td>Client Name</td> 
    <td>Task Name</td>  	 	
	<td>Contact Nos.</td>
    <td>Remarks(*)</td>
    <td>T.A.N.(*)</td>	
	<td>Traces PWD(*)</td>
	 
    <td>Move to Verification</td>	 	
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
	onBlur="savegstaccmasaccounts(this,'tanno','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['tanno'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'treacespwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['treacespwd'] ; ?></td>
	
	
	
   
 
      
	 <td>
	   <button type="button" class="btn btn-primary"         	 
			data-id="<?php echo $rsclient['id']; ?>"  
			data-name="<?php echo $rsclient['ac_name']; ?>" 
            data-remarks="<?php echo $rsclient['remarks']; ?>"
			data-toggle="modal" data-target="#exampleModal">
       Move Verification Level
     </button> 
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
</div>


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
		 
		  
		 
		<div id="acname">  <h4>     
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div> </h4>
		 
			 
		
		 <div class="form-group has-feedback">
        <input type="text" id="remarks" value ="" class="form-control"		 
		placeholder="Remarks">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> 
 	
	    
	   <div class="txt-heading"   id="tablef">
			  <div>Verification Assingn to</div>
	   <select class="form-control" id="emp_code" name="emp_code">
      
		<?php  
		    $branch_code=$this->session->userdata('branchcode');
			$emp_code=$this->session->userdata('emp_code');
			$this->db->order_by('empname');
            $this->db->where('branch_code', $branch_code);	
            $this->db->where('emp_code!=', $emp_code);
            $this->db->where('active', 1);
              $this->db->where('isadmin', 0);				
            $this->db->select('empname,emp_code');                      
            $castxe= $this->db->get('masemp');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->emp_code'"; 
				    echo ">$data->empname</option>";
				} 
		?>  
		</select>			 
			  
		  <br>
	  <button type="button" id="movetoverificationlevelmodal" data-dismiss="modal"  class="btn btn-primary" name="movetoentrylevelmodal"
        onClick="saveverificationlevelmodal('movetoverificationlevelmodal',
		document.getElementById('id').value,		
		document.getElementById('remarks').value )
		">
        Move to Verification Level
	  </button> 
	</div>
	
        </div>
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 

 

</div>

<script type="text/javascript">
 
$(document).ready(function(){
    $('#exampleModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
        
	    var  id = $(e.relatedTarget).data('id');  
		var  name = $(e.relatedTarget).data('name'); 		  
		var  remarks = $(e.relatedTarget).data('remarks');    
		$('#remarks').val(remarks);		
		$('#acname').html(name);		
		$('#id').html(id);
        $('#id').val(id);
     });
	  
});
 
</script>


 <script>
function saveverificationlevelmodal(action,id,remarks) {
	$("#loaderIcon").show();
	if(action=="movetoverificationlevelmodal"){
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
    }
	 
	var emp_code=$("#emp_code").val();
    
	      
	jQuery.ajax({
	url: '<?php echo site_url("tdsfollowup/movetoverificationlevelmodal")?>',
	data:{ action:action,id:id,emp_code:emp_code,remarks:remarks
	},
	type: "POST",
	success:function(data){
		switch(action) {
			 
            case "movetoverificationlevelmodal": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();				 
				$("#txtmessage").val(data+'Sucessfully moved to Verification List');
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
	url: '<?php echo site_url("tdsfollowup/movetotask1")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
			
			 
			case "verification":
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
		url: '<?php echo site_url("tdsfollowup/savegstaccmasaccounts")?>',
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
		url: '<?php echo site_url("tdsfollowup/saveremarks")?>',
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