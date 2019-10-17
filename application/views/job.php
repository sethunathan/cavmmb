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
    <input name="flag"  value ="<?php echo $flag?>" type="text" readonly class="form-control" >
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>

 


<div class="txt-heading">Name	
   <input type="text" name="addsubjobname" id="addsubjobname" />
</div>	  
	
<div class="txt-heading">Serivce 	 </div> 
<div id="job_code">   
		 <?php							 
				$this->db->select('jobname,job_code');
			$this->db->order_by('job_code');
			$castxe= $this->db->get('masjob');	
			$i=1;
			 foreach($castxe->result() as $data)
				             {
								 
								    echo "<input type='radio'  class='addjobcode'  name='addjobcode'  value= '$data->job_code'";
							        echo ">$data->jobname</input>";
								$i=$i+1;
				              } 
			?> 

</div>	 	
	
 
<?php include 'date.php';?>
<p><button id="btnsubAddAction" name="subsubmit" onClick="callSubJobAction('add','')">Save</button></p>
</div> 

<?php include 'bodyfooter.php';?>