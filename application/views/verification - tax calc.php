<?php include 'body.php';?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <a target="_blank" href="https://services.gst.gov.in/services/login"
 class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> GST LOGIN</a>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
<br>
<form action="<?php echo base_url(); ?>followup/verification" method="post">
<div class="form-group has-feedback"> 
	  <select class="form-control" id="verificationn" name="verificationn">		     
		<?php  
		$this->db->where('job_code', 4);	
		
		   // $this->db->where_in('subjob_code', array('1','3','4','6','12'));	 
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
<br>
 <script type="text/javascript">
  document.getElementById('verificationn').value = "<?php echo $_GET['verificationn'];?>";
</script>
<br>
	 <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
 </form>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>followup/verification">
            <i class="fa fa-dashboard"></i> <span>Verification - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>   
		
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
 

<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>

<div class="table-responsive">
<table      data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" > 



 <thead><tr>
    
    <th data-sortable="true">S.No </th> 
    <th data-sortable="true">Client Name</th> 
    <th data-sortable="true">Task Name</th> 
     
	<th>Contact Nos.</th><th>GST UID(*)</th>
		 <th>GST PWD(*)</th>	 
    <th data-sortable="true">Entry Staff</th> 
    <th data-sortable="true">Done at</th> 
    <th data-sortable="true">Days</th> 
	 
    <th>Remarks(*)</th>     	
	<th>To Bill</th>
	<th>To Payment</th>
	<th>To F.L.</th>
	<th>To Bill-Test</th>
 </tr></thead>
   
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td> 
	    
    <td>
    	<?php if ($i==1)
    	 { 
               echo substr($rsclient['ac_name'],0,15); 
         }?>
      
    </td>   
    <td><?php echo $rsclient['task_name'] ; ?></td> 
 <td><?php echo $rsclient['contactno'] ; ?></td> 

    <td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'gstid','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstid'] ; ?></td>
	
	<td contenteditable="true"
	onBlur="savegstaccmasaccounts(this,'gstpwd','<?php  echo $rsclient['ac_code'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['gstpwd'] ; ?></td>
	
	
	 <td><?php echo $rsclient['empname'] ; ?></td> 
	
	<td><?php 
         $last_renewaldate= date("d-m-Y", strtotime($rsclient['entrydoneat'] ));
	    echo $last_renewaldate;   ?>
	
	</td>	 
	
	<td>
<?php 
$current_date = date("d-m-Y");
$datetime1 = new DateTime($last_renewaldate);
$datetime2 = new DateTime($current_date);

$difference = $datetime1->diff($datetime2);
echo '<span style="color:red;text-align:center;">Pending!!!</span>';
echo   $difference->d.' days';
 


?></td>  
	

		<td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
   
	
      

      <td>

    	<?php if ($i==1)
    	 { ?>
               <button class="btnAddAction" name="delete"
      onClick="callCrudAction('delete','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Bill</button> 
        <?php }?>
      
    
	 
     


      </td>



	  <td> 

    <?php if ($i==1)
    	 { ?>
          <button class="btnEditAction" name="payment"
      onClick="callCrudAction('payment','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Payment</button> 
        <?php }?>
      </td>
	   <td> 
	 <button class="btnEditAction" name="reverse"
      onClick="callCrudAction('reverse','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse F.L</button> 
      </td>
       <td>
       	<button type="button" class="btn btn-primary"         	 
			data-id="<?php echo $rsclient['id']; ?>"  		
			data-toggle="modal" 
			data-target="#exampleModal">
      Bill-Test
     </button> 
	 

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
		
        <div  id="id">       
               
         </div>	
		 
		

		 <div class="form-group has-feedback">
           <input type="text" id="amount" value ="" class="form-control"		 
		   placeholder="Bill Amount">
        
        </div> 

        <div class="form-group has-feedback">
           <input type="text" id="taxper" value =""    placeholder="Tax Per">          
           <input type="text" id="taxamt" value =""  readonly="true"   placeholder="Tax Amount">	    

        </div> 
        
        <div class="form-group has-feedback">
           <input type="text" id="netval"  readonly="true"   class="form-control"   placeholder="Net Value">
          
        </div>

         <div class="form-group has-feedback">
           <input type="text" id="remarks"    class="form-control"	   placeholder="Remarks">
          
        </div>

		  <br>
	</div>
	
	<div class="form-group has-feedback"> 
    
    	 
		<input type='radio'  class='comp_id'  name='comp_id'  value= '1' >TAX INVOICE</input>
        <input type='radio'  class='comp_id'  name='comp_id'  value= '2'  checked>BILL OF SUPPLY</input>	  
	 
  </div>	

	 
	 <div  id="savebill">      	
		<button type="button" id="savebill" data-dismiss="modal"  class="btn btn-primary" name="insert"
        onClick="SaveReminder('insert',document.getElementById('id').value)">
        Save Bill
	   
    </div>	
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
 
$(document).ready(function()
{
    $('#exampleModal').on('show.bs.modal', function (e) {
		$('#id').val('loading');
        
	    var  id = $(e.relatedTarget).data('id');  
        $('#id').val(id);
     });
	  
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
	url: '<?php echo site_url("followup/movetotask2")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
			case "payment":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Moved ');
			break;
			case "insert":
				// $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Moved to Billing ');
			break;//
			case "edit":
				 
			break;
			case "delete":
				$('#message_'+id).fadeOut();
				//$('#table1 .hideme').hide();
				// $("#message_'+id").animate({'line-height':0},1000).hide(1);
				//$('#message_'+id).hide();
				//$("#txtmessage").val(acname+' Sucessfully moved to Followup Register ');
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
$(function() {
    $("#amount, #taxper").on("keydown keyup", psum);
	 
	function psum() {
		     var x=0;
		     x=Number($("#taxper").val());
		     amt=Number($("#amount").val());
		     if (x>0)
		     {
		     	 if (amt>0)
		        {
                    y=amt*(x/100);
                   
                   // y=round(y,2);
                     y=Number(y).toFixed(2); 
                    $("#taxamt").val(Number(y));

                    y=y+amt;
                    // y=round(y,2);

                    y=Number(y).toFixed(2); 

		        	$("#netval").val(Number(y));
                 }
	            
	         }
	          
	 
	}

	function round(value, precision) {
    var multiplier = Math.pow(10, precision || 0);

    return Math.round(value * multiplier) / multiplier;
         } 
});
</script>


<script>
function SaveReminder(action,id) {

	 
	var comp_id=$('#comp_id').text();	
	var amount=$("#amount").val();
	var taxper=$("#taxper").val();
	var taxamt=$("#taxamt").val();
   // var reminder_date=$('#reminder_date').val();	
	var remarks=$('#remarks').val();    

	jQuery.ajax({
	url: '<?php echo site_url("followup/movetotask2")?>',
	data:{ action:action,id:id,comp_id:comp_id,amount:amount,taxper:taxper,taxamt:taxamt,remarks:remarks},
	type: "POST",
	success:function(data){
		switch(action) {			 		
			case "insert":				 
				$("#txtmessage").val(id+' Sucessfully Saved ');
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
			 $("#txtmessage").val(acname+' Verification Level Remarks Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>
 
 

