<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<a target="_blank" href="https://services.gst.gov.in/services/login" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> GST LOGIN</a>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>followup/task">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
	
<form action="<?php echo base_url(); ?>followup/task" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="taskk" name="taskk">		     
		<?php  
		   // $this->db->where_in('subjob_code', array('1','3','4','6','12'));	
             $this->db->where('job_code', 4);			   
            $this->db->order_by('task_code','desc');		
             $this->db->join('massubjob', 'trntask1.subjob_code = massubjob.subjob_code','left');			
            $this->db->select('task_name,task_code');                      
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
<table class="table">
  <tr class="AdminTableHeader">
    <td>S.No </td> 
    <td>Client Name</td> 
    <td>Task Name</td>  	 	
	<td>Contact Nos.</td>	
	<td>GST UID(*)</td>	 <td>GST PWD(*)</td>
	<td>Followup.Staff</td> 
	<td>Done at</td><td>Days</td>
	 <td>Purchase</td>
	 <td>Sales</td>
    <td>Remarks(*)</td>   
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
	onBlur="savegstaccmasaccounts(this,'gstid','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstid'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'gstpwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstpwd'] ; ?></td>
	 <td><?php echo $rsclient['empname'] ; ?></td> 
	
	 <td><?php  echo $last_renewaldate=date("d-m-Y", strtotime($rsclient['followupdoneat'] ));  ?></td>
	 
	 
	 	<td>
<?php 
$current_date = date("d-m-Y");
$datetime1 = new DateTime($last_renewaldate);
$datetime2 = new DateTime($current_date);

$difference = $datetime1->diff($datetime2);
echo '<span style="color:red;text-align:center;">Pending!!!</span>';
echo  $difference->d.' days';
 


?></td> 
	 
	 
	<td><?php echo $rsclient['ppreve'].'/'.$rsclient['pcurrent'] ; ?></td>
	<td><?php echo $rsclient['spreve'] .'/'.$rsclient['scurrent'] ; ?></td>
	
		<td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	
   
	<td>
	   <button type="button" class="btn btn-primary"         	 
			data-id="<?php echo $rsclient['id']; ?>"  
			data-name="<?php echo $rsclient['ac_name']; ?>" 
			data-remarks="<?php echo $rsclient['remarks']; ?>" 	
            data-remarks1="<?php echo $rsclient['remarks']; ?>" 	
            data-task_code="<?php echo $rsclient['task_code']; ?>"			
			data-toggle="modal" data-target="#exampleModal">
       Move To Verification	   </button> 
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
        <input type="text" readonly id="remarks" value ="" class="form-control"		 
		placeholder="Followup Remarks">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
 	    <div class="form-group has-feedback">
        <input type="text" id="remarks1" value ="" class="form-control"		 
		placeholder="Entry Level Remarks">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> 
	    
	<div class="txt-heading"   id="tablef">
			
			 <div>Receipt Mode
		<input type='radio'  class='receipt_mode'  name='receipt_mode'  value= '1' >By Hand</input>
        <input type='radio'  class='receipt_mode'  name='receipt_mode'  value= '2'  checked>By Mail</input>
	    <input type='radio'  class='receipt_mode'  name='receipt_mode'  value= '3' >By Whats App</input>
	</div>	
			  <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                
                <th>Prev.Month</th>
				<th>Current.Month</th>
                <th>Next.Month</th>
				<th>Total</th>
              </tr>
            </thead>
            <tbody>
                <tr  class="table-row"><td>Purchase</td> </tr><tr>
  
	<td class="ppreve"><input type='text' value=""     name='ppreve' id='ppreve'></td>   
    <td class="pcurrent"><input type='text'  name='pcurrent' id='pcurrent'></td> 
	<td class="pnext"><input type='text'  name='pnext' id='pnext'></td> 
    <td class="total-combat"><input type='text'  name='ptotal' id='ptotal'></td>   	
  </tr> 
     <tr  class="table-row"><td>Sales</td> </tr><tr>
	<td class="combat"><input type='text'  value="" readonly name='spreve' id='spreve'></td>   
    <td class="combat"><input type='text'  name='scurrent' id='scurrent'></td> 
	<td class="combat"><input type='text'  name='snext' id='snext'></td> 
    <td class="total-combat"><input type='text' readonly name='stotal' id='stotal'></td>   	
  </tr> 
               
            </tbody>
          </table>
		  <br>
		  
	  <div>Entry Assingn to</div>
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
        </div>
		 
	   
	  <button type="button" id="movetoverificationlevelmodal" data-dismiss="modal"  class="btn btn-primary" name="movetoentrylevelmodal"
        onClick="saveverificationlevelmodal('movetoverificationlevelmodal',
		document.getElementById('id').value,		
		document.getElementById('remarks1').value,
	    document.getElementById('task_code').value)
		">
        Move to Verification Level
	  </button>

     <button type="button" id="" data-dismiss="modal"  class="btn btn-primary" name="movetoentrylevelmodal"
        onClick="saveverificationlevelmodal('reversetofollowplevelmodal',
		document.getElementById('id').value,		
		document.getElementById('remarks1').value,
	    document.getElementById('task_code').value)	">    Reverse to Followup 
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
		var  remarks = $(e.relatedTarget).data('remarks');    
		var  remarks1 = $(e.relatedTarget).data('remarks1');    
		var  task_code = $(e.relatedTarget).data('task_code');
		$('#remarks1').val(remarks1); 
		$('#remarks').val(remarks);		
		$('#acname').html(name);		
		$('#id').html(id);
		$('#task_code').html(task_code);
		 
		$.ajax({
		url: '<?php echo site_url("followup/getentrylevelreminder")?>',
		type: "POST",
		data:'id='+id+'&task_code='+task_code, 
		success: function(data){
			 var dataa = data.split("$");
			$("#remarks").val(dataa[0]);
			if (dataa[1] == '1')
              $('#tablef').find(':radio[name=receipt_mode][value="1"]').prop('checked', true);
            if (dataa[1] == '2')
              $('#tablef').find(':radio[name=receipt_mode][value="2"]').prop('checked', true);
		   if (dataa[1] == '3')
              $('#tablef').find(':radio[name=receipt_mode][value="3"]').prop('checked', true);
		    //alert(dataa[2]);
	        $("#ppreve").val(dataa[2]);
			$("#pcurrent").val(dataa[3]);
			$("#pnext").val(dataa[4]);			
			$("#spreve").val(dataa[5]);
			$("#scurrent").val(dataa[6]);
			$("#snext").val(dataa[7]);
			$("#snext").val(dataa[7]);
			//var stotal=  Number(dataa[5) + Number(dataa[6]); //+dataa[5]++dataa[6];
			//$("#stotal").val(stotal);
			
			$("#remarks").val(dataa[8]);
			$("#txtmessage").val(data);	
		},	error: function (request, status, error) {
        //alert(request.responseText); 
 $("#txtmessage").val(request.responseText);	
		} 
   });
    $('#id').val(id);
     });
	  
});
 
</script>
<script>
function saveverificationlevelmodal(action,id,remarks1) {
	$("#loaderIcon").show();
	if(action=="movetoverificationlevelmodal"){
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
	}
	if(action=="reversetofollowplevelmodal"){
	if(confirm("Are you sure you want to Reverse this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
	
    }
	//alert(action);
	//var reminder_code=$("#reminder").val();
  //  var reminder_date=$('#reminder_date').val();	
	var task_code=$('#task_code').text();	
	
	var ppreve =$("#ppreve").val();
	var pcurrent=$("#pcurrent").val();
	var pnext=$("#pnext").val();
    var spreve=$("#spreve").val();
    var scurrent=$("#scurrent").val();
    var snext=$("#snext").val();
    var acname=$('#acname').text();
	
	var emp_code=$("#emp_code").val();
	//alert(emp_code);
	var receipt_mode = $(".receipt_mode:checked").val();
	 
     
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetoverificationlevelmodal")?>',
	data:{ action:action,id:id,remarks1:remarks1,task_code:task_code,
	ppreve:ppreve,pcurrent:pcurrent,pnext:pnext,
	spreve:spreve,scurrent:scurrent,snext:snext,
	receipt_mode:receipt_mode,emp_code:emp_code
	},
	type: "POST",
	success:function(data){
		switch(action) {
			 
            case "movetoverificationlevelmodal": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(acname+'Sucessfully moved to Verification List');
				$("#txtmessage").val(data+'Sucessfully moved to Verification List');
			break	;		
			case "reversetofollowplevelmodal": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(acname+'Sucessfully  Reversed ');
				$("#txtmessage").val(data+'Sucessfully Reversed');
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

<script>
$(function() {
    $("#pcurrent, #pnext").on("keydown keyup", psum);
	$("#scurrent, #snext").on("keydown keyup", ssum);
	function psum() {
	$("#ptotal").val(Number($("#pcurrent").val()) + Number($("#pnext").val())+ Number($("#ppreve").val()));
	 
	}
	function ssum() {
	$("#stotal").val(Number($("#scurrent").val()) + Number($("#snext").val())+ Number($("#spreve").val()));
	 
	}
});
</script>

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
	url: '<?php echo site_url("followup/movetotask1")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;			
			case "delete":
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
		url: '<?php echo site_url("followup/savegstaccmasaccounts")?>',
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
		url: '<?php echo site_url("followup/saveremarks")?>',
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