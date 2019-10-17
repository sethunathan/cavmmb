<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<style>
 
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
<style>
 
#add-product table{width:100%;background-color:#F0F0F0;}
#add-product table th{text-align:left;}
#add-product table td{background-color:#FFFFFF;border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#list-product table{width:100%;}
#list-product table th{border-bottom:#F0F0F0 2px solid;text-align:left;}
#list-product table td{border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#btnSaveAction {
	background-color: #7fb378;
    padding: 5px 10px;
    color: #fff;
    border-radius: 4px;
	cursor:pointer;
	margin:10px 0px 40px;
	display:inline-block;
}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #333;
    background: #d1e6d6;
	margin:20px 0px 5px;
}
</style>

<script>
function cancelEdit(message,id) {
	$("#message_" + id + " .message-content").html(message);
	$('#frmAdd').show();
}
function showEditBox(editobj,id) {
	$('#frmAdd').hide();
    $(editobj).prop('disabled','true');	
	var currentMessage = $("#message_" + id + " .message-content").html();
	var editMarkUp = '<textarea rows="2" cols="20" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
	$("#message_" + id + " .message-content").html(editMarkUp);
	
}
 

function callCrudAction(action,id) {
	$("#loaderIcon").show();	     
	var checklistname = $("#txtmessage_"+id).val()  ;
    var details =  $("#txtmessage").val() ;	
	var addchecklistname = $("#txtmessage").val() ;	  
	if(action=="delete"){
	if(confirm("Are you sure you want to delete this?")){      
		//alert('k');exit;
    }
    else{
		$("#txtmessage").val('');
		$("#loaderIcon").hide();
        return false;
    }
    }
	
	jQuery.ajax({
	url: '<?php echo site_url("jobs/checklistall")?>',
	data:{ action:action,addjobname:addchecklistname,jobname:checklistname,details:details,job_code:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "add":
				$("#comment-list-box").append(data);
			break;
			case "edit":
				$("#message_" + id + " .message-content").html(data);
				$('#frmAdd').show();
				$("#message_"+id+" .btnEditAction").prop('disabled','');	
			break;
			case "delete":
				$('#message_'+id).fadeOut();
			break;
		}
		
		$("#txtmessage").val('');
		$("#loaderIcon").hide();
	},error: function(xhr, status, error) {
	
	//var err = JSON.parse(xhr.responseText);
 // alert(err.Message);
  alert(xhr.responseText);
	$(".errorspan").text(xhr.responseText);
	}
	});
}


</script>
 
<div id="frmAdd">
<div class="txt-heading">New Service</div>

<textarea name="txtmessage" id="txtmessage" rows="2"  cols="20" ></textarea>
<p><button id="btnAddAction" name="submit" onClick="callCrudAction('add','')">Save</button></p>
</div>
 
<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
</div>
<div class="txt-heading">Edit Service</div>
<div class="form_style">
<div id="comment-list-box">
<?php
if(!empty($client)) {
foreach($client as $rsclient) {
?>
<div class="message-box" id="message_<?php echo $rsclient['job_code'];?>">
<div>
<button class="btnEditAction" name="edit" onClick="showEditBox(this,<?php echo $rsclient['job_code']; ?>)">Edit</button>
<button class="btnDeleteAction" name="delete"
 onClick="callCrudAction('delete',<?php echo $rsclient['job_code']; ?>)">
 Delete</button>

 
</div>
<div class="message-content"><?php echo $rsclient['jobname']; ?></div>
</div>
<?php
}
} ?>
</div>
<?php include 'bodyfooter.php';?>