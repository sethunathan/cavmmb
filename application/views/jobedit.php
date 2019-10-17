<?php include 'body.php';?>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
 <style> 
.submessage-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnsubEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnsubDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnsubAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
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
#btnsubSaveAction {
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


<style>
.txt-headingg {
    padding: 10px 10px;
    border-radius: 2px;
    color:  #fff;
    background: red;
    margin: 20px 0px 5px;
	 text-align: center;
}
</style>



<div class="txt-headingg">Serivce</div> 
 <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loadersubIcon"  />
<div id="frmSubJobAdd">

<div class="form-group has-feedback">
    <input name="flag"  value ="<?php echo $flag?>" id ="flag" type="text" readonly class="form-control" >
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input name="flag"  value ="<?php echo $subjob_code?>"  
	name="addsubjobcode"   id="addsubjobcode"  type="text" readonly class="form-control" >
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
 


<div class="txt-heading">Name	
   <input type="text"  value ="<?php echo $addsubjobname?>"  name="addsubjobname" id="addsubjobname" />
</div>	 
<div class="txt-heading">Service</div>
<div id="job_code">   
		 <?php							 
			$this->db->select('jobname,job_code');
			$this->db->order_by('job_code');
			$castxe= $this->db->get('masjob');	
			$i=1;
			 foreach($castxe->result() as $data)
				             {
								 
								    echo "<input type='radio'  class='addjobcode'  name='addjobcode'  value= '$data->job_code'";
									if($data->job_code==$addjobcode) {echo "checked";}
							        echo ">$data->jobname</input>";
								$i=$i+1;
				              } 
			?> 

</div>	

<div class="txt-heading">S.A.C	<input type="text"  value ="<?php echo $addsac?>"  name="addsac" id="addsac" /></div>	
<div class="txt-heading">Tax %	<input type="text"  value ="<?php echo $addtaxper?>"  name="addtaxper" id="addtaxper" /></div>	
<div class="txt-heading">Price <input type="text"  value ="<?php echo $addamount?>"  name="addamount" id="addamount" /></div>	

<div class="form-group has-feedback"> 
<div class="txt-heading">Regular/Non-Regular Tasks</div>
 <div id="repeat"> 
 <input type="radio"  class="repeat" name="repeat" <?php if($addrepeat==5) {echo "checked";}?>  value= "5">Non-Regular</input>
<input type="radio" class="repeat" name="repeat"  <?php if($addrepeat==1) {echo "checked";}?>  value= "1">Monthly</input>
<input type="radio"  class="repeat" name="repeat" <?php if($addrepeat==2) {echo "checked";}?> value= "2">Quaterly</input>
<input type="radio"  class="repeat" name="repeat" <?php if($addrepeat==3) {echo "checked";}?> value= "3">Half-Yearly</input>
<input type="radio"  class="repeat" name="repeat" <?php if($addrepeat==4) {echo "checked";}?> value= "4">Yearly</input>

<br>
 </div>
 </div>
 
 <div class="form-group has-feedback"> 
<div class="txt-heading">TDS Filing/TDS Payment</div>
 <div id="tds"> 
<input type="radio" class="tds" name="tds"  <?php if($addtds==0) {echo "checked";}?>  value= "0">TDS Filing</input>
<input type="radio"  class="tds" name="tds" <?php if($addtds==1) {echo "checked";}?> value= "1">TDS Payment</input>
<br>
 </div>
 </div>
 
 
 
   <div class="form-group has-feedback"> 
<div class="txt-heading">Active/In Active</div>
 <div id="active"> 
<input type="radio"   class="active" name="active"  <?php if($addactive==1) {echo "checked";}?>  value= "1">Active</input>
<input type="radio"   class="active"  name="active"  <?php if($addactive==2) {echo "checked";}?>   value= "2">In-Active</input><br>
 </div>  
 </div>  

 	
<?php  //include 'date.php';?>
<p><button id="btnsubAddAction" name="subsubmit" onClick="callSubJobAction()">Save</button></p>
</div> 
<script>
function callSubJobAction() {
	$("#loadersubIcon").show();	     
	
	var action =$("#flag").val(); 
	var subjobcode =$("#addsubjobcode").val(); 
	var addsubjobname =$("#addsubjobname").val(); 
	var jobcode = $(".addjobcode:checked").val();
	
	var active = $(".active:checked").val();
    var repeat = $(".repeat:checked").val();
	var tds = $(".tds:checked").val();
	
	var addsac =$("#addsac").val(); 
	var addtaxper =$("#addtaxper").val(); 
	var addamount =$("#addamount").val(); 
	 
	
	jQuery.ajax({
	url: '<?php echo site_url("job/subjoball")?>',
	data:{              action:action,
	                    subjobname:addsubjobname,						 
						jobcode:jobcode,
						tds:tds,
                        repeat:repeat,	
                        active:active,
                        addsac:addsac,	
                        addtaxper:addtaxper,
						addamount:addamount,							 
						subjobcode:subjobcode
						},
	type: "POST",
	success:function(data){
     switch(action) {
			
			case "ADD":		
              alert(data);			
			break;
			case "EDIT":
				alert(data);	
					
			break;
			 
		}
		
		$("#txtsubjob").val('');
		$("#loadersubIcon").hide();
	}
	,error: function(xhr, status, error) {
	alert(error);
	}
	
	});
}
	
</script>

<?php include 'bodyfooter.php';?>