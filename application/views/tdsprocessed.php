<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/processedtds">
            <i class="fa fa-dashboard"></i> <span>Processed  T.D.S - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>admin/processedtds" method="post">
 
 <br>
 <div class="form-group has-feedback table-responsive">   
	  <select class="form-control" id="followupp" name="followupp">		
    	<option value="0">All</option>  
		<?php  
		    $this->db->where('massubjob.tds',0);	    	
            $this->db->where('job_code', 6);				
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
	<th>Task Name</th>
    <th>Return Filed Date</th>
    <th>Remarks*</th>		 
	<th>Remaining Days</th>
</tr></thead>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;"><?php echo $rsclient['ac_name'] ?></td>
	<td><?php echo $rsclient['task_name'].'-'.$rsclient['subjobname'] ; ?></td>	
     
		<td><?php echo date("d-m-Y", strtotime($rsclient['itreturndate'] )); ?></td>	
 
	
	
	<td   contenteditable="true"
	onBlur="saveToDatabase(this,'remarks','<?php  echo $rsclient['id'] ?>','<?php  echo $rsclient['ac_name'] ?>')"
	onClick="showEdit(this);"><?php echo $rsclient['remarks'] ; ?></td>
	    
	  
	  <td>
<?php 
$last_renewaldate=$rsclient['itreturndate'] ;
if ($last_renewaldate){
$current_date = date("d-m-Y");
$datetime1 = new DateTime($last_renewaldate);
$datetime2 = new DateTime($current_date);

$difference = $datetime1->diff($datetime2);
echo '<span style="color:red;text-align:center;">Pending!!!</span>';
echo  $difference->d.' days';
}


?></td>   
	 
	  
	 
   	   
	
	 

  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
 </div>
</div>
<script>
function saveToDatabase(editableObj,column,id,acname) {
	 
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("admin/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname+'   Remarks Sucessfully Updated !!!');
			//$(editableObj).css("background","pink");
		}        
   });
}
</script>
   
<?php include 'bodyfooter.php';?>
 
  