 
<?php include 'body.php';?><img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>clientt/newclient">
            <i class="fa fa-dashboard"></i> <span>New Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("clientt/search", $attr);?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="ac_name" name="ac_name" placeholder="Search for Ac Name..." type="text" value="<?php echo set_value('book_name'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "clientt/search"; ?>" class="btn btn-primary">Show All</a>
					
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div>
 
 
<p class="login-box-msg">Our Client Details</p>
<table width="90%" border="1" cellspacing="2" cellpadding="4" class="AdminTable">
  <tr class="AdminTableHeader">
     <td>S.No</td>       
	 <td>Name</td>
     <td>Contact Persion</td>	
     <td>Contact Nos.</td>
	 <td>Pan </td>	
     <td>E-Way UID*</td>		
     <td>E-Way Pwd*</td>	 
     <td>GST No*</td>		
     <td>GST ID*</td>
    <td>Edit</td>	
  </tr>
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
    
     <td><?php if(isset($pageno))  print $pageno; ?></td>
     
    <td><?php echo $data->ac_name .' - '.$data->group_code ; ?></td>
<td><?php echo $data->contactperson   ; ?></td>    
<td><?php echo $data->contactno   ; ?></td>   
<td><?php echo $data->pan.'---'. $data->tin_no   ; ?></td>   
 
 <td contenteditable="true"
	onBlur="saveToDatabase(this,'ewaybilluserid','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->ewaybilluserid ; ?>
	</td>
	  
	<td contenteditable="true"
	onBlur="saveToDatabase(this,'ewaybillpwd','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->ewaybillpwd ; ?>
	</td>
  
<td contenteditable="true"
	onBlur="saveToDatabase(this,'gstid','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_code ?>','<?php  echo $data->ac_name ?>')"
	onClick="showEdit(this);"><?php echo $data->gstid ; ?></td>
	<td>
	<a href="<?php echo base_url(); ?>clientt/editclient/<?php echo $data->ac_code;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php $pageno=$pageno+1;  endforeach ; ?>
</table>
<ul class="pagination">
<p><?php echo $links; ?></p>
</ul>

 

<script>

function saveToDatabase(editableObj,column,id,acname,acname1) {
	
	$("#loaderIcon").show();	
 
	$.ajax({
		url: '<?php echo site_url("client/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		
		success: function(data){
			 
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname1+' - '+column+' Sucessfully Updated !!!');			 
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>