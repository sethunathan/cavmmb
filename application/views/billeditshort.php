<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Billing (Digital Sign) Details</title>
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
		  document.getElementsByName("rate[]").onkeyup=function() {  totalIt(); };
		}
		
		$("#SaveAccounts").click(function(event)
        { 
	      
		  saveaccounts();
        });	
		
		
		
	});
</script>
 
<script>
 
 
function saveaccounts()
{ 
   
  
	var result="";
	$("#accavail").html("Inserting");
	
	var bill_date=$('#bill_date').val();
	var bill_no=$('#bill_no').val();
	var vch_no=$('#vch_no').val();
	var netval=$('#netval').val();
	var remarks=$('#remarks').val();
	var accodefrom=$('#accodefrom').val();
	var accodeto=$('#accodeto').val();
	
	var comp_idd = $("input[name='comp_idd']:checked").val();
	var it_code = $("input[name='it_code']:checked").val();
	 
	$.ajax({
		        url: '<?php echo site_url("billing/savebilledit")?>',
		        type:'POST',
				async: false,
				data:{netval:netval,bill_no:bill_no,
				vch_no:vch_no,bill_date:bill_date,remarks:remarks,accodefrom:accodefrom,accodeto:accodeto,comp_idd:comp_idd,it_code:it_code},
		        success:function(response){
					$("#accavail").html(response);
					 //result=response;
					// $(".entryscreen").hide();
	                // $(".mainscreen").show();
	               //  $("#entry").show();
				       
					// $('#acc tr:last').after("<tr><td>"+remarks+"<td></tr>");
					
				},
		        error: function(jqxhr) {
                    $("#accavail").text(jqxhr.responseText); // @text = response error, it is will be errors: 324, 500, 404 or anythings else
          }
		
	});
	
}
 
</script>
 </head>

<body style="background: burlywood" class="hold-transition register-page">
 <div class="register-boxx">
  <div class="register-logo">
    <button type="button" id="main"  class="btnDeleteAction" ><a href="<?php echo base_url(); ?>admin/main"><b>Back</b></a></button> 
</div>
	
	<div class="container">
    <div class="row">
        <div class="col-sm-2  col-m-8 col-lg-12">
    <?php
      foreach ($billing as $rsbilling) 
		   {	
		      $bill_no=$rsbilling['bill_no'];$vch_no=$rsbilling['vch_no'];
			  $bill_date=$rsbilling['bill_date'];
			  $remarks=$rsbilling['remarks'];
			  $comp_id=$rsbilling['comp_id'];
			  $pty_code=$rsbilling['pty_code'];
			  $service_code=$rsbilling['service_code'];
			  $netval=$rsbilling['netval'];
			  $roundoff=$rsbilling['roundoff'];
			  
		   }		   
	?>
	<?php
        foreach ($client as $rsclient) 
		   {	
		       $it_code=$rsclient['it_code']; 
		   }		   
	?>
	<form  action="<?php echo base_url();?>billing/savebilleditshort"    method="post" id="paymentsform"  class="form-horizontal">

	<fieldset id="buildyourform"><span id="accavail">Edit Entry</span><br>
    <table class="table">
		<tr>
			<td><label>Bill No:<label></td>
				<td>
				  <input   class="form-control" readonly  value="<?php echo $bill_no?>"  name="bill_no" id="bill_no" ><br></input> 
			    </td>
				<td>
				  <input   class="form-control" readonly  value="<?php echo $vch_no?>"  name="vch_no" id="vch_no" ><br></input> 
			    </td>
		</tr>
		<tr>
			<td><label>Bill Date:<label></td>
				<td>
				  <input  type="text" class="form-control" readonly  value="<?php echo $bill_date?>"  name="bill_date" id="bill_date" ><br></input> 
			    </td>
		</tr>
		<tr>
		    <td><label>Company Under</label></td>
			<td>
			<?php
			   $this->db->where('comp_id', 2);	
               $this->db->order_by('comp_id');					
               $this->db->select('comp_id,comp_name');                      
               $castxe= $this->db->get('mascompany');	
			   $row = mysqli_fetch_row($result);
			    foreach($castxe->result() as $data)
				{
				    echo "<input disabled type='radio' name='comp_idd'  id='$data->comp_id'   value='$data->comp_id'";
					if ($comp_id==$data->comp_id){ echo "checked";}
				    echo ">$data->comp_name</input>";					
				} 
		?>  </td>
		 <tr>
		    <td><label>Customer Name</label></td>
				<td> 
				<div>
						<select disabled  class="form-control"  style="width: 100%"  id="accodefrom" name="accodefrom">
						<?php	
						$this->db->select('ac_name,ac_code'); 
						$this->db->order_by('ac_name');  
						
						$admin = $this->session->userdata('admin');
						if($admin==1)
						{
						  // $names = array(7,8);
						  // $this->db->where_in('group_code', $names);
						}
						else if($admin==0)
						{
											
						   $branchcode = $this->session->userdata('branchcode');
						   $this->db->where('group_code', $branchcode);	
						} 
						 
						$castxe= $this->db->get('accmasaccounts');	
						$row = mysqli_fetch_row($result);		
						foreach($castxe->result() as $data)	
						{				           
						echo "<option value= '$data->ac_code'";
                        if($pty_code==$data->ac_code){echo "selected";}						
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
					<select disabled class="form-control"  style="width: 100%" id="accodeto" name="accodeto">		 
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
							   if($service_code==$data->ac_code) {echo 'selected';}
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
					  
					$this->db->order_by('indx'); 
					$this->db->where('typee', 1);		
					$this->db->where('bill_no', $bill_no); 
					$this->db->where('comp_id',2);	
					$this->db->select('rate,trnbilling2.it_code,it_name'); 
					$this->db->join('trnbilling2', 'masitem.it_code = trnbilling2.it_code');				
					$castxe= $this->db->get('masitem');	
					$row = mysqli_fetch_row($result);
					foreach($castxe->result() as $data)
					{  
						echo "<tr><td><input type='text' name='sno[]' readonly id='sno$i'   value='$i'> </input></td>";
						echo "<td><input type='text' name='itcode[]' readonly id='itcode$i' value='$data->it_name'> </input>
							  <input type='hidden' name='itcodee[]' readonly id='itcodee$i' value='$data->it_code'> </input>
						</td>"; 
						echo "<td><input type='text' name='amount[]' readonly value='$data->rate'   id='amount$i' > </input></td>";
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
				    <td><label>Remarks</label></td>
				    <td>
					<input type ="text" class="form-control" id="remarks" value="<?php echo $remarks?>"  name="remarks" cols="25" rows="1"/> </td>
			
		</tr>
		 
		<tr>
				    <td><label>Amount</label></td>
				    <td>
				     	<input type="text" readonly class="form-control" id="netval" value="<?php echo $netval?>" name="netval"/>
					</td>
			
		</tr>
		</table>
			</fieldset> 
				 
		<table>
        <tr>
			<td>
			<button type="button"  id="SaveAccounts"        class="btnDeleteAction"  >Save  </button>
			   <input type="submit" class="btnDeleteAction"  style="display:none;" value="Save"> </input>
			</td>
		</tr>

 
		</table>
		
    

	
	   
		
			</form>
	</div>
	</div>
	</div>
</div>
</div>


<?php include 'bodyfooter.php';?>