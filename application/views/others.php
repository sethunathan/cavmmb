<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>

 <li class="active treeview">
          <a href="<?php echo base_url(); ?>others">
            <i class="fa fa-dashboard"></i> <span>Merge Task & Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
		
<form action="<?php echo base_url(); ?>others/savemerge" method="post">

<p class="login-box-msg">Task </p>
<?php include 'otherstask.php';?>	
<br/>
<p class="login-box-msg">Ac Name</p>
<?php include 'othersclient.php';?>	
 <br/>
 <p class="error"></p>
 <script type="text/javascript">
$(document).ready(function()
    { 
	  $('#entry').click(function(event)
	  {
		  $(".entryscreen").show();
	  });
	});
    $("#saveaccounts").click(function(event)
	{
		savedata();
		$(".entryscreen").hide();
	});
</script>

<p class="login-box-msg">Link </p>
	 
        <div id="active"> 
		<input type='radio'  class='addjobcode' name='active'  value ="1" >Link </input>
		<?php $admin = $this->session->userdata('admin');
		if ($admin==1)
		{?>
		<input type='radio'  class='addjobcode' name='active'  value ="0" >De Link</input>	
		<?php } ?>
		
	</div>		
	<br>
<div class="col-xs-4">
    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
</div>
<br>
		
    </form>

<?php include 'bodyfooter.php';?>