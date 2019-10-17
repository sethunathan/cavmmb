<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>others/otherss">
            <i class="fa fa-dashboard"></i> <span>Merge Task & Client-Non Repetive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
		
<form action="<?php echo base_url(); ?>others/savemergee" method="post">

<p class="login-box-msg">Task </p>
<?php include 'otherstaskone.php';?>	
<p class="login-box-msg">Ac Name</p>
<?php include 'othersclientone.php';?>	
 <div class="txt-heading" id="dialog_title_span">Starting Date 	 
    <div class="form-group has-feedback">	 
          <input name="startingdate"   value ="__/__/____" class="daterange" type="text"  placeholder="Starting Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>

</div>
 <div class="txt-heading" id="dialog_title_span">Target Date 	 
    <div class="form-group has-feedback">	 
          <input name="targetdate"   value ="__/__/____" class="daterange" type="text"  placeholder="Target Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>

</div>
 <div class="txt-heading" id="dialog_title_span">Due Date 	 
    <div class="form-group has-feedback">	 
          <input name="duedate"   value ="__/__/____" class="daterange" type="text"  placeholder="Due Date">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>

</div>
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>
<p class="login-box-msg">Link/De Link</p>
	 
	 <p class="login-box-msg">Link </p>
	 
        <div id="active"> 
		<input type='radio'  class='addjobcode' name='active'  value ="1" >Link </input>
		<?php $admin = $this->session->userdata('admin');
		if ($admin==1)
		{?>
		<input type='radio'  class='addjobcode' name='active'  value ="0" >De Link</input>	
		<?php } ?>
		
	</div>	
	
    
	
<div class="col-xs-4">
    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
</div>
<br>
		
    </form>

<?php include 'bodyfooter.php';?>