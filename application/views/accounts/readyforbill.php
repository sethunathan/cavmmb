<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnEditAction1{background-color:#2FC332;border:0;padding:2px 10px;color:yellow;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>accounts">
            <i class="fa fa-dashboard"></i> <span><-Back</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
</li>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>accounts/readyforbill">
            <i class="fa fa-dashboard"></i> <span>Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
</li>

		<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form  id="test" action="<?php echo base_url(); ?>accounts/readyforbill" method="post">

<div class="form-group has-feedback table-responsive">   
	  <select class="form-control" id="accode" name="accode">
         <option selected value="0">All </option>		  
		<?php  
		   
			 
            $this->db->order_by('ac_name');
			//$branchcode = $this->session->userdata('branchcode');
			//$this->db->where('group_code', $branchcode);
            $this->db->select('ac_name,ac_code');                      
            $castxe= $this->db->get('accmasaccounts');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->ac_code'"; 
                   	if($data->ac_code==$accode) {echo "selected";}					
				    echo ">$data->ac_name</option>";
				} 
		?>  
		</select>
</div>

<div class="form-group has-feedback table-responsive">   
	  <select  class="form-control" id="followupp" name="followupp">		
        <option selected value="0">All </option>	  
		<?php  
		   
			if($followupp)
				{
				//	 $this->db->where('trntask1.task_code', $followupp);	
					}	           	
           // $this->db->where('job_code', 4);	
            $this->db->order_by(' task_code,massubjob.subjob_code');		   
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


<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script type="text/javascript"> 
$("#accode").select2({ theme: "classic",  placeholder: "Select a Ac Name"});
$("#followupp").select2({ theme: "classic",  placeholder: "Select a Ac Name"});
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
	<td>User ID</td> 
	<td>Password</td> 
    <td>Assign To</td>   	
	<td>Remarks*</td>
	<td>Generate Bill</td>
	 
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td><?php echo $rsclient['task_name'] ; ?></td>   	
	<td><?php echo substr($rsclient['ac_name'], 0, 25); ?></td>
    <td><?php echo $rsclient['contactno'] ; ?></td> 
    <td><?php echo $rsclient['gstid'] ; ?></td> 
    <td><?php echo $rsclient['gstpwd'] ; ?></td> 
    <td><?php echo $rsclient['empname'] ; ?></td>    
    <td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?>
	</td>	
	 <td>
	<button type="button" class="btn btn-primary"              	
			data-id="<?php echo $rsclient['id']; ?>" 
            data-acname="<?php echo $rsclient['ac_name']; ?>"
			data-taskname="<?php echo $rsclient['task_name']; ?>"
            data-taskcode="<?php echo $rsclient['task_code']; ?>" 
            data-accode="<?php echo $rsclient['ac_code']; ?>" 
            data-subjobcode="<?php echo $rsclient['subjob_code']; ?>"	
			data-toggle="modal" 
			data-target="#exampleModal">
      Generate Bill
     </button> 
	 
      </td> 
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table> 
</div>
 
 <script>
var p1 = "success";
</script>


 <div class="modal fade" id="exampleModal"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
		
        
		<div  style="display:none;" class="form-group has-feedback">
            <div>Task #</div><input type="text" readonly id="id" name="id"  value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		 <div  style="display:none;" class="form-group has-feedback">
           <div>Task Code</div><input type="text" readonly id="task_code" name="task_code" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		<div   style="display:none;" class="form-group has-feedback">
           <input type="text" readonly id="acname" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div  style="display: none;  class="form-group has-feedback">
           <div>AC Code</div><input type="text" readonly id="accode" name="accode" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div  style="display:none;" class="form-group has-feedback">
           <div>Sub Job</div><input type="text" readonly id="subjobcode" name="subjobcode" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
          <div class="txt-heading"   id="tablef">
		  <br>		 
		  
	  <div> 
	  <input type="text" readonly   value ="Select Company" class="form-control"> 
	      <div class="form-group has-feedback"> 
		<?php
			 		
            $this->db->order_by('comp_id');					
            $this->db->select('comp_id,comp_name');                      
            $castxe= $this->db->get('mascompany');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<input type='radio' name='comp_id'  id='$data->comp_id' class='comp_id' value='$data->comp_id'";
                    echo "checked";					
				    echo ">$data->comp_name</input>";					
				} 
		?>  
		 
      </div> 
	  </div>
	     
		<div>Current Task</div>
        <div class="form-group has-feedback">
           <input type="text" readonly id="task_name" value ="" class="form-control">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 	
            
        <div  class="form-group has-feedback">
		     <input type="text" readonly   value ="Attach Next Task-Yes/No" class="form-control">
           <input type="radio" value="100"  checked name="nextbill" >Yes 
		   <input type="radio" value="101"  name="nextbill">No<br/>   
        </div>
		
		<style>
.cont {
  border-style: solid;
  border-color: coral;
}
		</style>
		<div   class="cont"  id="nexttaskyes">
		<div >
		     <?php include 'paymentlistaltersubfile.php'; ?> 
			 <br/>
		</div>	</div>	
		
		<div>Price</div>
        <div class="form-group has-feedback">
           <input type="text"   id="amount"  name="amount" value ="" class="form-control"	placeholder="Price">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 		
		<div id="head" style="display:none;">
		
			 				
		<div>S.A.C</div>	
        <div class="form-group has-feedback">
           <input type="text"  id="sac"  name="sac"  value ="" class="form-control"	placeholder="S.A.C.">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		<div>Tax Per</div>
        <div class="form-group has-feedback">
           <input type="text"  id="taxper" name="taxper" value ="" class="form-control"	placeholder="Tax Per">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		<div style="display: none;">Tax Per-GST
        <div class="form-group has-feedback">
           <input type="text"  id="taxpergst" name="taxpergst" value ="" class="form-control"	placeholder="Tax Per GST">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		</div>
		
		<div>C.G.S.T.</div>
        <div class="form-group has-feedback">
           <input type="text"  readonly  id="cgst"  name="cgst" value ="" class="form-control"	placeholder="CGST Amount">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		<div>S.G.S.T.</div>
        <div class="form-group has-feedback">
           <input type="text"  readonly  id="sgst" name="sgst" value ="" class="form-control"	placeholder="SGST Amount">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		
		<div>Round off</div>
        <div class="form-group has-feedback">
           <input type="text" readonly  id="roundoff" name="roundoff" value ="" class="form-control"	placeholder="Round Off">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		</div>
		
		<div>Amount</div>
        <div class="form-group has-feedback">
           <input type="text" readonly  id="netval" name="netval" value ="" class="form-control"	placeholder="Amount">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
		
		
    	
        <div>Remarks</div>		
		<div class="form-group has-feedback">
           <input type="text"  id="remarks" name="remarks" value ="" class="form-control"	placeholder="Remarks">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
	   
<button 
	type="button" 
	id="movetoverificationlevelmodal" 
	data-dismiss="modal"  
	class="btn btn-primary" 
	name="movetoentrylevelmodal"
    onClick="saveverificationlevelmodal('movetoverificationlevelmodal',document.getElementById('id').value,document.getElementById('remarks').value,document.getElementById('task_code').value)"> Save</button>

</div>
 
	
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 
</div>


 <script>
function saveverificationlevelmodal(action,id,remarks1) {
	$("#loaderIcon").show();
	if(action=="movetoverificationlevelmodal"){
	if(confirm("Are you sure you want to Save this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
	}
	
    var id=$('#id').val();	
	var task_code=$('#task_code').val();
	var accode=$('#accode').val();
    var remarks=$('#remarks').val();	
	
	var nexttask= $('#e1 :selected').val();
	 
	// var nexttask = $('#e2').find(":selected").val();
	 
	//alert(nexttask);exit();
	
	var amount =$("#amount").val();
	var taxper=$("#taxper").val();
	var roundoff=$("#roundoff").val();
	var taxpergst=$("#taxpergst").val();
    var cgst=$("#cgst").val();
    var sgst=$("#sgst").val();
    var netval=$("#netval").val();    
	var comp_id = $(".comp_id:checked").val();
	 
   //  alert(taxper);alert(taxpergst);alert(amount);alert(cgst);alert(cgst);alert(netval);alert(comp_id);alert(remarks);
	jQuery.ajax({
	url: '<?php echo site_url("accounts/savebill")?>',
	data:{ comp_id:comp_id,id:id,remarks:remarks,task_code:task_code,
	amount:amount,taxper:taxper,taxpergst:taxpergst,roundoff:roundoff,
	cgst:cgst,sgst:sgst,netval:netval,accode:accode,nexttask:nexttask
	},
	type: "POST",
	success:function(data){		        
				$('#message_'+id).fadeOut();				
				$('#message_'+id).hide();
				$("#txtmessage").val(netval+'Bill Saved Sucessfully');
				$("#txtmessage").val(data+'Bill Saved Sucessfully');
		        $("#loaderIcon").hide();
				
	},
	error: function (request, status, error) {
        alert(request.responseText);
		 $("#txtmessage").val(request.responseText);
    }	
	});
	
	
}
</script> 

<script type="text/javascript">
 
$(document).ready(function(){
	/////////////////////
	$("input:radio").click(function() {
	 
    if($(this).val() == "1") {
		
      $("#head").show();
      $("#bod").hide();
	   psum();
    } else {
      $("#head").hide();
      $("#bod").show();
	     psum();
	  
    }
	
	if($(this).val()=="100")
	{
		$("#nexttaskyes").show();
		 
	}
	else
	{
		$("#nexttaskyes").hide();
	}
	
	
  });
  
  
    $("#amount, #taxper").on("keydown keyup", psum); 
	function psum() {	
	 

    var taxper=$('#taxper').val();	 
	var taxper1 = parseFloat(taxper);
	 
	var taxamt=0;
	var amount=$('#amount').val();
	
   	if (taxper1>0)
    {
			 
			    taxper=(taxper1/2)/100;
              	//taxper = taxper.toFixed(2);		 
			    $('#taxpergst').val(taxper);
              		 
			     taxamt=amount*taxper;
				 taxamt = taxamt.toFixed(2);
			
			    $('#cgst').val(taxamt);
			    $('#sgst').val(taxamt);
			 
	     //    $("#netval").val(Number($("#amount").val()) + Number($("#cgst").val())+ Number($("#sgst").val()));
	     }
		 else
		 {
			 taxper=0;
			 $('#taxpergst').val(taxper);
			 taxamt=0;			
			 $('#cgst').val(taxamt);
			 $('#sgst').val(taxamt) 
	}
	
    var comp_id = $(".comp_id:checked").val();
	 
	if (comp_id==2)
    {
		taxamt=0;
		$('#cgst').val(taxamt);
		$('#taxper').val(taxamt);
		$('#sgst').val(taxamt);
        $('#taxpergst').val(taxamt);			 
	}
	var roundoff=0;
   	var netval=Number($("#amount").val()) + Number($("#cgst").val())+ Number($("#sgst").val());
	
	var netval1=netval;
	netval = netval.toFixed(0);
	roundoff=netval-netval1;
	roundoff= roundoff.toFixed(2);;
	
	$('#roundoff').val(roundoff);
	$('#netval').val(netval);
	}	 
	/////////////////////////
	
	
	
    $('#exampleModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
       
	  // $("#2").prop("checked", true);
		
		//document.forms["test"]["2"].checked=true;
		
		$("input:radio").click(function() {
	 
    if($(this).val() == "1") {
		
      $("#head").show();
      $("#bod").hide();
	   ;
    } else {
      $("#head").hide();
      $("#bod").show();
	      
	  
    }
  });
    var  id = $(e.relatedTarget).data('id');  
	var  subjobcode =$(e.relatedTarget).data('subjobcode');
	var  task_code = $(e.relatedTarget).data('taskcode');
    ////////////////////////UPDATE SELECT 2
	    
	   $.ajax({
		url: '<?php echo site_url("accounts/getselect2task")?>',
		type: "POST",
		data:'subjobcode='+subjobcode+'&task_code='+task_code,  
		success: function(data){
			$('#e1').html(data);
			//alert(data);
		},	error: function (request, status, error)
 	     	{        
               $("#txtmessage").val(request.responseText);	
		   } 
   });
	///////////////////////////////////////
	    
		var  name = $(e.relatedTarget).data('acname'); 
		var  task_name = $(e.relatedTarget).data('taskname'); 
       
        var  accode = $(e.relatedTarget).data('accode'); 
         		
       				 
		$('#acname').val(name);$('#task_code').val(task_code);	$('#task_name').val(task_name);	$('#accode').val(accode);	
		$('#id').html(id);	$('#subjobcode').val(subjobcode);
		
		$.ajax({
		url: '<?php echo site_url("accounts/getbilling")?>',
		type: "POST",
		data:'id='+id+'&task_code='+task_code, 
		success: function(data){
			var dataa = data.split("$");
			$("#sac").val(dataa[0]);			
	        $("#amount").val(dataa[1]);
			$("#taxper").val(dataa[2]);			
			$("#txtmessage").val(data);	
		},	error: function (request, status, error) {
        //alert(request.responseText); 
       $("#txtmessage").val(request.responseText);	
		} 
   });
	 
    ////////////////////////////////
	jQuery.ajax({
	url: '<?php echo site_url("accounts/fillselect")?>',
	data:{ task_code:task_code},
	type: "POST",
	success:function(dataa){
		 
		       var myObj = {};
  
      $.each(dataa, function (task_code, value) {
          myObj[value.task_code] = value.task_name;
      });  
   
      alert(myObj);exit;
		       var len = dataa.length;
			   
                $("#e1").empty();
                for( var i = 0; i<len; i++){
					// [{"task_code":"60","task_name":"12-2018 (3B)"}]
                    var idd = dataa[i]['task_code'];
                    var name = dataa[i]['task_name'];
                    
                    $("#e1").append("<option value='"+idd+"'>"+name+"</option>");
		}
	},
	error: function (request, status, error) {
        alert(request.responseText);
    }
	 
	});
    ///////////////////////////////	
        $('#id').val(id);
     });
	  
});
 
</script>
 <script>
function saveToDatabase(editableObj,column,id,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("accounts/saveremarks")?>',
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