<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Billing Details</title>
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
		
function calc(idx) {
        var comp_idd = $("input[name='comp_idd']:checked").val();
		var taxableamt = parseFloat(document.getElementById("rate"+idx).value) ;
	    var taxper=document.getElementById("taxper"+idx).value/2;			 
         
	if (comp_idd==1)
	{
		var taxper=document.getElementById("taxper"+idx).value/2;			 
		var price=0;var sgst=0;var cgst=0;			
		if (taxper>0)
			{
				sgst=taxableamt*(taxper/100);
				cgst=taxableamt*(taxper/100);
				 
			}	
		price=sgst+cgst+taxableamt;	
		document.getElementById("gst"+idx).value= isNaN(taxper)?"0.00":taxper.toFixed(2);
		document.getElementById("sgst"+idx).value= isNaN(sgst)?"0.00":sgst.toFixed(2);
		document.getElementById("cgst"+idx).value= isNaN(cgst)?"0.00":cgst.toFixed(2);
				
		document.getElementById("taxamt"+idx).value= isNaN(taxableamt)?"0.00":taxableamt.toFixed(2);
		document.getElementById("totalamount"+idx).value= isNaN(price)?"0.00":price.toFixed(2);
	}
	else if (comp_idd==2)
	{
		document.getElementById("gst"+idx).value= 0;
		document.getElementById("sgst"+idx).value= 0;
		document.getElementById("cgst"+idx).value= 0;
		document.getElementById("taxamt"+idx).value= 0;
		document.getElementById("totalamount"+idx).value= 0;
    }
}
	function totalIt() {
    		 
        var total=0;
		var comp_idd = $("input[name='comp_idd']:checked").val();
       	var names = document.getElementsByName('snoo[]');
        for (var i = 0, iLen = names.length; i < iLen; i++)
		   {
	            var m=names[i].value;
		        calc(m);  
			    //var price = parseFloat(document.getElementById("totalamount"+m).value);
				//total += isNaN(price)?0:price;	

				if (comp_idd==1)
				{
					var price = parseFloat(document.getElementById("totalamount"+m).value);
					total += isNaN(price)?0:price;	
				
				} 
				if (comp_idd==2)
				{
					var price = parseFloat(document.getElementById("rate"+m).value);
					total += isNaN(price)?0:price;	
					 
					 
				} 					
            }	
       
        if (total>0)
        {
          //document.getElementById("netval").value=isNaN(total)?"0.00":total.toFixed(2); 
		   var numb = total.toFixed(2)-total.toFixed(0);
           numb = numb.toFixed(2);
           document.getElementById("roundoff").value=numb; 
           document.getElementById("netval").value=total.toFixed(0); 
           	  
        }
    }     

	var rowCount =0;
	function deleteRow(tableID) {
    try 
	{
		var comp_idd = $("input[name='comp_idd']:checked").val();
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
		
		var names = document.getElementsByName('sno[]');
           for (var i = 0, iLen = names.length; i < iLen; i++) {
	        names[i].value=i+1;
          }
		
        var names = document.getElementsByName('snoo[]');
		for (var i = 0, iLen = names.length; i < iLen; i++)
			{
				var m=names[i].value;
					
				if (comp_idd==1)
				{
					var price = parseFloat(document.getElementById("totalamount"+m).value);
					total += isNaN(price)?0:price;	
				} 
				if (comp_idd==2)
				{
				   var price = parseFloat(document.getElementById("rate"+m).value);
					total += isNaN(price)?0:price;	
				} 
							   
			}	  
		if (total>0)
		   {
			    var numb = total.toFixed(2)-total.toFixed(0);
                numb = numb.toFixed(2);
			    document.getElementById("roundoff").value=numb; 
                document.getElementById("total").value=total.toFixed(0); 
		   }  
  
		//var total=0;  
		//var names = document.getElementsByName('totalamount[]');
        //   for (var i = 1, iLen = names.length; i < iLen; i++)
			//   {
			//	   var price = parseFloat(names[i].value);
           //        total += isNaN(price)?0:price;
	        
             //}
	   // if (total>0)
       // {
			
        //  document.getElementById("netval").value=isNaN(total)?"0.00":total.toFixed(2); 
           	  
        //}
    }
	
	catch(e) {
            alert(e);
        }
	
    }
		 
</script>
<script>
 

function storeTblValues()
{
    var TableData = new Array();
    
	$("[id^='rate']").each(function() {
    var id = $(this).attr('id'); 
	
    id = id.replace("rate",'');	 
	
	var rate = $('#rate'+id).val();
	var sac = $('#sac'+id).val();
	var indx  = $('#indx'+id).val();
	var taxper  = $('#taxper'+id).val();
	 
	var cgst  = $('#cgst'+id).val();	
	var sgst =  $('#sgst'+id).val();
	var totalamount =  $('#totalamount'+id).val();
	var gst = $('#gst'+id).val();
	var taskid  = $('#id'+id).val();
	var task_code =  $('#task_code'+id).val();
	
	TableData[id]={
		"rate" : rate,"sac" : sac,"taxper" : taxper, "indx" : indx, 
		"cgst" : cgst,"sgst" : sgst,"totalamount" : totalamount
		,"gst" : gst,"taskid" : taskid,"gst" : gst,"task_code" : task_code
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
	
	var bill_date=$('#bill_date').val();
	var bill_no=$('#bill_no').val();
	var vch_no=$('#vch_no').val();
	var netval=$('#netval').val();
	var remarks=$('#remarks').val();
	var accodefrom=$('#accodefrom').val();
	var accodeto=$('#accodeto').val();
    var roundoff=$('#roundoff').val();	 	
	
	var comp_idd = $("input[name='comp_idd']:checked").val();
	 
	$.ajax({
		        url: '<?php echo site_url("billing/savebilledit")?>',
		        type:'POST',
				async: false,
				data:{netval:netval,bill_no:bill_no,roundoff:roundoff,
				vch_no:vch_no,bill_date:bill_date,remarks:remarks,accodefrom:accodefrom,accodeto:accodeto,comp_idd:comp_idd,tabledata:tabledata},
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
	<form  action="<?php echo base_url();?>billing/savebilledit"    method="post" id="paymentsform"  class="form-horizontal">

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
							   if($service_code==$data->ac_code) {echo "selected";}
				               echo ">$data->ac_name</option>";
				              } 
							  ?>  
					</select>
					<br>
				</td>
		</tr>
		<tr>
				    <td><label>Remarks</label></td>
				    <td>
					<input type ="text" class="form-control" id="remarks" value="<?php echo $remarks?>"  name="remarks" cols="25" rows="1"/> </td>
			
		</tr>
		<tr>
				    <td><label>Round Off</label></td>
				    <td>
				     	<input type="text" class="form-control" id="roundoff" value="<?php echo $roundoff?>" name="roundoff"/>
					</td>
			
		</tr>
		<tr>
				    <td><label>Amount</label></td>
				    <td>
				     	<input type="text" class="form-control" id="netval" value="<?php echo $netval?>" name="netval"/>
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
		
    

	
	  <INPUT  class="btnDeleteAction"  type="button" style="display:none;" disabled value="Remove Row" onclick="deleteRow('dataTable')" />
    <table style="border-collapse:collapse;" id="dataTable" name="dataTable" border="1" class="table">
		<tr class="AdminTableHeader">
		
		<?php 
		    $str='';
		    if ($comp_id==1)
				{
					$str="<td>S.No</td>
					     <td>Task Name</td>  		
					     <td>S.A.C.</td> 
					     <td>Rate</td>
					     <td>Tax Per</td>
					     <td>Tax Amt</td>
					     <td>CGST</td>
					     <td>SGST</td>
					     <td>Amount</td> ";
				}
		?>
		<?php 
		     
		    if ($comp_id==2)
				{
					$str="<td>S.No</td>
					     <td>Task Name</td>  							     
					     <td>Rate</td>";
				}
		?>
		</tr>
		
		<?php  
		    $i=1;
			 
			foreach ($client as $clientt) 
			   {	
                $indx=$clientt['indx']; 			   
				$str=$str.'<TR>';
				$str=$str.'<TD><INPUT type="hidden" name="chk[]"/>';
				$str=$str."<input type='hidden' id='hdnCount' value='$i' name='hdnCount'> "; 
				$str=$str." <INPUT type='text' readonly class='test'  id='sno$i'	size='4' value='$i'  size='4'  readonly name='sno[]'/> 
				    <INPUT type='hidden' readonly class='test'  id='snoo$i'	size='4' value='$i'  size='4'  readonly name='snoo[]'/>  
                    <INPUT type='hidden' readonly class='test'  id='indx$i'	size='4' value='$indx'  size='4'  readonly name='indx[]'/>     					
				</TD>";
				
				$task_name=$clientt['task_name'];
				$str=$str."<TD style='max-width:150px;'>$task_name</TD> ";
				
				$sac=$clientt['sac']; 			
				
				
				$rate=$clientt['rate']; 
				$taxper=$clientt['taxper'];
				$taxamt=$clientt['taxamt'];
				$amount=$clientt['amount']; 
				
                $cgst=$clientt['cgst'];
                $sgst=$clientt['sgst'];
     			$gsttaxper=$clientt['gsttaxper'];

                $totalamount=$clientt['totalamount'];				
				$idd=$clientt['id'];
				$task_code=$clientt['task_id'];
				if ($comp_id==1)
				{
					$str=$str."<TD><INPUT type='text' class='test' size='4' id='sac$i' name='sac$i' value='$sac'  name='sac[]'/></TD>";
					$str=$str."<TD><INPUT type='text' class='test' id='rate$i'	value='$rate'  size='4' onchange='totalIt()'  name='rate[]'/> </TD>";
				    $str=$str."<TD><INPUT type='text' class='test' id='taxper$i' value='$taxper'  size='4' onchange='totalIt()'  name='taxper[]'/>  </TD>";
				    $str=$str."<TD><INPUT type='text' class='test' id='taxamt$i' value='$taxamt'  size='4' readonly  name='taxamt[]'/>  </TD>";
				    $str=$str."<TD><INPUT type='text' class='test' id='cgst$i'	readonly  value='$cgst'  size='4'    name='cgst[]'/></TD>"; 
				    $str=$str."<TD><INPUT type='text' class='test' id='sgst$i' readonly   value='$sgst'  size='4'    name='sgst[]'/>  </TD>";
				    $str=$str."<TD><INPUT type='text' class='test' id='totalamount$i' readonly value='$totalamount'	size='4' value=''  name='totalamount[]'/>"; 
					
					$str=$str."<INPUT type='hidden' class='test' id='totalamount$i' readonly value='$totalamount'	size='4' value=''  name='totalamount[]'/>";
                    $str=$str."<INPUT type='hidden' class='test' id='gst$i'value='$gsttaxper'  readonly='readonly'  size='4'   name='gst[]'/>";
                    $str=$str."<INPUT type='hidden' class='test' id='task_code$i'	size='4' value='$task_code'  name='task_code[]'/>"; 				
				    $str=$str."<INPUT type='hidden' class='test' id='id$i'	size='4' value='$idd'  name='id[]'/>";		
                    $str=$str."</TD>";			
				}
			    else if ($comp_id==2)
				{
					
					$str=$str."<TD><INPUT type='text' class='test' id='rate$i'	value='$rate'  size='4' onchange='totalIt()'  name='rate[]'/> </TD>";
				    $str=$str."<TD><INPUT type='hidden' class='test' id='taxper$i' value='$taxper'  size='4' onchange='totalIt()'  name='taxper[]'/>  ";
					$str=$str."<INPUT type='hidden' class='test' size='4' id='sac$i' name='sac$i' value=''  name='sac[]'/>";
				    $str=$str."<INPUT type='hidden' class='test' id='taxamt$i' value='$taxamt'  size='4' readonly  name='taxamt[]'/>  ";
				    $str=$str."<INPUT type='hidden' class='test' id='cgst$i'	readonly  value='$cgst'  size='4'    name='cgst[]'/>"; 
				    $str=$str."<INPUT type='hidden' class='test' id='sgst$i' readonly   value='$sgst'  size='4'    name='sgst[]'/> ";
				
				    $str=$str."<INPUT type='hidden' class='test' id='totalamount$i' readonly value='$totalamount'	size='4' value=''  name='totalamount[]'/>";
                    $str=$str."<INPUT type='hidden' class='test' id='gst$i'value='$gsttaxper'  readonly='readonly'  size='4'   name='gst[]'/>";
                    $str=$str."<INPUT type='hidden' class='test' id='task_code$i'	size='4' value='$task_code'  name='task_code[]'/>"; 				
				    $str=$str."<INPUT type='hidden' class='test' id='id$i'	size='4' value='$idd'  name='id[]'/>";		
                    $str=$str."</TD>";				
				}
				
				$str=$str."</tr>"; 
				$i=$i+1;  
		   }
		   echo $str;
		   ?>
        </table> 
		
			</form>
	</div>
	</div>
	</div>
</div>
</div>


<?php include 'bodyfooter.php';?>