 
<?php include 'body.php';?>
<img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
		<textarea class ="message-box" name="txtmessage" id="txtmessage" rows="1"  >Welcome!!!</textarea>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>clientaccounts/newclient">
            <i class="fa fa-dashboard"></i> <span>New Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("clientaccounts/search", $attr);?>
            <div class="form-group">
			
                <div class="col-md-6">
				
                    <input class="form-control" id="ac_name" name="ac_name" placeholder="Search for Ac Name..." type="text" value="<?php echo set_value('book_name'); ?>" />
                </div>
				</div>
		<div class="txt-heading" >Group 
		 	
	    <div class="form-group has-feedback"> 
	  <select class="form-control" id="groupname" name="groupname">		     
		<?php
			 		
            $this->db->order_by('group_code');					
            $this->db->select('group_code,groupname');                      
            $castxe= $this->db->get('accmasgroup');	
			$row = mysqli_fetch_row($result);
			foreach($castxe->result() as $data)
				{
				    echo "<option value='$data->group_code'";
				    echo ">$data->groupname</option>";
				} 
		?>  
		</select>
      </div>
	  </div>  
	    <hr>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "clientaccounts/search"; ?>" class="btn btn-primary">Show All</a>
					
                </div>
            </div>
        <?php echo form_close(); ?>
        
    </div>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
<p class="login-box-msg">Our Client Details</p>
<div class="table-responsive">
<table width="95%" border="1" cellspacing="2" cellpadding="4">
  <tr class="AdminTableHeader">
     <td>S.No</td>       
	 <td>A/c. Name</td>
     <td>Contact Persion</td>	
     <td>Contact Nos.</td>
	 <td>Opn.Bal </td>		
     <td>Tot Dr</td>		
     <td>Tot Cr</td>
	 <td>Clos Bal</td>
    <td>Edit</td>	
  </tr>
  
 
<?php $i=1;foreach ($results as $data) : ?>  
  <tr>
    
    <td><?php if(isset($pageno))  print $pageno; ?></td>
    <td><?php echo $data->ac_name .' - '.$data->group_code ; ?></td>
    <td><?php echo $data->contactperson; ?></td>    
    <td><?php echo $data->contactno; ?></td>   
    <td contenteditable="true"
	        onBlur="saveToDatabase(this,'opn_bal','<?php  echo $data->ac_code; ?>','<?php  echo $data->ac_name; ?>')"
	        onClick="showEdit(this);">
	<?php echo $data->opn_bal ; ?>
	</td>	
    <td><?php echo $data->tot_dr ; ?></td>   
    <td><?php echo $data->tot_cr; ?></td>
    <td><?php echo $data->clos_bal ; ?></td>
<td>
	<a href="<?php echo base_url(); ?>clientaccounts/editclient/<?php echo $data->ac_code;  ?>"><button class="btn btn-primary" type="button">Edit</button></a>	
  </td>
  </tr>
<?php $pageno=$pageno+1;  endforeach ; ?>
</table>

<ul class="pagination">
    <p><?php echo $links; ?></p>
</ul>
</div>
<script>
function saveToDatabase(editableObj,column,id,acname) {
	
	$("#loaderIcon").show();		 
	$.ajax({
		url: '<?php echo site_url("clientaccounts/saveremarks")?>',
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			 $("#loaderIcon").hide();
			 $("#txtmessage").val(acname+' - '+column+' Sucessfully Updated !!!');			 
		}        
   });
}
</script>
<?php include 'bodyfooter.php';?>