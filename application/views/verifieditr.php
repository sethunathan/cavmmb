<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/verifieditr">
            <i class="fa fa-dashboard"></i> <span>Verfied  I.T.R - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>admin/verifieditr" method="post">
 
 <br>
  <div class="form-group has-feedback table-responsive">   
	  <select class="form-control" id="followupp" name="followupp">		
    	<option value="0">All</option>  
		<?php  
		       	
            $this->db->where('job_code', 3);				
            $this->db->order_by('subjobname');
            $this->db->select('subjobname,subjob_code');                      
            $castxe= $this->db->get('massubjob');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->subjob_code'"; 
                   	if($data->subjob_code==$followupp) {echo "selected";}					
				    echo ">$data->subjobname</option>";
				} 
		?>  
		</select>
</div>
	<div class="col-xs-4">
	  <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
    </div> 
		 
 </form>
 
 

<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table          width="100%" border="1" cellspacing="2" cellpadding="4" >
  <thead><tr>
    
    <th>S.No </th> 	
    <th>Client Name</th>
<th>Pan</th>		
	<th>Task Name</th>   
    
    <th>Return Filed Date</th>
    <th>Remarks*</th>		
	<th>Move to Defective List</th>
	<th>Move to Processed List</th>
	<th>Remaining Days</th>
</tr></thead>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;"><?php echo $rsclient['ac_name'] ?></td>
	<td><?php echo $rsclient['pan'] ; ?></td>	
	<td><?php echo $rsclient['task_name'].'-'.$rsclient['subjobname'] ; ?></td>	     
	
	<td ><?php echo date("d-m-Y", strtotime($rsclient['itreturndate'] )); ?></td>	
	
	<td   contenteditable="true"
	onBlur="saveToDatabase(this,'remarks4','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks4'] ; ?></td>
	
     <td> 
	 <button class="btnEditAction" name="itdefective"
      onClick="callCrudAction('itdefective','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Defective List</button> 
      </td>
	   <td> 
	 <button class="btnEditAction" name="itprocessed"
      onClick="callCrudAction('itprocessed','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Processed List</button> 
      </td>
	  <td>
<?php 
$last_renewaldate=$rsclient['itreturndate'] ;
if ($last_renewaldate){
//$current_date = date("d-m-Y");
//$datetime1 = new DateTime($last_renewaldate);
//$datetime2 = new DateTime($current_date);

//$difference = $datetime1->diff($datetime2);
//echo '<span style="color:red;text-align:center;">Pending!!!</span>';
//echo  $difference->d.' days';
}


?></td>   
	 
	  
	 
   	   
	
	 

  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
 </div>
</div>
<script>
function callCrudAction(action,id,acname) {
	$("#loaderIcon").show();
	
     
	 
	jQuery.ajax({
	url: '<?php echo site_url("admin/movetotask1")?>',
	data:{ action:action,id:id},
	type: "POST",
	success:function(data){
		switch(action) {
			case "itprocessed":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Moved to Processed I.T.List ');
			break;
            case "itdefective":
				 $('#message_'+id).fadeOut();
				 $("#txtmessage").val(acname+' Sucessfully Moved to Defective I.T.List ');
			break			
			 
		}
		 
		$("#loaderIcon").hide();
	},
	error: function (request, status, error) {
        alert(request.responseText);
    }
	 
	});
}


</script>
 
 
<?php include 'bodyfooter.php';?>
  