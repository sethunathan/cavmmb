<div id="frmAdd">
<div class="txt-heading">New Job</div>

<textarea name="txtmessage" id="txtmessage" rows="2"  cols="20" ></textarea>
<p><button id="btnAddAction" name="submit" onClick="callCrudAction('add','')">Save</button></p>
</div>
 

 
<div class="txt-heading">Edit job</div>
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

