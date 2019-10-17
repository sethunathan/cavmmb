<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>followup/verification">
            <i class="fa fa-dashboard"></i> <span>Need Clarification - Followup Level - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		

<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<table class="AdminTable" id="table1" width="100%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">
    <td>S.No </td> 
    <td>Client Name</td>  	
	<td>Contact Nos.</td>	
    <td>Remarks</td>		
    <td>Query</td>		
    <td>Answer</td>		 
	<td>Reverse to Followup Level</td>
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>     
    <td><?php echo $rsclient['ac_name'].' - '.$rsclient['group_code'] ; ?></td>   
    <td><?php echo $rsclient['contactno'] ; ?></td>
     <td contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	    
    <td contenteditable="true"
	onBlur="saveToDatabase(this,'clarificationremarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['clarificationremarks'] ; ?></td>
	<td contenteditable="true"
	onBlur="saveToDatabase(this,'clarificationreverse','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['clarificationreverse'] ; ?></td>
	   <td> 
	 <button class="btnEditAction" name="clarificationreverse"
      onClick="callCrudAction('clarificationreverse','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Reverse to Followup Level</button> 
      </td>

  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
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
	alert(acname);exit;
	
	jQuery.ajax({
	url: '<?php echo site_url("followup/movetotask")?>',
	data:{ action:action,id:id,acname:acname},
	type: "POST",
	success:function(data){
		switch(action) {
			case "reverse":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Reversed ');
			break;
			case "edit":
				 
			break;
			case "delete":
				$('#message_'+id).fadeOut();
				//$('#table1 .hideme').hide();
				// $("#message_'+id").animate({'line-height':0},1000).hide(1);
				//$('#message_'+id).hide();
				//$("#txtmessage").val(acname+' Sucessfully moved to Followup Register ');
			break;
			case "clarificationreverse":				 
				$("#txtmessage").val(acname+' Sucessfully moved to Followup List ');
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
<?php include 'bodyfooter.php';?>
 