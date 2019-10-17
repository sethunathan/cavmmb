<?php include 'body.php';?><script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
#btnAddAction{background-color:#09F;border:0;padding:5px 10px;color:#FFF;}
</style>
 <li class="active treeview">
          <a href="<?php echo base_url(); ?>admin/linkit">
            <i class="fa fa-dashboard"></i> <span>IT Link - Refresh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>         
        </li>  <img src="<?php echo base_url(); ?>homeassests/images/LoaderIcon.gif"  style="display:none" id="loaderIcon"  />
		
<form action="<?php echo base_url(); ?>admin/linkit" method="post">
 
 <br>
 
	<div class="col-xs-4">
	  <button type="submit" class="btn btn-primary btn-block btn-flat">Load</button>
    </div> 
		 
 </form>
 
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>

<textarea class ="message-box"  name="txtmessage" id="txtmessage" rows="1"  cols="50" >Welcome!!!</textarea>
<div class="table-responsive">
<table      data-toggle="table"   width="100%" border="1" cellspacing="2" cellpadding="4" >
  <thead><tr>
    
    <th data-sortable="true">S.No </th> 	
    <th data-field="name" data-sortable="true">Client Name</th>		
	<th data-field="task" data-sortable="true">Task Name</th>    
    <th data-sortable="true">Return Filed Date</th>	 	 
	<th >Move to Verified List</th>
	<th >Remaining Days</th>
</tr></thead>
  
<?php $i=1; foreach ($client as $rsclient) :  ?>  
    
	 
    <tr id="message_<?php echo $rsclient['id'];?>" class="table-row">
	<td><?php echo $i; ?></td>   
    <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;"><?php echo $rsclient['ac_name'] ?></td>
	<td><?php echo $rsclient['task_name'] ; ?></td>	
    <td>  </td>		
    <td> 
	 <button class="btnEditAction" name="future"
      onClick="callCrudAction('future','<?php echo $rsclient['id']; ?>','<?php echo $rsclient['ac_name']; ?>')">
      Move to Verfied List</button> 
      </td>
	  <td> Days Diff</td>	  
	 
	  
	 
   	   
	
	 

  
  </tr> 
  <?php $i=$i+1; ?>
    
<?php endforeach ; ?>
</table>
 </div>
</div>

 
<?php include 'bodyfooter.php';?>
  