<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

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
<div class="txt-heading">Starting Date </div>	
    <input type="text" value ="" class="daterange"   name="staringdate" ></input>

 
<div class="txt-heading">Month Interval  </div>
<select>
<script language="javascript" type="text/javascript"> 
for(var d=1;d<=12;d++)
{
    document.write("<option>"+d+"</option>");
}
</script>
</select>

 <div class="form-group has-feedback"> 
<div class="txt-heading">Active/In Active</div>
<input type="radio"   name="active"  value= "1">Active</input>
<input type="radio"   name="active"  value= "2">In-Active</input><br>
 </div>  


<div class="txt-heading">Closing Date </div>
    <input type="text" value ="" class="daterange"   name="closingdate" ></input>
	<br><br>
 
<script type="text/javascript"> 
$(function(){	
	$('.daterange').mask('00/00/0000',{placeholder: "__/__/____"}); //daterange
	
});	//last
</script>
<script src="<?php echo base_url(); ?>assests/select2/jquery.mask.js"></script>