<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>


 <li class="active treeview">
          <a href="<?php echo base_url(); ?>task">
            <i class="fa fa-dashboard"></i> <span>Repeative - Task List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li> 
  <div class="register-box-body">
    <p class="login-box-msg">Repeative - Task Details</p>

    <form action="<?php echo base_url(); ?>task/savetask/<?php echo $task_code;?>" method="post">
	 <div class="row">
         <div class="form-group has-feedback">
        <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    
      </div>
        <div class="txt-heading" >Repeative - Task Name 
      <div class="form-group has-feedback">
        <input name="task_name" id="task_name" value ="<?php echo $task_name?>" type="text" class="form-control" placeholder="Task Name">
		<label for="task_name">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div></div>
	 
	 
	  <div class="txt-heading" >Serives 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="subjobname" name="subjobname">		     
		<?php
			$this->db->where('job_code !=',5); 		
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
	  
	  <div class="txt-heading" >Child 
	  <div class="form-group has-feedback"> 
	  <select class="form-control" id="childtask_code" name="childtask_code">	
	<?php 
	            $previousCountry = null;  
				$this->db->where('job_code !=',5);
				$this->db->order_by('trntask1.task_code') ;
				$this->db->order_by('subjobname,trntask1.subjob_code');   
				$this->db->select('task_code,task_name,subjobname,trntask1.subjob_code');
				$this->db->join('trntask1', 'trntask1.subjob_code = massubjob.subjob_code','left');	     
				$castxe= $this->db->get('massubjob');
				foreach ($castxe->result() as $airport)
				{
						if ($previousCountry != $airport->subjobname) 
						{ 
							$echostr.="<optgroup label='$airport->subjobname'>";
						} 
						$echostr.= "<option  value= '$airport->task_code'";							  
                      if( $childtask_code==$airport->task_code)
						{
							  $echostr.= "selected";
						}		
                 						
						$echostr.= ">$airport->task_name</option>";
						$previousCountry = $airport->subjobname; 
						 if ($previousCountry != $airport->subjobname) 
						{ 
							$echostr.="</optgroup>";
						}
				}
				if ($previousCountry !== null) 
					{
						$echostr.= '';
					}
					echo $echostr; ?>
	  
	  
	  </div> </div> 
	 <br/> <br/>
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

  <div class="txt-heading" >S.A.C
      <div class="form-group has-feedback">
        <input name="sac" id="sac" value ="<?php echo $sac?>" type="text" class="form-control" placeholder="S.A.C">
    <label for="sac">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>
   <div class="txt-heading" >Tax %
      <div class="form-group has-feedback">
        <input name="taxper" id="taxper" value ="<?php echo $taxper?>" type="text" class="form-control" placeholder="Tax Per">
    <label for="taxper">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>

 <div class="txt-heading" >Amount(>=200)
      <div class="form-group has-feedback">
        <input name="amount" id="amount" value ="<?php echo $amount?>" type="text" class="form-control" placeholder="Amount >=Rs.200">
    <label for="amount">-</label>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  </div>
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>

 <?php include 'taskclient.php';?>

 <br><br>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id='submitBtn' 
           class="btn btn-primary btn-block btn-flat enableOnInput">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
<script>
$( "form" ).submit(function( event ) {

      var amount =  parseInt($('#amount').val());
      var amount1 =200;
       
     if( amount < amount1)
      {

        alert('Amount Should be greater than Rs.200');
         
        event.preventDefault();
        $( "#amount" ).focus();
      }
     else
      {
        
       }
    
});
</script>

    

<?php include 'bodyfooter.php';?>