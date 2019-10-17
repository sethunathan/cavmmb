<?php include 'body.php';?>

<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>billing/unbilled"
            <i class="fa fa-dashboard"></i> <span>Billed/Un Billed - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>billing/unbilled" method="post">
 
 <br>
 
		 			 	
	   <div class="form-group has-feedback"> 
	    <select class="form-control" id="accgroup" name="accgroup">
          
		<?php
			
            $names = array(7,8);
            $this->db->where_in('group_code', $names);		
							
            $this->db->order_by('group_code');					
            $this->db->select('groupname,group_code');                      
            $castxe= $this->db->get('accmasgroup');	 
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->group_code'";     
                   	if($data->group_code==$accgroup) {echo "selected";}								
				    echo ">$data->groupname</option>";
				} 
		?>  
		</select>
      </div>
	  
      <div class="form-group has-feedback"> 
	  <input type="radio" name="billed"  <?php  echo ($billed== '1') ?  "checked" : "" ;  ?> value="1">Billed-Work In Progress
      <input type="radio" name="billed"  <?php  echo ($billed== '2') ?  "checked" : "" ;  ?> value="2">UnBilled
     
      
    </div>
	 <div class="col-xs-4">
	   
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
		 
 </form>
 
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> 
<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
 
 
 <div class="table-responsive">
<table      data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" >
  <thead><tr>
    
    <th data-sortable="true">S.No </th> 
    <th data-field="name" data-sortable="true">Client Name</th>
	<th data-field="con" data-sortable="true">Task  Name</th>
    <th data-field="opn" data-sortable="true">Remarks</th>
<th data-field="totdr" data-sortable="true">Task ID</th>
<th data-field="totcr" data-sortable="true">Moved By</th>	
	<th data-field="task" data-sortable="true">Closing Balance</th>
	<th data-field="status" data-sortable="true">Status</th>
		<th data-field="taskk" data-sortable="true">Already Billed  </th>
</tr></thead>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td> 
    <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;"><?php echo $rsclient['ac_name'];?></td> 
	<td ><?php echo $rsclient['task_name']; ?></td> 
	<td ><?php echo $rsclient['remarks']; ?></td> 
	<td ><?php echo ($rsclient['id']); ?></td> 
	<td ><?php echo ($rsclient['empname']); ?></td> 
	<td ><?php echo abs($rsclient['closbal']); ?></td>
	<td ><?php echo abs($rsclient['movetotask']); ?></td>
 <td> 
	<?php  if ($rsclient['billed']==1) 
	 {
		 echo $rsclient['comp_id'].'-'.$rsclient['bill_no'].'/Dt.'.$rsclient['bill_date'];
	 } 
	 
	 else
		 { echo 'N';} 

	 ?>
	 <?php  if ($rsclient['billed']==0) 
	 {?>
	 <button class="btnEditAction" name="future"
      onClick="callCrudAction('<?php echo $rsclient['id']; ?>')">Already Billed(Free)</button> 
      </td>
	 <?php }?>	  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
 
  
 
 
</div>

     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script script="javascript">
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.form-control').select2();
	$("#stage").select2();
});
</script>
  <script>
function callCrudAction(id) {
	$("#loaderIcon").show();
	 
	
		 
	
    
     
	
	jQuery.ajax({
	url: '<?php echo site_url("billing/movetotask1")?>',
	data:{ id:id},
	type: "POST",
	success:function(data){
		 		 
			 
				$('#message_'+id).fadeOut();
				$("#txtmessage").val(id+' Sucessfully Reversed ');				
			 
		 
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
    }
	 
	});
}


</script>
<?php include 'bodyfooter.php';?>
  