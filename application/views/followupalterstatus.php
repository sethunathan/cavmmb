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
          <a href="<?php echo base_url(); ?>Followup">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
 
	 
 <br><br>
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table class="table">
  <tr class="AdminTableHeader">
    <td>S.No </td>
    <td>Followup</td>  		
    <td>Client Name</td>  	
	<td>Contact Nos.</td> 
    <td>Folw.Assign To</td>
    <td>Status</td>   	
	<td>Remarks</td>
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td><?php echo $rsclient['task_name'] ; ?></td>   	
	<td><?php echo substr($rsclient['ac_name'], 0, 25); ?></td> 
    <td><?php echo $rsclient['contactno'] ; ?></td> 
    <td><?php echo $rsclient['empname'] ; ?></td>
	<td><?php echo $rsclient['movetotask'] ; ?></td>
    <td><?php echo $rsclient['remarks'] ; ?></td>		
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
		 
		 <div  hidden style="display: none;" id="task_code">  <h4>     
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div> </h4>
		 
		<div id="acname">  <h4>     
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div> </h4>
		 
			 <div class="form-group has-feedback"> 
			 
	  <select class="form-control" id="reminder" name="reminder">	
		<?php
			 		
            $this->db->order_by('reminder_code');
             $this->db->where('active',1);			
            $this->db->select('remindername,reminder_code');                      
            $castxe= $this->db->get('masreminder');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->reminder_code'";                    
				    echo ">$data->remindername</option>";
				} 
		?> 
       				
		</select>
      </div>
		
		 <div class="form-group has-feedback">
        <input type="text" id="remarks" value ="" class="form-control"		 
		placeholder="Remarks">
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
                <tr  class="table-row"><td>Purchae</td> </tr><tr>
  
	<td class="ppreve"><input type='text' value=""   name='ppreve' id='ppreve'></td>   
    <td class="pcurrent"><input type='text'  name='pcurrent' id='pcurrent'></td> 
	<td class="pnext"><input type='text'  name='pnext' id='pnext'></td> 
    <td class="total-combat"><input type='text' readonly name='ptotal' id='ptotal'></td>   	
  </tr> 
     <tr  class="table-row"><td>Sales</td> </tr><tr>
	<td class="combat"><input type='text'  value=""  name='spreve' id='spreve'></td>   
    <td class="combat"><input type='text'  name='scurrent' id='scurrent'></td> 
	<td class="combat"><input type='text'  name='snext' id='snext'></td> 
    <td class="total-combat"><input type='text' readonly name='stotal' id='stotal'></td>   	
  </tr> 
               
            </tbody>
          </table>
		  <br>
		  
	
	
	   <?php //enterylevel 4.MOVE TO ENTRY LEVEL  ?>
	  <button type="button" id="movetoentrylevelmodal" data-dismiss="modal"  class="btn btn-primary" name="movetoentrylevelmodal"
        onClick="saveentrylevelmodal('movetoentrylevelmodal',
		document.getElementById('id').value,		
		document.getElementById('remarks').value,
	    document.getElementById('task_code').value)
		">
        Move to Entry Level
	  </button> 
	</div>
	
	<?php //SaveReminder //1.NOT ATTENDED/2.ATTENDED	  ?>
	 <div  id="savereminer">
       <div  name="divreminder_date" id="divreminder_date" class="form-group has-feedback">	 
           <input name="reminder_date"  id="reminder_date"  value ="" class="daterange" type="text"  placeholder="Next Reminder Date">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>	
		<button type="button" id="saveremr" data-dismiss="modal"  class="btn btn-primary" name="postpone"
        onClick="SaveReminder('postpone',document.getElementById('id').value,document.getElementById('id').value)">
        Postpone
	   
    </div>
		<?php //savenil 3.savenil  ?>
	<button type="button" id="savenil" data-dismiss="modal"  class="btn btn-primary" name="savenil"
        onClick="savenil(document.getElementById('id').value,
	    document.getElementById('remarks').value)">
        Move to Billing Level
	</button> 

	
	
	
     
	
	
        </div>
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 

 

</div>
 
<?php //include 'clarificationmodal.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>
 
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
function saveentrylevel(action,id,remarks) {
	$("#loaderIcon").show();
	if(action=="movetoentrylevel"){
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
    }
    var acname=$('#acname').text();	
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetoentrylevel")?>',
	data:{ action:action,id:id,remarks:remarks},
	type: "POST",
	success:function(data){
		switch(action) {
			 
            case "movetoentrylevel": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(acname+'Sucessfully moved to Task List');
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
function saveentrylevelmodal(action,id,remarks) {
	$("#loaderIcon").show();
	if(action=="movetoentrylevelmodal"){
	if(confirm("Are you sure you want to Move this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
    }
	var reminder_code=$("#reminder").val();
    var reminder_date=$('#reminder_date').val();	
	var task_code=$('#task_code').text();	
	
	var ppreve =$("#ppreve").val();
	var pcurrent=$("#pcurrent").val();
	var pnext=$("#pnext").val();
    var spreve=$("#spreve").val();
    var scurrent=$("#scurrent").val();
    var snext=$("#snext").val();
    var acname=$('#acname').text();
	var receipt_mode = $(".receipt_mode:checked").val();
	 
     
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetoentrylevelmodal")?>',
	data:{ action:action,id:id,remarks:remarks,reminder_code:reminder_code,
	reminder_date:reminder_date,task_code:task_code,
	ppreve:ppreve,pcurrent:pcurrent,pnext:pnext,
	spreve:spreve,scurrent:scurrent,snext:snext,
	receipt_mode:receipt_mode
	},
	type: "POST",
	success:function(data){
		switch(action) {
			 
            case "movetoentrylevelmodal": 
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(acname+'Sucessfully moved to Entry List');
				$("#txtmessage").val(data+'Sucessfully moved to Entry List');
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
function callCrudAction(action,id,acname) {
	$("#loaderIcon").show();
	
    //$("#txtmessage").val('Updating'+id);
	if(action=="future"){
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
			case "future":
				$('#message_'+id).fadeOut();
				$("#txtmessage").val(acname+' Sucessfully Reversed ');				
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
function savenil(id,remarks) {	 
	var task_code=$('#task_code').text();		 
	var remarks=$('#remarks').val();   
    var reminder_code=$("#reminder").val();  
	jQuery.ajax({
	url: '<?php echo site_url("followup/savenil")?>',
	data:{  id:id,task_code:task_code, remarks:remarks,reminder_code:reminder_code},
	type: "POST",
	success:function(data){		 
		 $("#txtmessage").val(data);		
	},
	error: function (request, status, error) {
       //   alert(request.responseText);
		 $("#txtmessage").val(request.responseText);
    }
	//error:function (){}
	}); $("#loaderIcon").hide();
}


</script> 

<script>
function SaveReminder(action,id) {

	 
	var task_code=$('#task_code').text();	
	var reminder=$("#reminder").val();
    var reminder_date=$('#reminder_date').val();	
	var remarks=$('#remarks').val();    

	jQuery.ajax({
	url: '<?php echo site_url("followup/savereminder")?>',
	data:{ action:action,id:id,task_code:task_code,reminder_code:reminder,reminder_date:reminder_date,remarks:remarks},
	type: "POST",
	success:function(data){
		switch(action) {			 		
			case "postpone":				 
				$("#txtmessage").val(task_code+' Sucessfully Postponed ');
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


<script type="text/javascript">
 
$(document).ready(function(){
    $('#exampleModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
        
	    var  id = $(e.relatedTarget).data('id');  
		var  name = $(e.relatedTarget).data('name');  
		var  remarks = $(e.relatedTarget).data('remarks');    
		var  task_code = $(e.relatedTarget).data('task_code');
		$("#reminder_date").val('');
		$('#remarks').val(remarks);
		
		$('#acname').html(name);		
		$('#id').html(id);
		$('#task_code').html(task_code);
		 
		$.ajax({
		url: '<?php echo site_url("followup/getreminder")?>',
		type: "POST",
		data:'id='+id+'&task_code='+task_code, 
		success: function(data){
			 var dataa = data.split("$");		
          		 
            $('#reminder').val(dataa[0]);
		//	  alert(dataa[1]);	
			if (dataa[0]==1) { $('#divreminder_date').hide();}
			if (dataa[0]==2) { $('#divreminder_date').show();}
			if (dataa[0]==3) { $('#divreminder_date').hide();}
			if (dataa[0]==4) { $('#divreminder_date').hide();}
		    $("#reminder_date").val(dataa[1]);	       
			$("#remarks").val(dataa[2]);
			$("#receipt_mode").val(dataa[3]);
			 
			if (dataa[3] == '1')
              $('#tablef').find(':radio[name=receipt_mode][value="1"]').prop('checked', true);
            if (dataa[3] == '2')
              $('#tablef').find(':radio[name=receipt_mode][value="2"]').prop('checked', true);
		   if (dataa[3] == '3')
              $('#tablef').find(':radio[name=receipt_mode][value="3"]').prop('checked', true);
		    
	        $("#ppreve").val(dataa[4]);
			$("#pcurrent").val(dataa[5]);
			$("#pnext").val(dataa[6]);			
			$("#spreve").val(dataa[7]);
			$("#scurrent").val(dataa[8]);
			$("#snext").val(dataa[9]);
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
$(document).ready(function() {
//NIl NOT ATTENDED-AFTER TWO DAYS //MOVE TO ENTRY LEVEL 
	
	$('#savenil').hide();
	$('#savereminer').show(); 
	$('#tablef').hide();
	$('#divreminder_date').hide();
	
    $('select#reminder').change(function() {
		var sle=$("#reminder").prop('selectedIndex');
		if (sle==0)
		{
			$('#savereminer').show();
			$('#tablef').hide();
			$('#savenil').hide();
			$('#divreminder_date').hide();
		}
		else if (sle==1)
		{
			 
			$('#savereminer').show();
			$('#tablef').hide();
			$('#savenil').hide();
			$('#divreminder_date').show();
		}
		else if (sle==2)
		{
			 $('#savenil').show();
			$('#savereminer').hide();
			$('#tablef').hide(); 
			$('#divreminder_date').hide();
			
			
		}else if (sle==3)
		{
			 $('#savenil').hide();
			$('#savereminer').hide();
			$('#tablef').show(); 
			$('#divreminder_date').hide();
			
			
		}
		else
		{
			 
			$('#tablef').show();
			$('#savenil').hide();
			$('#savereminer').hide();
			$('#divreminder_date').hide();
		}
    });
	 
	
});
</script>
 <script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"});  
});	 
</script>
<?php include 'bodyfooter.php';?>