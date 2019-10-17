<?php include 'body.php';?>

<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/viweall1>"
            <i class="fa fa-dashboard"></i> <span>Final Stage - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>admin/viweall1" method="post">
 
 <br>
 
		 	
	    <div class="form-group has-feedback"> 
	    <select class="form-control" id="accgroup" name="accgroup">
          <option value="-100">None</option>		
        <option value="-1">All</option>	  
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
<select id ="stage" style="width: 100%" class="form-control" name="stage"> 
        <option value="-100">None</option>
        <option value="-1">All</option>
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
	     <option value="-100">None</option>
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

      <div class="form-group has-feedback"> 
	  <input type="radio" name="gender"  <?php echo ($gender== '1') ?  "checked" : "" ;  ?> value="1">Link ITR
      <input type="radio" name="gender" <?php echo ($gender== '2') ?  "checked" : "" ;  ?> value="2"> Defective IT
      <input type="radio" name="gender" <?php echo ($gender== '3') ?  "checked" : "" ;  ?> value="3"> Processed IT      
      <input type="radio" name="gender" <?php echo ($gender== '4') ?  "checked" : "" ;  ?> value="4"> Verified IT<br>
      
    </div>


	<div class="form-group has-feedback"> 
	 <input type="checkbox" name="vehicle"  
	 <?php echo ($vehicle==1 ? 'checked' : '');?>
	 value="1"> Show Me Empty Assingn Work in Entery Level<br>
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
 
<?php include 'bodyfooter.php';?>
  