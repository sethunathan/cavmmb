<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Accounts Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		       <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.formm-control').select2();
	 
});
</script>
  <style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnEditAction1{background-color:#2FC332;border:0;padding:2px 10px;color:yellow;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
.btnDeleteAction{background-color:green;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;} 
</style>
  <style>
 .register-boxx {
    width: 90%;
    margin: 7% auto;
}
</style>
  </head>
<body style="background: burlywood" class="hold-transition register-page">
<div class="register-boxx">
  <div class="register-logo">
    <a href="<?php echo base_url(); ?>admin/main"><b>CAVMMB</b></a>
</div>

<div class="entryscreen" style="display:none;">
	<button type="button" id="main"  class="btnDeleteAction" >Back</button> 

	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-8">
 
	<form  action=""   method="post" id="paymentsform"  class="form-horizontal">
							<fieldset id="buildyourform"><span id="accavail">New Entry</span><br>
    <table class="table">
		 <tr>
	
				    <td><label>Voucher No:<label></td>
				    <td><input   class="form-control" readonly  value=""  name="vchcode" id="vchcode" ><br></input> 
					</td>
		</tr>
		<tr>
		    <td><label>Company Under</label></td>
			<td><?php
			 		
            $this->db->order_by('comp_id');					
            $this->db->select('comp_id,comp_name');                      
            $castxe= $this->db->get('mascompany');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<input type='radio' name='comp_idd'  id='$data->comp_id'   value='$data->comp_id'";
					if ($data->comp_id==2){ echo "checked";}
				    echo ">$data->comp_name</input>";					
				} 
		?>  </td>
		 <tr>
		    <td><label>Accounts To</label></td>
				<td>  <select  class="formm-control"  style="width: 100%"  id="accodefrom" name="accodefrom">
				<?php	
				$this->db->select('ac_name,ac_code'); 
				$this->db->order_by('ac_name');  
               				
			    $branchcode = $this->session->userdata('branchcode');
				$this->db->where('group_code', $branchcode);	
				 
				$castxe= $this->db->get('accmasaccounts');	
				$row = mysqli_fetch_row($result);		
				foreach($castxe->result() as $data)	
				{				           
				echo "<option value= '$data->ac_code'";	
				echo ">$data->ac_name</option>";	
				} 			
				?>  	
				</select>
					
					<br>
				</td>
		</tr>
		
		<tr>
				    <td><label>Amount</label></td>
				    <td><input  class="form-control" placeholder="Enter Amount"  
					name="amount" pattern="[0-9]{10}" id="amount" type="tel" /><br></td>
		</tr>
		 <tr>
		    <td><label>Cash/Bank (A/c)-From</label></td>
				<td>
					<select  class="formm-control"  style="width: 100%" id="accodeto" name="accodeto">		 
					    <?php
							 $admin = $this->session->userdata('admin');
							 if(($admin === NULL))
							{
								 
								$admin=0;
							}
							$this->db->select('ac_name,ac_code'); 
							$this->db->order_by('ac_name'); 
							
							if ($admin==1)
								{
									$names = array(2,3);
								    $this->db->where_in('group_code',$names);	
								}
								else if ($admin==0)
								{
							       $this->db->where('group_code',3);
								}	
							
                            $castxe= $this->db->get('accmasaccounts');	
							$row = mysqli_fetch_row($result);
				            foreach($castxe->result() as $data)
				             {
				               echo "<option value= '$data->ac_code'";
				               echo ">$data->ac_name</option>";
				              } 
							  ?> 
                             <?php
							  if ($admin==1)
							   {
									
								}
								else if ($admin==0)
								{
								  $this->db->select('ac_name,ac_code'); 
								  $this->db->order_by('ac_name'); 
								
								 
								 $emp_code = $this->session->userdata('emp_code');
								 $this->db->where('masemp.emp_code', $emp_code);
								 $this->db->join('masemp', 'masemp.cashcode = accmasaccounts.ac_code');
								 $castxe= $this->db->get('accmasaccounts');	
								 $row = mysqli_fetch_row($result);
								 foreach($castxe->result() as $data)
								 {
								   echo "<option value= '$data->ac_code'";
								   echo ">$data->ac_name</option>";
								  }  
							} 
							   ?> 							  
					</select>
					<br>
				</td>
		</tr>
		<tr>
				    <td><label>Remaks</label></td>
				    <td>
					<textarea class="form-control" id="remarks" name="remarks"cols="25" rows="1"></textarea></td>
			
		</tr>		  
		
        <tr>
			<td>
			    <button type="button" hidden style ="dispaly:none" id="another"   name="another"   class="btnDeleteAction" >Add</button>
				<button type="button"  id="SaveAccounts"     disabled  class="btnDeleteAction"  >Save</button>
			</td>
		</tr>
	</fieldset> 
 
		</table>
	</form>
	 			
				</div>
			</div>
			</div>
</div>
<div class="mainscreen"  >
    <div class="col-sm-2">	
	   <button type="button" id="entry"  class="btnDeleteAction" >Add New</button> 
	</div>	
   <div class="form-group">
    <form id="rock" action="<?php echo base_url();?>accounts/paymententry" method="post" enctype="multipart/form-data">  
			<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
    <div class="col-sm-2">
	<select  class="form-control"  id='monthn'  name="monthn" >
    <?php
	if(!empty($monthn)) 
		 {  
 		    $groupcode=$monthn;		   
		}
        else { $groupcode=date('n');}
	///echo "<script type='text/javascript'>alert('$groupcode');</script>"; 
    for ($i = 0; $i < 12; $i++) {
		$s='';
        $time = strtotime(sprintf('%d months', $i));   
        $label = date('F', $time);   
        $value = date('n', $time);
		if ($value==$monthn) {$s='selected';}
        echo "<option value='$value' $s >$label</option>";
    }
    ?>
</select>
	  
 
</div>
	<div class="col-sm-2">	 
      <input  class="btnDeleteAction" type="submit" class="btn" value="Load"/>
    </div>
	<div class="col-sm-2">
	   <textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
	</div>
 </form>	
</div>

<div class="col-sm-10">  
		<div class="table-responsive">
		<table id="acc" class="table">
		  <tr class="AdminTableHeader">
			<td>S.No </td>
			<td>Voucher No</td>  		
			<td>Date</td>  	
			<td>Ac Name</td> 
			<td>Amount</td>
			<td>Remarks</td> 
			<td>Edit</td>	 
		  </tr>
		  
		<?php $i=1; foreach($records->result() as $row)
		 { 
			$id=$row->vch_no;
		 ?>  
			 
			<tr id="message_<?php echo $i;?>" class="table-row">
			<td><?php echo $i; ?></td>  
			<td ><?php echo $row->vch_no;?></td>   
			<td><?php echo date("d/m/Y g:i A", strtotime($row->vch_dt));?></td>   	
			<td id="acname<?php echo $i;?>"><?php echo $row->ac_name; ?></td>
			<td id="amount<?php echo $i;?>"><?php echo $row->amount;  ?></td> 
	    	<td id="remarks<?php echo $i;?>"> <?php echo $row->remarks;  ?></td> 
			<td> 
		 	
			<button type="button" class="btn btn-primary" 
            data-message="<?php echo $i; ?>" 			
			data-vchno="<?php echo $row->vch_no; ?>" 
            data-accode="<?php echo $row->ac_code; ?>"
			data-oppaccode="<?php echo $row->oppac_code; ?>"
			data-amount="<?php echo $row->amount; ?>"
			data-compid="<?php echo $row->comp_id; ?>"
			data-remarks="<?php echo $row->remarks; ?>"
			data-vchdate="<?php echo $row->vch_dt; //date("d/m/Y g:i A", strtotime($row->vch_dt)); ?>"
			data-toggle="modal" 
			data-target="#exampleModal">
      Edit Bill
     </button> 
  
			  </td>
			 
		  </tr> 
		  <?php $i=$i+1; ?>
			
		 <?php } ?>
		</table> 
		</div>
</div>

<div class="modal fade" id="exampleModal"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
	        
			 
			<input type="text" readonly  id="messageid"   name="messageid"   class="form-control"> 
		    <input type="text" readonly  id="vch_no"  name="vch_no"   class="form-control"> 
			<input type="text" readonly  id="vch_date"    name="vch_date"  class="form-control"> 
	        <input type="text" readonly   value ="Select Company" class="form-control"> 
	        <div class="form-group has-feedback"> 
		    <?php
			    $this->db->order_by('comp_id');					
                $this->db->select('comp_id,comp_name');                      
                $castxe= $this->db->get('mascompany');	
			    $row = mysqli_fetch_row($result);
			    foreach($castxe->result() as $data)
				  {
				   echo "<input type='radio' disabled name='comp_id'  id='$data->comp_id' class='comp_id' value='$data->comp_id'";
				   echo ">$data->comp_name</input>";					
				 } 
		    ?>		 
           </div> 
        
		<input type="text" readonly   value ="Accounts To" class="form-control"> 
		<div class="form-group has-feedback">
			<select readonly class="form-control"  style="width: 100%"  id="editaccodefrom" name="editaccodefrom">
				<?php	
				$this->db->select('ac_name,ac_code'); 
				$this->db->order_by('ac_name');  
				$branchcode = $this->session->userdata('branchcode');
				$this->db->where('group_code', $branchcode);	 
				$castxe= $this->db->get('accmasaccounts');	
				$row = mysqli_fetch_row($result);		
				foreach($castxe->result() as $data)	
				{				           
			    	echo "<option value= '$data->ac_code'";	
				    echo ">$data->ac_name</option>";	
				} 			
				?>  	
			</select>
		</div>			
		
        <input type="text" readonly   value ="Cash/Bank" class="form-control"> 
		  <div class="form-group has-feedback">
			<select readonly class="form-control"  style="width: 100%"  id="editaccodeto" name="editaccodeto">
				<?php	
				$this->db->select('ac_name,ac_code'); 
				$this->db->order_by('ac_name');  
				$names = array(2, 3, 17,18);
				$this->db->where_in('group_code', $names); 
				$castxe= $this->db->get('accmasaccounts');	
				$row = mysqli_fetch_row($result);		
				foreach($castxe->result() as $data)	
				{				           
			    	echo "<option value= '$data->ac_code'";	
				    echo ">$data->ac_name</option>";	
				} 			
				?>  	
			</select>
		</div>				
      		
		<div>Amount</div>
        <div class="form-group has-feedback">
           <input type="text"   id="editamount"  name="editamount" value ="" class="form-control"	placeholder="Amount">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 		
		 
			 				
	 
        <div>Remarks</div>		
		<div class="form-group has-feedback">
           <input type="text"  id="editremarks" name="editremarks" value ="" class="form-control"	placeholder="Remarks">
           <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> 
	   
<button 
	type="button" 
	id="movetoverificationlevelmodal" 
	data-dismiss="modal"  
	class="btn btn-primary" 
	name="movetoverificationlevelmodal"
    onClick="getsaveaccounts('saveaccounts')"> Save</button>

</div>
 
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div> 


     
</div>
 
<script type="text/javascript">
$(document).ready(function()
     {

//////////////////////////

  $('#exampleModal').on('show.bs.modal', function (e) {
	
	$('#messageid').val('loading');
	
    var messageid =$(e.relatedTarget).data('message');
    $('#messageid').val(messageid);
	
    var vch_no = $(e.relatedTarget).data('vchno');  
	$('#vch_no').val(vch_no);
	
	///////////////////////////////	
	
	$.ajax({
		url: '<?php echo site_url("accounts/getaccbilling")?>',
		type: "POST",
		data:'vch_no='+vch_no, 
		success: function(data){
			var dataa = data.split("$");
			$("#editamount").val(dataa[0]);			
	        $("#editremarks").val(dataa[1]);
			var accode =dataa[2];
			var comp_id =dataa[3];
			var oppac_code = dataa[4];
			var vch_dt = dataa[5];		
            $("input[name=comp_id][value=" + comp_id + "]").attr('checked', 'checked');	
            $("#editaccodefrom").val(accode);
            $("#editaccodeto").val(oppac_code);
			$('#vch_date').val(vch_dt);			
		},	error: function (request, status, error) {
        //alert(request.responseText); 
       $("#txtmessage").val(request.responseText);	
		} 
   });
	
	});
	 

////////////////////////////////
	  function initvar()
     {
		   
	  $("#accavail").html("New");
	  document.getElementById("SaveAccounts").disabled = false;
	  document.getElementById("another").disabled = true;	
	  
     
       var property = document.getElementById("another");	  
       property.style.backgroundColor = "red";
	   
	  
 
	   document.getElementById('amount').value='';
	   document.getElementById('remarks').value='';	  
	
	 
	   gud();	 
      
	 }
	  $("#entry").click(function(event)
    {
		initvar();
	$(".entryscreen").show();
	$(".mainscreen").hide();
	$("#main").show();
	$("#entry").hide();
	 document.getElementById('accodefrom').focus();
  });
    
 $("#main").click(function(event)
  {
	$(".entryscreen").hide();
	$(".mainscreen").show();
	$("#entry").show();
	 
  }); 
	
	$('#another').click(initvar);	
	
	
	function gud()
	{
		
	   $.ajax({
		    url: '<?php echo site_url("accounts/getmaxacc")?>',
			//async: false,
		    type:'POST',
		    success:function(response){	
			document.getElementById('vchcode').value=response;
			}	
	   });
	 
	}	
	function initvar1()
    {
	document.getElementById("SaveAccounts").disabled = true;
	document.getElementById("Addanother").disabled = false;	
   
    var property = document.getElementById("another");	  
    property.style.backgroundColor = "green";
	
	
	document.getElementById('amount').value='';
	document.getElementById('remarks').value='';
	document.getElementById('vchcode').value='';	
	$("#accavail").html("View");
  }
	
  $("#SaveAccounts").click(function(event)
  {
	
	$("#accavail").html("Inserting");
	var accname=$('#amount').val();
	if (accname.length>0)
	{
		saveaccounts();
		initvar1();
	}
	else
	{
		alert('Amount Zero ');
		document.getElementById("amount").focus();
		event.preventDefault();
        return false;		
	}
	
  });
});
</script>
<script>
function saveaccounts()
{ 
	var result="";
	$("#accavail").html("Inserting");
	var amount=$('#amount').val();
	var remarks=$('#remarks').val();
	var accodefrom=$('#accodefrom').val();
	var accodeto=$('#accodeto').val();
	 
	var comp_idd = $("input[name='comp_idd']:checked").val();
	 
	$.ajax({
		        url: '<?php echo site_url("accounts/savepayment")?>',
		        type:'POST',
				async: false,
				data:{amount:amount,remarks:remarks,accodefrom:accodefrom,accodeto:accodeto,comp_idd:comp_idd},
		        success:function(response){
					$("#accavail").html(response);
					result=response;
					 $(".entryscreen").hide();
	                 $(".mainscreen").show();
	                 $("#entry").show();
					 
					 $('#acc tr:last').after("<tr><td>"+remarks+"<td></tr>");
					
				},
		        error: function(jqxhr) {
                    $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
          }
		
	});
	
}
</script>

  <script>
 

function getsaveaccounts(action) {
	
	var messageid=$('#messageid').val();
	var accname=$('#editamount').val();
	if (accname.length<0)
	{
		alert('Amount Zero ');
		document.getElementById("editamount").focus();		 
        return false;	
	}
	 
	
	if(action=="saveaccounts"){
	if(confirm("Are you sure you want to Save this?")){ }
    else{		 
		$("#loaderIcon").hide();
        return false;
    }
	}
	var vch_no=$("#vch_no").val(); 
    var vch_date=$("#vch_date").val();

	
	var editaccodefrom =$('#editaccodefrom :selected').val();  
    
	var editaccodefromtxt =$('#editaccodefrom :selected').text();  
	
    var editaccodeto =$('#editaccodeto :selected').val();  
 
	var remarks=$("#editremarks").val();   
    var editamount=$("#editamount").val();    
	var comp_id = $(".comp_id:checked").val();
	var acname="acname"+messageid;
	var remarkss="remarks"+messageid;
	 
    ///////////////////////////////////////////////////////////////////////////////////////////
	jQuery.ajax({
	 
	url: '<?php echo site_url("accounts/editsavebill")?>',
	data:{ comp_id:comp_id,remarks:remarks,editaccodefrom:editaccodefrom,editaccodeto:editaccodeto,vch_no:vch_no,
	 vch_date:vch_date,editamount:editamount
	},
	type: "POST",
	success:function(data){		
				$("#txtmessage").val(data+'Bill Saved Sucessfully');
		        $("#loaderIcon").hide();				 
				document.getElementById(acname).innerHTML =editaccodefromtxt;
                document.getElementById(remarkss).innerHTML =remarks;
                document.getElementById("amount"+messageid).innerHTML =editamount;				
	},
	error: function (request, status, error) {
        alert(request.responseText);
		 if(textstatus==="timeout") {
            alert("got timeout");
        } else {
            alert(textstatus);
        }
		 $("#txtmessage").val(request.responseText);
    }	
	});
	
	//////////////////////////////////////////////////////////////////////////////////////////
	 $("#loaderIcon").hide();
}
</script> 

 
 



 

<script type="text/javascript"> 
//$("#accodefrom").select2({ theme: "classic",  placeholder: "Select a Ac Name"});
//$("#accodeto").select2({ theme: "classic",  placeholder: "Select a Ac Name"});
</script>
<?php include 'bodyfooter.php';?>