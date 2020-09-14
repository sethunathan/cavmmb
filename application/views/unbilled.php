<?php include 'body.php';?>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> 
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
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
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

<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
 
 
 <div class="table-responsive">
<table      data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" >
  <thead><tr>
    
    <th data-sortable="true">S.No </th> 
    <th data-field="name" data-sortable="true">Client Name</th>
	<th data-field="con" data-sortable="true">Task  Name</th>
    <th data-field="opn" data-sortable="true">Remarks</th>
	<th>Edit Remarks</th>
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
    
	<td id="remarks_<?php echo $rsclient['id'];?>" >   <?php echo $rsclient['remarks'] ; ?></td> 
	<td>     
	      <button type="button" class="btn btn-primary"         	 
			data-id="<?php echo $rsclient['id']; ?>"   
            data-remarks="<?php echo $rsclient['remarks']; ?>"
			data-toggle="modal" data-target="#exampleModal">
            Edit Remarks
         </button>
	</td>
	 
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

<script>
function callCrudAction(id,acname) {
	$("#loaderIcon").show();  
	 
	jQuery.ajax({
	url: '<?php echo site_url("billing/movetotask2")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){	 
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
    }
	 
	});
}


</script>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
		
        <div id="id">       
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>	
		   
		 <div class="form-group has-feedback">
        <input type="text" id="remarks" value ="" class="form-control"		 
		placeholder="Remarks">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>  
	  <button type="button"
	    id="movetoverificationlevelmodal" 
	     data-dismiss="modal"
		   class="btn btn-primary"
		    name="movetoentrylevelmodal"
        onClick="saveverificationlevelmodal(document.getElementById('id').value,		
		document.getElementById('remarks').value )
		">
        Save
	  </button> 
	</div>
	
        </div>
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> 
    </div> 
</div>  
</div>

<script>
function saveverificationlevelmodal(id,remarks) {
	$("#loaderIcon").show();  
	jQuery.ajax({
	url: '<?php echo site_url("billing/saveremarks")?>',
	data:{id:id,remarks:remarks
	},
	type: "POST",
	success:function(data){ 
		//	$('#message_'+id).fadeOut();				
		//$('#message_'+id).hide();	
  	    	$('#remarks_'+id).text(remarks); 			 
			$("#txtmessage").val(remarks+'Saved'); 
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
	 $('#exampleModal').on('show.bs.modal', function (e) {
		 $('#id').val('loading');
		 
		 var  id = $(e.relatedTarget).data('id');   
		 var  remarks = $(e.relatedTarget).data('remarks');    
		 $('#remarks').val(remarks);	 
		 $('#id').html(id);
		 $('#id').val(id);
	  });
	   
 });
  
 </script>
<?php include 'bodyfooter.php';?>
  