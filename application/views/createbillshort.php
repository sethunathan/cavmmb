<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Billing(Digital Sign) Details</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.sform-control').select2();
});
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

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



  <script type="text/javascript">
$(document).ready(function()
    {
	window.onload=function() 
     { 
	  
       document.getElementsByName("amount[]").onkeyup=function() {  totalIt(); };  
	 }
	 
  
	function initvar()
    {
		   
	  $("#accavail").html("New");
	  document.getElementById("SaveAccounts").disabled = false;
	  document.getElementById("another").disabled = true;	
	  
     
       var property = document.getElementById("another");	  
       property.style.backgroundColor = "red";
	   
	  
 
	   document.getElementById('txttotal').value='';
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
		        url: '<?php echo site_url("billing/getmaxacc")?>',	  
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
	
	
	document.getElementById('txttotal').value='';
	document.getElementById('remarks').value='';
	document.getElementById('vchcode').value='';	
	$("#accavail").html("View");
  }
	
  $("#SaveAccounts").click(function(event)
  { 
	$("#accavail").html("Inserting");
	var txttotal=$('#txttotal').val();
	if (txttotal.length>0)
	{
		saveaccounts();
		initvar1();
	}
	else
	{
		alert('Amount Zero ');
		document.getElementById("txttotal").focus();
		event.preventDefault();
        return false;		
	}
  });
  
 function storeTblValues()
{
    var TableData = new Array();
    
	$("[id^='amount']").each(function()
	{
		var id = $(this).attr('id'); 
		id = id.replace("amount",'');	
		var sno = $('#sno'+id).val();
		var itcode = $('#itcodee'+id).val(); 
		var amount  = $('#amount'+id).val();
		
		var i=1;
        if (amount>0){	 
		   TableData[id]={	"amount" : amount,"itcode" : itcode,"sno" : sno	}
		   i=i +1;
		}
	
	});
    
    TableData.shift();  // first row will be empty - so remove
    return TableData;
}

function saveaccounts()
{ 
    
	var tabledata;
    tabledata = storeTblValues();
	
    tabledata = JSON.stringify(tabledata);
	 
	  
	var result="";
	$("#accavail").html("Inserting");
	var amount=$('#txttotal').val();
	var remarks=$('#remarks').val();
	var accodefrom=$('#accodefrom').val();
	var accodeto=$('#accodeto').val();	 
	var comp_idd = $("input[name='comp_idd']:checked").val();
	 
	 
	$.ajax({
		        url: '<?php echo site_url("billing/savebillshort")?>',
		        type:'POST',
				async: false,
				data:{tabledata:tabledata,amount:amount,remarks:remarks,accodefrom:accodefrom,accodeto:accodeto,comp_idd:comp_idd},
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

 
	 

});
</script>

 
	 <script type="text/javascript">
	 function totalIt()
   {
	var total=0;var price=0;
	var names=document.getElementsByName('sno[]');
	for(var i=0,iLen=names.length; i < iLen;i++)
	{
		var j=names[i].value; 
		
		var price = document.getElementById("amount"+j).value;
		  //total += isNaN(price)?0:price;
        if (price>0)
       {
		  
           total=+total + +price;
		  
       } 		  
	 	
	}
	  
	if (total>0)
       {
		  
           document.getElementById("txttotal").value=total.toFixed(0); 
		  
       } 
	
}
	 </script>
  </head>

<body style="background: burlywood" class="hold-transition register-page">
 
 <div class="register-boxx">
  <div class="register-logo">
    <button type="button" id="main"  class="btnDeleteAction" ><a href="<?php echo base_url(); ?>admin/main"><b>Main Menu(Digital Sign)</b></a></button> 
</div>

<div class="entryscreen" style="display:none;">
	<button type="button" id="main"  class="btnDeleteAction" >>--Back-Entry Screen</button> 

	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-12">
 
	<form  action=""   method="post" id="paymentsform"  class="form-horizontal">
	<fieldset id="buildyourform"><span id="accavail">New Entry-Digital Sign Bill</span><br>
    <table class="table">
		 
		<tr>
			<td>
				Voucher Number
			</td>
			<td>
				<input  readonly  name="username"  value ="<?php echo $username?>" type="text" class="form-control" placeholder="Username">
				<input  readonly  value="Voucher"  name="vchcode" id="vchcode" ><br></input>
			</td> 
		</tr>
		<tr>
		      
		    <td><label>Company Under</label>
			 
			</td>
			<td><?php
			$this->db->where('comp_id', 2); 		
            $this->db->order_by('comp_id');					
            $this->db->select('comp_id,comp_name');                      
            $castxe= $this->db->get('mascompany');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<input type='radio' name='comp_idd'  readonly id='$data->comp_id'   value='$data->comp_id'";
					if ($data->comp_id==2){ echo "checked";}
				    echo ">$data->comp_name</input>";					
				} 
		?>  </td>
		<input    readonly  value=""  name="vchcode" id="vchcode" ><br></input> 
		</tr>
		

		 <tr>
		    <td><label>Customer Name</label></td>
				<td> 
				<div>
						<select  class="sform-control"  style="width: 100%"  id="accodefrom" name="accodefrom">
						<?php	
						$this->db->select('ac_name,ac_code'); 
						$this->db->order_by('ac_name');  
						
						$admin = $this->session->userdata('admin');
						if($admin==1)
						{
						   $names = array(7,8);
						   $this->db->where_in('group_code', $names);
						}
						else
						{					
						   $branchcode = $this->session->userdata('branchcode');
						   $this->db->where('group_code', $branchcode);	
						} 
						 
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
					
					<br>
				</td>
		</tr>
		 
		
		 <tr>
		    <td><label>Service A/c.</label></td>
				<td>
					<select  class="form-control"  style="width: 100%" id="accodeto" name="accodeto">		 
					    <?php
							
							$this->db->select('ac_name,ac_code'); 
							$this->db->order_by('ac_name'); 
							
							$names = array(22, 25,26);
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
					<br>
				</td>
		</tr>
		 
		<tr>  
		    <td><label>Material</label></td> 
			<td>
			<table border="1">
			<tr>
			<td>S.No</td><td>Material</td><td>Amount</td></tr>
			 
			<?php
			 	$i=1; 
                $this->db->order_by('it_name');					
                $this->db->select('it_code,it_name');                      
                $castxe= $this->db->get('masitem');	
			    $row = mysqli_fetch_row($result);
			    foreach($castxe->result() as $data)
				{  
				    echo "<tr><td><input type='text' name='sno[]' readonly id='sno$i'   value='$i'> </input></td>";
				    echo "<td><input type='text' name='itcode[]' readonly id='itcode$i'   value='$data->it_name'> </input>
					      <input type='hidden' name='itcodee[]' readonly id='itcodee$i'   value='$data->it_code'> </input>
					</td>"; 
					echo "<td><input type='text' name='amount[]' value='0' onchange='totalIt()'  id='amount$i' > </input></td>";
                    echo "</tr>";
                    $i=$i+1;					
				} 
		    ?>
			</td>
			</tr>
			</table>
			
		</td> 
		</tr>
		
		<tr>
		  <td><label>Total Amount</label></td> 		
		  <td><input  type="text" class="form-control"  name="txttotal" size="10"  id="txttotal"   /><br> </td>
		 </tr>
		<tr>
			<td><label>Remarks</label></td>
				    <td>
					<textarea class="form-control" id="remarks" name="remarks" cols="25" rows="1"></textarea></td>
			
		</tr>
         
		
		</table>
			</fieldset> 
				 
		<table>
        <tr>
			<td>
			    <button type="button"  style ="dispaly:none" id="another"   name="another"   class="btnDeleteAction" ></button>
				<button type="button"  id="SaveAccounts"     disabled  class="btnDeleteAction">Save</button>
			</td>
		</tr>

 
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
    <form id="rock" action="<?php echo base_url();?>billing/modifybillshort" method="post" enctype="multipart/form-data">  
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
            <td>Print</td>			
		  </tr>
		  
		<?php $i=1; foreach($records->result() as $row)
		 { 
			$id=$row->bill_no;
		 ?>  
			<tr id="message_<?php echo $i;?>" class="table-row">
			<td><?php echo $i; ?></td>  
			<td><?php echo $row->bill_no;?></td>   
			<td><?php echo date("d/m/Y g:i A", strtotime($row->bill_date));?></td>   	
			<td id="acname<?php echo $i;?>"><?php echo $row->ac_name; ?></td>
			<td id="amount<?php echo $i;?>"><?php echo $row->netval;  ?></td> 
	    	<td id="remarks<?php echo $i;?>"> <?php echo $row->remarks;  ?></td> 
			<td><a href="<?php echo base_url(); ?>billing/billeditshort/<?php echo $row->bill_no.'/'.$row->comp_id;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	</td>
			<td><a target="_blank" href="<?php 
			  echo base_url(); ?>billing/billprintshort/<?php echo $row->bill_no.'/'.$row->comp_id.'/'.$row->pty_code;  ?>">
			  <button class="btn btn-primary" type="button">Print</button> </a>	</td>
		  </tr> 
		  <?php $i=$i+1; ?>
			
		 <?php } ?>
		</table> 
		</div>
</div>
 </form>
<script type="text/javascript">


</script>

<?php include 'bodyfooter.php';?>