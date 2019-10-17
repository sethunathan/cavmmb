 
 <style>
 
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
<style>
 
#add-product table{width:100%;background-color:#F0F0F0;}
#add-product table th{text-align:left;}
#add-product table td{background-color:#FFFFFF;border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#list-product table{width:100%;}
#list-product table th{border-bottom:#F0F0F0 2px solid;text-align:left;}
#list-product table td{border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#btnSaveAction {
	background-color: #7fb378;
    padding: 5px 10px;
    color: #fff;
    border-radius: 4px;
	cursor:pointer;
	margin:10px 0px 40px;
	display:inline-block;
}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #333;
    background: #d1e6d6;
	margin:20px 0px 5px;
}
</style>
<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<link href="<?php echo base_url(); ?>assests/select2/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assests/select2/select2.min.js"></script>
 
<script type="text/javascript">
    $(function () {
		
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkmonthly").is(":checked")) {              
				showEditBox(1,12);
            }
			else if ($("#chkquaterly").is(":checked")) {			
				showEditBox(1,4);
            }
			else if ($("#chkkhalfyearly").is(":checked")) {               
				showEditBox(1,2);            }
			else if ($("#chkyearly").is(":checked")) {               
				showEditBox(1,1);
            }			
        });
    });
	
	function showEditBox(id,paranum) {	 	   
	 
	var editMarkUp="";
	editMarkUp =editMarkUp +("<table border='1'>");
	editMarkUp =editMarkUp +("<tr><td>S.No</td><td>Task Name</td><td>Starting Date</td><td>Task Date</td><td>Due Date</td></tr>");
		 
		for(var i =1; i<=paranum; i++)
        {
	        editMarkUp =editMarkUp +("<tr>");
			editMarkUp =editMarkUp +("<td>");
			editMarkUp =editMarkUp +(i);
			editMarkUp =editMarkUp +("</td>");
		 	editMarkUp =editMarkUp +("<td>");
			editMarkUp =editMarkUp +('<input name="txtmessage_'+i+'" id="txtmessage_'+i+'" type="text" Value=""   />');			
			editMarkUp =editMarkUp +("</td>"); 			
			editMarkUp =editMarkUp +("<td>");
			editMarkUp =editMarkUp +('<input name="txtstdate_'+i+'" id="txtstdate_'+i+'"  class="daterange" Value=""   />');			
			editMarkUp =editMarkUp +("</td>"); 			
			editMarkUp =editMarkUp +("<td>");
editMarkUp =editMarkUp +('<input id="txtendtdate_'+i+'"  name="txtendtdate_'+i+'" class="daterange"    type="text" Value=""   />');			
			editMarkUp =editMarkUp +("</td>"); 			
			editMarkUp =editMarkUp +("<td>");
editMarkUp =editMarkUp +('<input id="txtduetdate_'+i+'" name="txtduetdate_'+i+'" class="daterange" type="text" Value=""   />');			
			editMarkUp =editMarkUp +("</td>"); 		
			
	        editMarkUp =editMarkUp +("</tr>"); 
        }	
		
		editMarkUp =editMarkUp +("</table>");
		$("#message_"+id).html(editMarkUp);
	 
    }
	
</script>
    <p class="login-box-msg">Set up Task </p>
<form action="<?php echo base_url(); ?>Setuptask/savetask" method="post">
<span>Period</span><br><hr>
<label for="chkmonthly"><input type="radio" id="chkmonthly" name="chkPassPort" value= "12">Monthly</input></label>
<label for="chkquaterly"><input type="radio" id="chkquaterly" name="chkPassPort" value= "4">Quaterly</input></label>
<label for="chkkhalfyearly"><input type="radio" id="chkkhalfyearly" name="chkPassPort" value= "2">Half-Yearly</input></label>
<label for="chkyearly"><input type="radio" id="chkyearly" name="chkPassPort" value= "1">Yearly</input></label>
 <br><hr>

<div class="message-box" id="message_1"></div>
  <div class="register-box-body">

	 
	 
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
	   </div> 
 
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange	
});	 
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>

 <?php include 'taskclientgst.php';?>

 <br><br>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
		  
        </div>
		<br><br><br>
		
    </form>
 
     
  <!-- /.form-box -->

<?php include 'bodyfooter.php';?>