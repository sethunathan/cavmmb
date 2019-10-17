<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/viewstaff">
            <i class="fa fa-dashboard"></i> <span>Staff wise Project Status- Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>admin/viewstaff" method="post">
 
 <br>
	    <div class="form-group has-feedback"> 
<select id ="emp" style="width: 100%" class="js-example-responsive" name="emp"> 
  
<?php
			 		
        $this->db->order_by('emp_code');
        $this->db->where('active',1); 			
        $this->db->select('empname,emp_code');                      
        $castxe= $this->db->get('masemp');	
		foreach($castxe->result() as $data)
			{
				echo "<option value='$data->emp_code'"; 
                if($data->emp_code==$emp) {echo "selected";}							
				echo ">$data->empname</option>";
			} 
		?>   
</select>
 </div>
 
  <div class="form-group has-feedback"> 
<select id ="stage" style="width: 100%" class="js-example-responsive" name="stage"> 
     
<?php
			 		
            $this->db->order_by('stage_code');
            $this->db->where('visible',1); 			
            $this->db->select('stage_name,stage_code');                      
            $castxe= $this->db->get('masstage');	
		    foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->stage_code'"; 
                    if($data->stage_code==$stage) {echo "selected";}							
				    echo ">$data->stage_name</option>";
				} 
		?>   
</select>
 </div>
 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="task" name="task">	
        <option value="-1">All</option>	  
		<?php
			 		
            $this->db->order_by('task_code');					
            $this->db->select('task_name,task_code');                      
            $castxe= $this->db->get('trntask1');	 
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->task_code'";     
                   	if($data->task_code==$task) {echo "selected";}								
				    echo ">$data->task_name</option>";
				} 
		?>  
		</select>
      </div>
	
 <script type="text/javascript">
  document.getElementById('task').value = "<?php echo $_GET['task'];?>";
  document.getElementById('stage').value = "<?php echo $_GET['stage'];?>";  
  document.getElementById('emp').value = "<?php echo $_GET['emp'];?>";
  
</script>	  
	 <div class="col-xs-4">
	   
          <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
        </div> 
		 
 </form>
 
 
<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table class="table" id="table1" name="table1" width="100%" border="1" cellspacing="2" cellpadding="4" >
  <tr class="AdminTableHeader">
    <td>S.No </td> 
	<td>Entry - Assingn</td>	
    <td>Client Name</td>  	
	<td>Contact Nos.</td>
	<td>Task Name</td>  	
    <td>Stage</td>
    <td>Remarks</td>	
	<td>Followup</td>
	<td>Verification Assingn To</td>
	<td>Verification Done by</td>	
  </tr>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td> 
      <td class="span6">
	<?php
	if ($rsclient['entrydone'])
	{
		echo $rsclient['entrydone'];
	}
	else
		{
		?>
	    <div id="divv_<?php echo $rsclient['id'];?>">* </div>
		 <div id="divvv_<?php echo $rsclient['id'];?>">
		<select class="form-control" id="select_<?php echo $rsclient['id'];?>" name="task">	
		 <?php
			 		
            $this->db->order_by('emp_code');
            $this->db->where('active',1); 			
            $this->db->select('empname,emp_code');                      
            $castxe= $this->db->get('masemp');	
		    foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->emp_code'";                   						
				    echo ">$data->empname</option>";
				} 
		?>   
        </select>
		 <Button id="button_<?php echo $rsclient['id'];?>   class="btnEditAction" name="reverse"
	     onclick="saveentry('<?php  echo $rsclient['id'] ?>')"> Assingn</Button>
       	<?php }?>
		 </div>
			
	</td>    
    <td><?php echo $rsclient['ac_name'].' - '.$rsclient['group_code'] ; ?></td> 
    <td><?php echo $rsclient['contactno'] ; ?></td>	 	
	<td><?php echo $rsclient['task_name'] ; ?></td>	
	<td><?php echo $rsclient['stage_name'] ; ?></td>
    <td><?php echo $rsclient['remarks'] ; ?></td>	
	<td><?php echo $rsclient['followupassingnto'] ; ?></td>	
	 
   <td>	
	<?php echo  $rsclient['verificationassign'] ; ?>
	</td>
    <td>
	
	<?php echo  $rsclient['verificationdone'] ; ?>
	</td>	   
	
	 
	
   
     

  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
 </div>
</div>


 <script>
function saveentry(id) { 
	$test=$('#select_'+id).val();	
     $('#divv_'+id).html('Loading');		
	$.ajax({
		url: '<?php echo site_url("admin/saveentry")?>',
		type: "POST",
		data:'id='+id+'&emp_code='+$test,		
		success: function(data){
			 	    $('#divv_'+id).html('OK');
                    $('#divvv_'+id).hide();			   
	 		
		},
	error: function (request, status, error) {
        alert(request.responseText);
    }
    //$("#loaderIcon").hide();    
   }); 
}
</script>
<?php include 'bodyfooter.php';?>
  