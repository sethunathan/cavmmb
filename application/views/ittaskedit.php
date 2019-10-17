<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>


 <li class="active treeview">
          <a href="<?php echo base_url(); ?>ittask">
            <i class="fa fa-dashboard"></i> <span>Task List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">Task Details</p>

    <form action="<?php echo base_url(); ?>ittask/savetask/<?php echo $task_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>  <div class="txt-heading" >Task Name 
      <div class="form-group has-feedback">
        <input name="task_name" id="task_name" value ="<?php echo $task_name?>" type="text" class="form-control" placeholder="Task Name">
		<label for="task_name">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	 
	 
	  <div class="txt-heading" >Serives 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="subjobname" name="subjobname">		     
		<?php
			 		
            $this->db->order_by('subjobname');					
            $this->db->select('subjobname');                      
            $castxe= $this->db->get('massubjob');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->subjobname'";
                    if($data->subjobname==$subjobname) {echo "selected";}
				    echo ">$data->subjobname</option>";
				} 
		?>  
		</select>
      </div>
	  </div>  
	  
	 <div class="txt-heading" id="dialog_title_span">Starting Date
       <div class="form-group has-feedback">
	 
        <input name="starting_date"   value ="<?php echo $starting_date?>" class="daterange" type="text"  placeholder="Strting Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>

<div class="txt-heading" id="dialog_title_span">Ending Date
       <div class="form-group has-feedback">
	 
        <input name="ending_date"   value ="<?php echo $ending_date?>" class="daterange" type="text"  placeholder="Ending Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>
 <div class="txt-heading" id="dialog_title_span">Target Date
       <div class="form-group has-feedback">
	 
        <input name="target_date"   value ="<?php echo $target_date?>" class="daterange" type="text"  placeholder="Target Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
 </div>
 
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>

 <?php include 'ittaskclient.php';?>

 <br><br>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
     
  <!-- /.form-box -->

<?php include 'bodyfooter.php';?>